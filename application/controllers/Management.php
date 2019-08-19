<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Management extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model', 'user');
    $this->load->model('Management_model', 'management');
    $this->load->library('form_validation');
    is_logged_in();
  }
  public function index()
  {
    $data['title'] = 'Management';
    $email = $this->session->userdata('email');
    $data['user'] = $this->user->getUserByEmail($email);
    $data['management'] = $this->management->getManagement(1);
    $this->load->view('templates/dashboard_header', $data);
    $this->load->view('templates/dashboard_topbar', $data);
    $this->load->view('templates/dashboard_sidebar', $data);
    $this->load->view('management/index', $data);
    $this->load->view('templates/dashboard_footer');
  }
  public function edit()
  {
    $data['title'] = 'Management';
    $email = $this->session->userdata('email');
    $data['user'] = $this->user->getUserByEmail($email);
    $data['management'] = $this->management->getManagement(1);
    $this->form_validation->set_rules('management', 'management', 'required');
    $this->form_validation->set_rules('kabupaten', 'kabupaten', 'required');
    $this->form_validation->set_rules('alamat', 'alamat', 'required');
    $this->form_validation->set_rules('email', 'email', 'required');
    $this->form_validation->set_rules('kontak', 'kontak', 'required');
    $this->form_validation->set_rules('manager', 'manager', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/dashboard_header', $data);
      $this->load->view('templates/dashboard_topbar', $data);
      $this->load->view('templates/dashboard_sidebar', $data);
      $this->load->view('management/edit', $data);
      $this->load->view('templates/dashboard_footer');
    } else {
      $id = $this->input->post('id');
      $data = [
        'management' => $this->input->post('management'),
        'kabupaten' => $this->input->post('kabupaten'),
        'alamat' => $this->input->post('alamat'),
        'email' => $this->input->post('email'),
        'kontak' => $this->input->post('kontak'),
        'manager' => $this->input->post('manager')
      ];
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Master users berhasil di edit</div>');
      $this->management->updateManagementById($data, $id);
      redirect('master/management');
    }
  }
}
