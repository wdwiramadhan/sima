<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model', 'auth');
    }
    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('dashboard');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = "Login";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/index');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    public function _login()
    {
        if ($this->session->userdata('email')) {
            redirect('dashboard');
        }
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);
        $user = $this->auth->getUserByEmail($email);

        if ($user) {
            if ($user[is_active] == 1) {
                if (password_verify($password, $user['password']) || $password == $user['password']) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not Activated</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out.</div>');
        redirect('auth');
    }
}
