<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sekolah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
        $this->load->library('form_validation');
        $this->load->model('Sekolah_model', 'sekolah');
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Sekolah';
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserByEmail($email);
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('templates/dashboard_sidebar', $data);
        $this->load->view('sekolah/index', $data);
        $this->load->view('sekolah/dashboard_footer');
    }
    function get_data_sekolah()
    {
        $list = $this->sekolah->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama_sekolah;
            $row[] = [
                '<a href="' . base_url() . 'master/sekolah/edit/' . $field->id . '" class="text-primary mr-3"><i class="fas fa-fw fa-edit"></i></a>
                <a href="' . base_url() . 'master/sekolah/delete/' . $field->id . '" class="text-danger" id="delete-button"><i class="fas fa-fw fa-trash"></i></a>'
            ];
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->sekolah->count_all(),
            "recordsFiltered" => $this->sekolah->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }
    public function add()
    {
        $data['title'] = 'Sekolah';
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserByEmail($email);
        $this->form_validation->set_rules('nama_sekolah', 'Nama_sekolah', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('templates/dashboard_topbar', $data);
            $this->load->view('templates/dashboard_sidebar', $data);
            $this->load->view('sekolah/add', $data);
            $this->load->view('templates/dashboard_footer');
        } else {
            $data = [
                'nama_sekolah' => $this->input->post('nama_sekolah')
            ];
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Master sekolah berhasil di tambah</div>');
            $this->db->insert('sekolah', $data);
            redirect('master/sekolah');
        }
    }
    public function edit($id)
    {
        $data['title'] = 'Sekolah';
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserByEmail($email);
        $data['sekolah'] = $this->sekolah->getSekolahById($id);
        $this->form_validation->set_rules('nama_sekolah', 'Nama_sekolah', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('templates/dashboard_topbar', $data);
            $this->load->view('templates/dashboard_sidebar', $data);
            $this->load->view('sekolah/edit', $data);
            $this->load->view('templates/dashboard_footer');
        } else {
            $id = $this->input->post('id');
            $data = [
                'nama_sekolah' => $this->input->post('nama_sekolah')
            ];
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Master sekolah berhasil di edit</div>');
            $this->db->update('sekolah', $data, ['id' => $id]);
            redirect('master/sekolah');
        }
    }
    public function delete($id)
    {
        $this->sekolah->deleteSekolahById($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Master sekolah berhasil di hapus</div>');
        redirect('master/sekolah');
    }
}
