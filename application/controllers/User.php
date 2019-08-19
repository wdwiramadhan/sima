<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
        $this->load->library('form_validation');
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }
    public function index()
    {
        redirect('user/profile');
    }
    public function profile()
    {
        $data['title'] = 'My Profile';
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserByEmail($email);
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('templates/dashboard_sidebar', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('templates/dashboard_footer');
    }
    public function editprofile()
    {
        $data['title'] = 'Edit Profile';
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserByEmail($email);
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('templates/dashboard_topbar', $data);
            $this->load->view('templates/dashboard_sidebar', $data);
            $this->load->view('user/editprofile', $data);
            $this->load->view('templates/dashboard_footer');
        } else {
            $id = $this->input->post('id');
            $dataset = [
                'id' => $id,
                'name' => $this->input->post('name'),
                'phone_number' => $this->input->post('phone_number'),
                'address' => $this->input->post('address')
            ];
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                // address default : assets/img, you can add adrress after it
                $address = 'user/profile/';
                uploadImage($address, $data['user']);
            }
            $this->db->where('id', $id);
            $this->db->update('user', $dataset);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been update.</div>');
            redirect('user/profile');
        }
    }

    public function accountset()
    {
        $data['title'] = 'Account Setting';
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserByEmail($email);
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('templates/dashboard_sidebar', $data);
        $this->load->view('user/accountset', $data);
        $this->load->view('templates/dashboard_footer');
    }

    public function changepassword()
    {
        $data['title'] = 'Change Password';
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserByEmail($email);
        $this->form_validation->set_rules('current_password', 'Current password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New password', 'required|trim|min_length[6]');
        $this->form_validation->set_rules('new_password2', 'Confrim new password', 'required|trim|matches[new_password1]');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('templates/dashboard_topbar', $data);
            $this->load->view('templates/dashboard_sidebar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/dashboard_footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!(password_verify($current_password, $data['user']['password']) || $current_password == $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password.</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot same with current password</div>');
                    redirect('user/changepassword');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $data['user']['email']);
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed</div>');
                    redirect('user/accountset');
                }
            }
        }
    }
}
