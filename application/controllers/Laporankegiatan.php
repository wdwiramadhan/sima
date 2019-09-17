<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporankegiatan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('laporankegiatan_model', 'laporankegiatan');
    $this->load->model('Rencanakegiatan_model', 'rencanakegiatan');
    $this->load->model('Tahunanggaran_model', 'tahunanggaran');
    $this->load->model('program_model', 'program');
    $this->load->model('User_model', 'user');
    $this->load->library('form_validation');
    is_logged_in();
  }
  public function index()
  {
    $data['title'] = 'Laporan Kegiatan';
    $email = $this->session->userdata('email');
    $data['user'] = $this->user->getUserByEmail($email);
    $this->load->view('templates/dashboard_header', $data);
    $this->load->view('templates/dashboard_topbar', $data);
    $this->load->view('templates/dashboard_sidebar', $data);
    $this->load->view('laporankegiatan/index', $data);
    $this->load->view('laporankegiatan/dashboard_footer');
  }
  function get_data_laporankegiatan()
  {
    $list = $this->laporankegiatan->get_datatables();
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
                <a href="' . base_url() . 'kegiatan/laporankegiatan/edit/' . $field->id . '" class="text-primary mr-3"><i class="fas fa-fw fa-edit"></i></a>
                <a href="' . base_url() . 'kegiatan/laporankegiatan/delete/' . $field->id . '" class="text-danger delete-button" ><i class="fas fa-fw fa-trash"></i></a>';
      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->laporankegiatan->count_all(),
      "recordsFiltered" => $this->laporankegiatan->count_filtered(),
      "data" => $data,
    );
    echo json_encode($output);
  }
  public function add()
  {
    $data['title'] = 'Laporan Kegiatan';
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
    $this->form_validation->set_rules('keterangan', 'keterangan', 'required');
    $this->form_validation->set_rules('penanggungjawab', 'penanggungjawab', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/dashboard_header', $data);
      $this->load->view('templates/dashboard_topbar', $data);
      $this->load->view('templates/dashboard_sidebar', $data);
      $this->load->view('laporankegiatan/add', $data);
      $this->load->view('templates/dashboard_footer');
    } else {
      $dataset = [
        'tahun_anggaran' => $this->input->post('tahun_anggaran'),
        'program' => $this->input->post('program'),
        'nama_kegiatan' => $this->input->post('nama_kegiatan'),
        'tujuan' => $this->input->post('tujuan'),
        'sasaran' => $this->input->post('sasaran'),
        'pelaksanaan' => $this->input->post('pelaksanaan'),
        'keterangan' => $this->input->post('keterangan'),
        'penanggungjawab' => $this->input->post('penanggungjawab'),
      ];
      // check jika ada file yang di upload
      $uploadFiles = $_FILES['laporan_kegiatan']['name'];
      if ($uploadFiles) {
        $dataset['laporan_kegiatan'] = $this->laporankegiatan->uploadFiles(0);
      }
      $this->db->insert('laporan_kegiatan', $dataset);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Laporan kegiatan berhasil di tambahkan</div>');
      redirect('kegiatan/laporankegiatan');
    }
  }
  public function edit($id)
  {
    $data['title'] = 'Laporan Kegiatan';
    $email = $this->session->userdata('email');
    $data['user'] = $this->user->getUserByEmail($email);
    $data['program'] = $this->program->getAllProgram();
    $data['tahunanggaran'] = $this->tahunanggaran->getAllTahunanggaran();
    $data['rencanakegiatan'] = $this->rencanakegiatan->getAllRencanakegiatan();
    $data['laporankegiatan'] = $this->laporankegiatan->getlaporankegiatanById($id);
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
      $this->load->view('laporankegiatan/edit', $data);
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
      $uploadFiles = $_FILES['laporan_kegiatan']['name'];
      if ($uploadFiles) {
        $dataset['laporan_kegiatan'] = $this->laporankegiatan->uploadFiles($data['laporankegiatan']);
      }
      $this->laporankegiatan->updateLaporankegiatan($dataset, $id);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Laporan kegiatan berhasil di tambahkan</div>');
      redirect('kegiatan/laporankegiatan');
    }
  }
  public function delete($id)
  {
    $this->laporankegiatan->deleteLaporankegiatanById($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Laporan kegiatan berhasil di hapus</div>');
    redirect('kegiatan/laporankegiatan');
  }
}
