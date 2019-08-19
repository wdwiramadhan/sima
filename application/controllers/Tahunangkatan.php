<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tahunangkatan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model', 'user');
    $this->load->library('form_validation');
    $this->load->model('Tahunangkatan_model', 'tahunangkatan');
    is_logged_in();
  }
  public function index()
  {
    $data['title'] = 'Tahun Angkatan';
    $email = $this->session->userdata('email');
    $data['user'] = $this->user->getUserByEmail($email);
    $this->load->view('templates/dashboard_header', $data);
    $this->load->view('templates/dashboard_topbar', $data);
    $this->load->view('templates/dashboard_sidebar', $data);
    $this->load->view('tahunangkatan/index', $data);
    $this->load->view('tahunangkatan/dashboard_footer');
  }
  function get_data_tahunangkatan()
  {
    $list = $this->tahunangkatan->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $field) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $field->tahun;
      $row[] = [
        '<a href="' . base_url() . 'master/tahunangkatan/edit/' . $field->id . '" class="text-primary mr-3"><i class="fas fa-fw fa-edit"></i></a>
        <a href="' . base_url() . 'master/tahunangkatan/delete/' . $field->id . '" class="text-danger" id="delete-button"><i class="fas fa-fw fa-trash"></i></a>'
      ];
      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->tahunangkatan->count_all(),
      "recordsFiltered" => $this->tahunangkatan->count_filtered(),
      "data" => $data,
    );
    echo json_encode($output);
  }
  public function add()
  {
    $data['title'] = 'Tahun Angkatan';
    $email = $this->session->userdata('email');
    $data['user'] = $this->user->getUserByEmail($email);
    $this->form_validation->set_rules('tahun', 'tahun', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/dashboard_header', $data);
      $this->load->view('templates/dashboard_topbar', $data);
      $this->load->view('templates/dashboard_sidebar', $data);
      $this->load->view('tahunangkatan/add', $data);
      $this->load->view('templates/dashboard_footer');
    } else {
      $data = [
        'tahun' => $this->input->post('tahun')
      ];
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Master tahun angkatan berhasil di tambah</div>');
      $this->db->insert('tahun_angkatan', $data);
      redirect('master/tahunangkatan');
    }
  }
  public function edit($id)
  {
    $data['title'] = 'Tahun Angkatan';
    $email = $this->session->userdata('email');
    $data['user'] = $this->user->getUserByEmail($email);
    $data['tahunangkatan'] = $this->tahunangkatan->getTahunangkatanById($id);
    $this->form_validation->set_rules('tahun', 'tahun', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/dashboard_header', $data);
      $this->load->view('templates/dashboard_topbar', $data);
      $this->load->view('templates/dashboard_sidebar', $data);
      $this->load->view('tahunangkatan/edit', $data);
      $this->load->view('templates/dashboard_footer');
    } else {
      $id = $this->input->post('id');
      $data = [
        'tahun' => $this->input->post('tahun')
      ];
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Master tahun angkatan berhasil di edit</div>');
      $this->tahunangkatan->updateTahunangkatan($data, $id);
      redirect('master/tahunangkatan');
    }
  }
  public function delete($id)
  {
    $this->tahunangkatan->deleteTahunangkatanById($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Master tahun angkatan berhasil di hapus</div>');
    redirect('master/tahunangkatan');
  }
}
