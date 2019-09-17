<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rencanaanggaran extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Rencanakegiatan_model', 'rencanakegiatan');
    $this->load->model('Rencanaanggaran_model', 'rencanaanggaran');
    $this->load->model('Tahunanggaran_model', 'tahunanggaran');
    $this->load->model('program_model', 'program');
    $this->load->model('User_model', 'user');
    $this->load->library('form_validation');
    is_logged_in();
  }
  public function index()
  {
    $data['title'] = 'Rencana Anggaran';
    $email = $this->session->userdata('email');
    $data['user'] = $this->user->getUserByEmail($email);
    $data['lastrow'] = $this->rencanaanggaran->getIdLastRow();
    $this->load->view('templates/dashboard_header', $data);
    $this->load->view('templates/dashboard_topbar', $data);
    $this->load->view('templates/dashboard_sidebar', $data);
    $this->load->view('rencanaanggaran/index', $data);
    $this->load->view('rencanaanggaran/dashboard_footer');
  }
  public function get_data_rencanaanggaran()
  {
    $list = $this->rencanaanggaran->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $field) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $field->tahun_anggaran;
      $row[] = $field->nama_kegiatan;
      $row[] = $field->pendapatan;
      $row[] = $field->belanja;
      $row[] = $field->saldo;
      $row[] = '<a href="' . base_url() . 'keuangan/rencanaanggaran/preview/' . $field->id . '" class="text-success mr-3"><i class="far fa-fw fa-folder-open"></i></a>
                <a href="' . base_url() . 'keuangan/rencanaanggaran/edit/' . $field->id . '" class="text-primary mr-3"><i class="fas fa-fw fa-edit"></i></a>
                <a href="' . base_url() . 'keuangan/rencanaanggaran/delete/' . $field->id . '" class="text-danger" ><i class="fas fa-fw fa-trash"></i></a>';
      $data[] = $row;
    }
    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->rencanaanggaran->count_all(),
      "recordsFiltered" => $this->rencanaanggaran->count_filtered(),
      "data" => $data,
    );
    echo json_encode($output);
  }
  public function add()
  {
    $data['title'] = 'Rencana Anggaran';
    $email = $this->session->userdata('email');
    $data['user'] = $this->user->getUserByEmail($email);
    $data['program'] = $this->program->getAllProgram();
    $data['tahunanggaran'] = $this->tahunanggaran->getAllTahunanggaran();
    $data['rencanakegiatan'] = $this->rencanakegiatan->getAllRencanakegiatan();
    $this->form_validation->set_rules('tahun_anggaran', 'tahun anggaran', 'required');
    $this->form_validation->set_rules('program', 'program', 'required');
    $this->form_validation->set_rules('nama_kegiatan', 'nama kegiatan', 'required');
    $this->form_validation->set_rules('pelaksanaan', 'pelaksanaan', 'required');
    $this->form_validation->set_rules('penanggungjawab', 'penanggungjawab', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/dashboard_header', $data);
      $this->load->view('templates/dashboard_topbar', $data);
      $this->load->view('templates/dashboard_sidebar', $data);
      $this->load->view('rencanaanggaran/add', $data);
      $this->load->view('templates/dashboard_footer');
    } else {
      $data = [
        'id' => base_convert(microtime(false), 10, 36),
        'tahun_anggaran' => $this->input->post('tahun_anggaran'),
        'program' => $this->input->post('program'),
        'nama_kegiatan' => $this->input->post('nama_kegiatan'),
        'pelaksanaan' => $this->input->post('pelaksanaan'),
        'penanggungjawab' => $this->input->post('penanggungjawab'),
      ];
      $this->db->insert('rencana_anggaran', $data);
      $data['lastrow'] = $this->rencanaanggaran->getIdLastRow();
      redirect('keuangan/rencanaanggaran/addp/' . $data['lastrow']['id'] . '');
    }
  }
  public function addp($id)
  {
    $data['title'] = 'Rencana Anggaran';
    $email = $this->session->userdata('email');
    $data['user'] = $this->user->getUserByEmail($email);
    $data['rencana_anggaran_pendapatans'] = $this->rencanaanggaran->getAllRencanaAnggaranPendapatanById($id);
    $data['lastrow'] = $this->rencanaanggaran->getIdLastRow();
    $this->form_validation->set_rules('uraian', 'uraian', 'required');
    $this->form_validation->set_rules('jumlah', 'jumlah', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/dashboard_header', $data);
      $this->load->view('templates/dashboard_topbar', $data);
      $this->load->view('templates/dashboard_sidebar', $data);
      $this->load->view('rencanaanggaran/addp', $data);
      $this->load->view('templates/dashboard_footer');
    } else {
      $data = [
        'id' => base_convert(microtime(false), 10, 36),
        'rencana_anggaran_id' => $id,
        'uraian' => $this->input->post('uraian'),
        'jumlah' => $this->input->post('jumlah'),
      ];
      $totalpendapatan = $this->rencanaanggaran->getTotalJumlahPendapatanById($id);
      $totalbelanja = $this->rencanaanggaran->getTotalJumlahBelanjaById($id);
      $data2 = [
        'pendapatan' => ($totalpendapatan + $this->input->post('jumlah')),
        'saldo' => ($totalpendapatan + $this->input->post('jumlah')) - $totalbelanja
      ];
      $this->db->insert('rencana_anggaran_pendapatan', $data);
      $this->db->update('rencana_anggaran', $data2, ['id' => $id]);
      redirect('keuangan/rencanaanggaran/addp/' . $id . '');
    }
  }
  public function addb($id)
  {
    $data['title'] = 'Rencana Anggaran';
    $email = $this->session->userdata('email');
    $data['user'] = $this->user->getUserByEmail($email);
    $data['rencana_anggaran_belanjas'] = $this->rencanaanggaran->getAllRencanaAnggaranBelanjaById($id);
    $data['lastrow'] = $this->rencanaanggaran->getIdLastRow();
    $this->form_validation->set_rules('uraian', 'uraian', 'required');
    $this->form_validation->set_rules('volume', 'volume', 'required');
    $this->form_validation->set_rules('satuan', 'satuan', 'required');
    $this->form_validation->set_rules('harga_satuan', 'harga_satuan', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/dashboard_header', $data);
      $this->load->view('templates/dashboard_topbar', $data);
      $this->load->view('templates/dashboard_sidebar', $data);
      $this->load->view('rencanaanggaran/addb', $data);
      $this->load->view('templates/dashboard_footer');
    } else {
      $jumlah = $this->input->post('volume') * $this->input->post('harga_satuan');
      $data = [
        'id' => base_convert(microtime(false), 10, 36),
        'rencana_anggaran_id' => $id,
        'uraian' => $this->input->post('uraian'),
        'volume' => $this->input->post('volume'),
        'satuan' => $this->input->post('satuan'),
        'harga_satuan' => $this->input->post('harga_satuan'),
        'jumlah' => $jumlah
      ];
      $totalpendapatan = $this->rencanaanggaran->getTotalJumlahPendapatanById($id);
      $totalbelanja = $this->rencanaanggaran->getTotalJumlahBelanjaById($id);
      $data2 = [
        'belanja' => ($totalbelanja + $jumlah),
        'saldo' => $totalpendapatan - ($totalbelanja + $jumlah)
      ];
      $this->db->insert('rencana_anggaran_belanja', $data);
      $this->db->update('rencana_anggaran', $data2, ['id' => $id]);
      redirect('keuangan/rencanaanggaran/addb/' . $id . '');
    }
  }
  public function preview($id)
  {
    $data['title'] = 'Rencana Anggaran';
    $email = $this->session->userdata('email');
    $data['user'] = $this->user->getUserByEmail($email);
    $data['rencana_anggaran'] = $this->rencanaanggaran->getRencanaAnggaranById($id);
    $data['rencana_anggaran_pendapatans'] = $this->rencanaanggaran->getAllRencanaAnggaranPendapatanById($id);
    $data['rencana_anggaran_belanjas'] = $this->rencanaanggaran->getAllRencanaAnggaranBelanjaById($id);
    $data['lastrow'] = $this->rencanaanggaran->getIdLastRow();
    $this->load->view('templates/dashboard_header', $data);
    $this->load->view('templates/dashboard_topbar', $data);
    $this->load->view('templates/dashboard_sidebar', $data);
    $this->load->view('rencanaanggaran/preview', $data);
    $this->load->view('templates/dashboard_footer');
  }
  public function deletep($id)
  {
    $rencana_anggaran_pendapatan = $this->rencanaanggaran->getRencanaAnggaranPendapatanById($id);
    $totalpendapatan = $this->rencanaanggaran->getTotalJumlahPendapatanById($rencana_anggaran_pendapatan['rencana_anggaran_id']);
    $totalbelanja = $this->rencanaanggaran->getTotalJumlahBelanjaById($rencana_anggaran_pendapatan['rencana_anggaran_id']);
    $data = [
      'pendapatan' => $totalpendapatan - $rencana_anggaran_pendapatan['jumlah'],
      'saldo' => ($totalpendapatan - $rencana_anggaran_pendapatan['jumlah']) - $totalbelanja 
    ];
    $this->db->update('rencana_anggaran', $data, ['id' => $rencana_anggaran_pendapatan['rencana_anggaran_id']]);
    $this->rencanaanggaran->deleteRencanaAnggaranPendapatanById($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Laporan kegiatan berhasil di hapus</div>');
    redirect('keuangan/rencanaanggaran/addp/' . $rencana_anggaran_pendapatan['rencana_anggaran_id'] . '');
  }
  public function deleteb($id)
  {
    $rencana_anggaran_belanja = $this->rencanaanggaran->getRencanaAnggaranBelanjaById($id);
    $totalpendapatan = $this->rencanaanggaran->getTotalJumlahPendapatanById($rencana_anggaran_belanja['rencana_anggaran_id']);
    $totalbelanja = $this->rencanaanggaran->getTotalJumlahBelanjaById($rencana_anggaran_belanja['rencana_anggaran_id']);
    $data = [
      'belanja' => $totalbelanja - $rencana_anggaran_belanja['jumlah'],
      'saldo' => $totalpendapatan - ($totalbelanja - $rencana_anggaran_belanja['jumlah'])
    ];
    $this->db->update('rencana_anggaran', $data, ['id' => $rencana_anggaran_belanja['rencana_anggaran_id']]);
    $this->rencanaanggaran->deleteRencanaAnggaranBelanjaById($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Laporan kegiatan berhasil di hapus</div>');
    redirect('keuangan/rencanaanggaran/addb/' . $rencana_anggaran_belanja['rencana_anggaran_id'] . '');
  }
  public function edit($id)
  {
    $data['title'] = 'Rencana Anggaran';
    $email = $this->session->userdata('email');
    $data['user'] = $this->user->getUserByEmail($email);
    $data['program'] = $this->program->getAllProgram();
    $data['tahunanggaran'] = $this->tahunanggaran->getAllTahunanggaran();
    $data['rencanakegiatan'] = $this->rencanakegiatan->getAllRencanakegiatan();
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/dashboard_header', $data);
      $this->load->view('templates/dashboard_topbar', $data);
      $this->load->view('templates/dashboard_sidebar', $data);
      $this->load->view('rencanaanggaran/edit', $data);
      $this->load->view('templates/dashboard_footer');
    } else {
      $id = $this->uri->segment(4);
      $data = [];
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Laporan kegiatan berhasil di tambahkan</div>');
      redirect('kegiatan/laporankegiatan');
    }
  }
  public function delete($id)
  {
    $this->rencanaanggaran->deleteRencanaAnggaranById($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Laporan kegiatan berhasil di hapus</div>');
    redirect('keuangan/rencanaanggaran');
  }
}
