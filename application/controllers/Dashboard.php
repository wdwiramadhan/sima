<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserByEmail($email);
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('templates/dashboard_sidebar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/dashboard_footer');
    }
}
