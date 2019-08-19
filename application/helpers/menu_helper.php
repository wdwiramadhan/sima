<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);
        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id]);
        if ($userAccess->num_rows() < 1) {
            redirect('user');
        }
    }
}

// function check_access($role_id, $menu_id)
// {
//     $ci = get_instance();
//     $ci->db->where('role_id', $role_id);
//     $ci->db->where('menu_id', $menu_id);
//     $result =  $ci->db->get('user_access_menu');

//     if ($result->num_rows() > 0) {
//         return "checked='checked'";
//     }
// }

function sendEmail($message, $email)
{
    $ci = get_instance();
    $config = [
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_user' => 'wahyudr17@gmail.com',
        'smtp_pass' => 'wachyu0071',
        'smtp_port' => 465,
        'mailtype' => 'html',
        'charset' => 'utf-8',
        'newline' => "\r\n"
    ];
    $ci->email->initialize($config);
    $ci->email->from('wahyudr17@gmail.com ', ' wdwr ');
    $ci->email->to($email);
    $ci->email->subject('WDWR');
    $ci->email->message($message);
    if ($ci->email->send()) {
        return true;
    } else {
        echo $ci->email->print_debugger();
        die;
    }
}
