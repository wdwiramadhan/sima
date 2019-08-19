<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perguruantinggi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
        $this->load->library('form_validation');
        $this->load->model('Perguruantinggi_model', 'perguruantinggi');
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Perguruan Tinggi';
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserByEmail($email);
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('templates/dashboard_sidebar', $data);
        $this->load->view('perguruantinggi/index', $data);
        $this->load->view('perguruantinggi/dashboard_footer');
    }
    function get_data_perguruantinggi()
    {
        $list = $this->perguruantinggi->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama_pt;
            $row[] = [
                '<a href="' . base_url() . 'master/perguruantinggi/edit/' . $field->id . '" class="text-primary mr-3"><i class="fas fa-fw fa-edit"></i></a>
                <a href="' . base_url() . 'master/perguruantinggi/delete/' . $field->id . '" class="text-danger" id="delete-button"><i class="fas fa-fw fa-trash"></i></a>'
            ];
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->perguruantinggi->count_all(),
            "recordsFiltered" => $this->perguruantinggi->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }
    public function add()
    {
        $data['title'] = 'Perguruan Tinggi';
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserByEmail($email);
        $this->form_validation->set_rules('nama_pt', 'Nama_pt', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('templates/dashboard_topbar', $data);
            $this->load->view('templates/dashboard_sidebar', $data);
            $this->load->view('perguruantinggi/add', $data);
            $this->load->view('templates/dashboard_footer');
        } else {
            $data = [
                'nama_pt' => $this->input->post('nama_pt')
            ];
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Master perguruantinggi berhasil di tambah</div>');
            $this->db->insert('perguruan_tinggi', $data);
            redirect('master/perguruantinggi');
        }
    }
    public function edit($id)
    {
        $data['title'] = 'perguruan Tinggi';
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserByEmail($email);
        $data['perguruantinggi'] = $this->perguruantinggi->getPerguruantinggiById($id);
        $this->form_validation->set_rules('nama_pt', 'Nama_pt', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('templates/dashboard_topbar', $data);
            $this->load->view('templates/dashboard_sidebar', $data);
            $this->load->view('perguruantinggi/edit', $data);
            $this->load->view('templates/dashboard_footer');
        } else {
            $id = $this->input->post('id');
            $data = [
                'nama_pt' => $this->input->post('nama_pt')
            ];
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Master perguruan tinggi berhasil di edit</div>');
            $this->db->update('perguruan_tinggi', $data, ['id' => $id]);
            redirect('master/perguruantinggi');
        }
    }
    public function delete($id)
    {
        $this->perguruantinggi->deletePerguruantinggiById($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Master perguruan tinggi berhasil di hapus</div>');
        redirect('master/perguruantinggi');
    }
}
