<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rencanakegiatan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Rencanakegiatan_model', 'rencanakegiatan');
    $this->load->model('Tahunanggaran_model', 'tahunanggaran');
    $this->load->model('program_model', 'program');
    $this->load->model('User_model', 'user');
    $this->load->library('form_validation');
    is_logged_in();
  }
  public function index()
  {
    $data['title'] = 'Rencana Kegiatan';
    $email = $this->session->userdata('email');
    $data['user'] = $this->user->getUserByEmail($email);
    $this->load->view('templates/dashboard_header', $data);
    $this->load->view('templates/dashboard_topbar', $data);
    $this->load->view('templates/dashboard_sidebar', $data);
    $this->load->view('rencanakegiatan/index', $data);
    $this->load->view('rencanakegiatan/dashboard_footer');
  }
  function get_data_rencanakegiatan()
  {
    $list = $this->rencanakegiatan->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $field) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $field->tahun_anggaran;
      $row[] = $field->nama_kegiatan;
      $row[] = date_indo($field->pelaksanaan);
      $row[] = $field->penanggungjawab;
      $row[] = '<a href="' . base_url() . 'inventaris/detail/' . $field->id . '" class="text-success mr-3"><i class="far fa-fw fa-folder-open"></i></a>
                <a href="' . base_url() . 'kegiatan/rencanakegiatan/edit/' . $field->id . '" class="text-primary mr-3"><i class="fas fa-fw fa-edit"></i></a>
                <a href="' . base_url() . 'kegiatan/rencanakegiatan/delete/' . $field->id . '" class="text-danger delete-button" ><i class="fas fa-fw fa-trash"></i></a>';
      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->rencanakegiatan->count_all(),
      "recordsFiltered" => $this->rencanakegiatan->count_filtered(),
      "data" => $data,
    );
    echo json_encode($output);
  }
  public function add()
  {
    $data['title'] = 'Rencana Kegiatan';
    $email = $this->session->userdata('email');
    $data['user'] = $this->user->getUserByEmail($email);
    $data['program'] = $this->program->getAllProgram();
    $data['tahunanggaran'] = $this->tahunanggaran->getAllTahunanggaran();
    $this->form_validation->set_rules('tahun_anggaran', 'tahun anggaran', 'required');
    $this->form_validation->set_rules('program', 'program', 'required');
    $this->form_validation->set_rules('nama_kegiatan', 'nama kegiatan', 'required');
    $this->form_validation->set_rules('tujuan', 'tujuan', 'required');
    $this->form_validation->set_rules('sasaran', 'sasaran', 'required');
    $this->form_validation->set_rules('pelaksanaan', 'pelaksanaan', 'required');
    $this->form_validation->set_rules('penanggungjawab', 'penanggungjawab', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/dashboard_header', $data);
      $this->load->view('templates/dashboard_topbar', $data);
      $this->load->view('templates/dashboard_sidebar', $data);
      $this->load->view('rencanakegiatan/add', $data);
      $this->load->view('rencanakegiatan/dashboard_footer');
    } else {
      $dataset = [
        'tahun_anggaran' => $this->input->post('tahun_anggaran'),
        'program' => $this->input->post('program'),
        'nama_kegiatan' => $this->input->post('nama_kegiatan'),
        'tujuan' => $this->input->post('tujuan'),
        'sasaran' => $this->input->post('sasaran'),
        'pelaksanaan' => $this->input->post('pelaksanaan'),
        'penanggungjawab' => $this->input->post('penanggungjawab'),
      ];
      // check jika ada file yang di upload
      $uploadFiles = $_FILES['proposal_kegiatan']['name'];
      if ($uploadFiles) {
        $dataset['proposal_kegiatan'] = $this->rencanakegiatan->uploadFiles(0);
      }

      $this->db->insert('rencana_kegiatan', $dataset);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Rencana kegiatan berhasil di tambahkan</div>');
      redirect('kegiatan/rencanakegiatan');
    }
  }
  public function edit($id)
  {
    $data['title'] = 'Rencana Kegiatan';
    $email = $this->session->userdata('email');
    $data['user'] = $this->user->getUserByEmail($email);
    $data['program'] = $this->program->getAllProgram();
    $data['tahunanggaran'] = $this->tahunanggaran->getAllTahunanggaran();
    $data['rencanakegiatan'] = $this->rencanakegiatan->getRencanakegiatanById($id);
    $this->form_validation->set_rules('tahun_anggaran', 'tahun anggaran', 'required');
    $this->form_validation->set_rules('program', 'program', 'required');
    $this->form_validation->set_rules('nama_kegiatan', 'nama kegiatan', 'required');
    $this->form_validation->set_rules('tujuan', 'tujuan', 'required');
    $this->form_validation->set_rules('sasaran', 'sasaran', 'required');
    $this->form_validation->set_rules('pelaksanaan', 'pelaksanaan', 'required');
    $this->form_validation->set_rules('penanggungjawab', 'penanggungjawab', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/dashboard_header', $data);
      $this->load->view('templates/dashboard_topbar', $data);
      $this->load->view('templates/dashboard_sidebar', $data);
      $this->load->view('rencanakegiatan/edit', $data);
      $this->load->view('templates/dashboard_footer');
    } else {
      $id = $this->uri->segment(4);
      $dataset = [
        'tahun_anggaran' => $this->input->post('tahun_anggaran'),
        'program' => $this->input->post('program'),
        'nama_kegiatan' => $this->input->post('nama_kegiatan'),
        'tujuan' => $this->input->post('tujuan'),
        'sasaran' => $this->input->post('sasaran'),
        'pelaksanaan' => $this->input->post('pelaksanaan'),
        'penanggungjawab' => $this->input->post('penanggungjawab'),
      ];
      // check jika ada file yang di upload
      $uploadFiles = $_FILES['proposal_kegiatan']['name'];
      if ($uploadFiles) {
        $dataset['proposal_kegiatan'] = $this->rencanakegiatan->uploadFiles($data['rencanakegiatan']);
      }
      $this->rencanakegiatan->updateRencanakegiatan($dataset, $id);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Rencana kegiatan berhasil di edit</div>');
      redirect('kegiatan/rencanakegiatan');
    }
  }
  public function delete($id)
  {
    $this->rencanakegiatan->deleteRencanakegiatanById($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Rencana kegiatan berhasil di hapus</div>');
    redirect('kegiatan/rencanakegiatan');
  }
}
