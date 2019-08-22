<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
        $this->load->library('form_validation');
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Users';
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserByEmail($email);
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('templates/dashboard_sidebar', $data);
        $this->load->view('users/index', $data);
        $this->load->view('users/dashboard_footer');
    }
    function get_data_user()
    {
        $list = $this->user->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->name;
            $row[] = $field->email;
            $row[] = $field->phone_number;
            $row[] = $field->role_id;
            $row[] = [
                '<a href="' . base_url() . 'master/users/edit/' . $field->id . '" class="text-primary mr-3"><i class="fas fa-fw fa-edit"></i></a>
                <a href="' . base_url() . 'master/users/delete/' . $field->id . '" class="text-danger" id="delete-button"><i class="fas fa-fw fa-trash"></i></a>'
            ];
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->user->count_all(),
            "recordsFiltered" => $this->user->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }
    public function add()
    {
        $data['title'] = 'Users';
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserByEmail($email);
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('phone_number', 'Phone_number', 'required');
        $this->form_validation->set_rules('role_id', 'Role_id', 'required');
        if ($this->form_validation->run() == false) {

            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('templates/dashboard_topbar', $data);
            $this->load->view('templates/dashboard_sidebar', $data);
            $this->load->view('users/add', $data);
            $this->load->view('templates/dashboard_footer');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'phone_number' => $this->input->post('phone_number'),
                'image' => 'default.png',
                'role_id' => $this->input->post('role_id'),
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Master users berhasil di tambah</div>');
            $this->db->insert('user', $data);
            redirect('master/users');
        }
    }
    public function edit($id)
    {
        $data['title'] = 'Users';
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserByEmail($email);
        $data['users'] = $this->user->getUserById($id);
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('phone_number', 'Phone_number', 'required');
        $this->form_validation->set_rules('role_id', 'Role_id', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('templates/dashboard_topbar', $data);
            $this->load->view('templates/dashboard_sidebar', $data);
            $this->load->view('users/edit', $data);
            $this->load->view('templates/dashboard_footer');
        } else {
            $id = $this->uri->segment(4);
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone_number' => $this->input->post('phone_number'),
                'role_id' => $this->input->post('role_id')
            ];
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Master users berhasil di edit</div>');
            $this->db->update('user', $data, ['id' => $id]);
            redirect('master/users');
        }
    }
    public function delete($id)
    {
        $this->user->deleteUserById($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Master users berhasil di hapus</div>');
        redirect('master/users');
    }
}
