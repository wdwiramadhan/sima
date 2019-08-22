<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inventaris extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Inventaris_model', 'inventaris');
        $this->load->model('Tahunangkatan_model', 'tahunangkatan');
        $this->load->model('User_model', 'user');
        $this->load->library('form_validation');
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Inventaris';
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserByEmail($email);
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('templates/dashboard_sidebar', $data);
        $this->load->view('inventaris/index', $data);
        $this->load->view('inventaris/dashboard_footer');
    }
    function get_data_inventaris()
    {
        $list = $this->inventaris->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->no_inventaris;
            $row[] = $field->nama_barang;
            $row[] = $field->jumlah;
            $row[] = $field->spesifikasi;
            $row[] = $field->status;
            $row[] = [
                '<a href="' . base_url() . 'inventaris/detail/' . $field->id . '" class="text-success mr-3"><i class="far fa-fw fa-folder-open"></i></a>
                <a href="' . base_url() . 'inventaris/edit/' . $field->id . '" class="text-primary mr-3"><i class="fas fa-fw fa-edit"></i></a>
                <a href="' . base_url() . 'inventaris/delete/' . $field->id . '" class="text-danger" id="delete-button"><i class="fas fa-fw fa-trash"></i></a>'
            ];
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->inventaris->count_all(),
            "recordsFiltered" => $this->inventaris->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }
    public function add()
    {
        $data['title'] = 'Inventaris';
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserByEmail($email);
        $data['tahunangkatan'] = $this->tahunangkatan->getAllTahunangkatan();
        $this->form_validation->set_rules('tahun', 'tahun', 'required');
        $this->form_validation->set_rules('no_inventaris', 'nomor inventaris', 'required');
        $this->form_validation->set_rules('nama_barang', 'nama barang', 'required');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'required');
        $this->form_validation->set_rules('spesifikasi', 'spesifikasi', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('sumber', 'sumber', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');
        $this->form_validation->set_rules('tanggal_inventaris', 'tanggal inventaris', 'required');
        if ($this->form_validation->run() == false) {

            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('templates/dashboard_topbar', $data);
            $this->load->view('templates/dashboard_sidebar', $data);
            $this->load->view('inventaris/add', $data);
            $this->load->view('inventaris/dashboard_footer');
        } else {
            $data = [
                'tahun' => $this->input->post('tahun'),
                'no_inventaris' => $this->input->post('no_inventaris'),
                'nama_barang' => $this->input->post('nama_barang'),
                'jumlah' => $this->input->post('jumlah'),
                'spesifikasi' => $this->input->post('spesifikasi'),
                'status' => $this->input->post('status'),
                'sumber' => $this->input->post('sumber'),
                'harga' => $this->input->post('harga'),
                'tanggal_inventaris' => $this->input->post('tanggal_inventaris'),
            ];
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Master inventaris berhasil di tambah</div>');
            $this->db->insert('inventaris', $data);
            redirect('inventaris');
        }
    }
    public function edit($id)
    {
        $data['title'] = 'Inventaris';
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserByEmail($email);
        $data['inventaris'] = $this->inventaris->getInventarisById($id);
        $data['tahunangkatan'] = $this->tahunangkatan->getAllTahunangkatan();
        $this->form_validation->set_rules('tahun', 'tahun', 'required');
        $this->form_validation->set_rules('no_inventaris', 'nomor inventaris', 'required');
        $this->form_validation->set_rules('nama_barang', 'nama barang', 'required');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'required');
        $this->form_validation->set_rules('spesifikasi', 'spesifikasi', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('sumber', 'sumber', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');
        $this->form_validation->set_rules('tanggal_inventaris', 'tanggal inventaris', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('templates/dashboard_topbar', $data);
            $this->load->view('templates/dashboard_sidebar', $data);
            $this->load->view('inventaris/edit', $data);
            $this->load->view('templates/dashboard_footer');
        } else {
            $id = $this->uri->segment(3);
            $data = [
                'tahun' => $this->input->post('tahun'),
                'no_inventaris' => $this->input->post('no_inventaris'),
                'nama_barang' => $this->input->post('nama_barang'),
                'jumlah' => $this->input->post('jumlah'),
                'spesifikasi' => $this->input->post('spesifikasi'),
                'status' => $this->input->post('status'),
                'sumber' => $this->input->post('sumber'),
                'harga' => $this->input->post('harga'),
                'tanggal_inventaris' => $this->input->post('tanggal_inventaris'),
            ];
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Master inventaris berhasil di edit</div>');
            $this->db->update('inventaris', $data, ['id' => $id]);
            redirect('inventaris');
        }
    }
    public function delete($id)
    {
        $this->inventaris->deleteInventarisById($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Master inventaris berhasil di hapus</div>');
        redirect('inventaris');
    }
}
