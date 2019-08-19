<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tahunanggaran extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model', 'user');
    $this->load->library('form_validation');
    $this->load->model('Tahunanggaran_model', 'tahunanggaran');
    is_logged_in();
  }
  public function index()
  {
    $data['title'] = 'Tahun Anggaran';
    $email = $this->session->userdata('email');
    $data['user'] = $this->user->getUserByEmail($email);
    $this->load->view('templates/dashboard_header', $data);
    $this->load->view('templates/dashboard_topbar', $data);
    $this->load->view('templates/dashboard_sidebar', $data);
    $this->load->view('tahunanggaran/index', $data);
    $this->load->view('tahunanggaran/dashboard_footer');
  }
  function get_data_tahunanggaran()
  {
    $list = $this->tahunanggaran->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $field) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $field->tahun;
      $row[] = [
        '<a href="' . base_url() . 'master/tahunanggaran/edit/' . $field->id . '" class="text-primary mr-3"><i class="fas fa-fw fa-edit"></i></a>
        <a href="' . base_url() . 'master/tahunanggaran/delete/' . $field->id . '" class="text-danger" id="delete-button"><i class="fas fa-fw fa-trash"></i></a>'
      ];
      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->tahunanggaran->count_all(),
      "recordsFiltered" => $this->tahunanggaran->count_filtered(),
      "data" => $data,
    );
    echo json_encode($output);
  }
  public function add()
  {
    $data['title'] = 'Tahun Anggaran';
    $email = $this->session->userdata('email');
    $data['user'] = $this->user->getUserByEmail($email);
    $this->form_validation->set_rules('tahun', 'tahun', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/dashboard_header', $data);
      $this->load->view('templates/dashboard_topbar', $data);
      $this->load->view('templates/dashboard_sidebar', $data);
      $this->load->view('tahunanggaran/add', $data);
      $this->load->view('templates/dashboard_footer');
    } else {
      $data = [
        'tahun' => $this->input->post('tahun')
      ];
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Master tahun anggaran berhasil di tambah</div>');
      $this->db->insert('tahun_anggaran', $data);
      redirect('master/tahunanggaran');
    }
  }
  public function edit($id)
  {
    $data['title'] = 'Tahun Anggaran';
    $email = $this->session->userdata('email');
    $data['user'] = $this->user->getUserByEmail($email);
    $data['tahunanggaran'] = $this->tahunanggaran->getTahunanggaranById($id);
    $this->form_validation->set_rules('tahun', 'tahun', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/dashboard_header', $data);
      $this->load->view('templates/dashboard_topbar', $data);
      $this->load->view('templates/dashboard_sidebar', $data);
      $this->load->view('tahunanggaran/edit', $data);
      $this->load->view('templates/dashboard_footer');
    } else {
      $id = $this->input->post('id');
      $data = [
        'tahun' => $this->input->post('tahun')
      ];
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Master tahun anggaran berhasil di edit</div>');
      $this->tahunanggaran->updateTahunanggaran($data, $id);
      redirect('master/tahunanggaran');
    }
  }
  public function delete($id)
  {
    $this->tahunanggaran->deleteTahunanggaranById($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Master tahun anggaran berhasil di hapus</div>');
    redirect('master/tahunanggaran');
  }
}
