<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Program extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
        $this->load->library('form_validation');
        $this->load->model('program_model', 'program');
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Program';
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserByEmail($email);
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('templates/dashboard_sidebar', $data);
        $this->load->view('program/index', $data);
        $this->load->view('program/dashboard_footer');
    }
    function get_data_program()
    {
        $list = $this->program->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama_program;
            $row[] = '<a href="' . base_url() . 'master/program/edit/' . $field->id . '" class="text-primary mr-3"><i class="fas fa-fw fa-edit"></i></a>
                    <a href="' . base_url() . 'master/program/delete/' . $field->id . '" class="text-danger delete-button" ><i class="fas fa-fw fa-trash"></i></a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->program->count_all(),
            "recordsFiltered" => $this->program->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }
    public function add()
    {
        $data['title'] = 'Program';
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserByEmail($email);
        $this->form_validation->set_rules('nama_program', 'Nama_program', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('templates/dashboard_topbar', $data);
            $this->load->view('templates/dashboard_sidebar', $data);
            $this->load->view('program/add', $data);
            $this->load->view('templates/dashboard_footer');
        } else {
            $data = [
                'nama_program' => $this->input->post('nama_program')
            ];
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Master program berhasil di tambah</div>');
            $this->db->insert('program', $data);
            redirect('master/program');
        }
    }
    public function edit($id)
    {
        $data['title'] = 'Program';
        $email = $this->session->userdata('email');
        $data['user'] = $this->user->getUserByEmail($email);
        $data['program'] = $this->program->getProgramById($id);
        $this->form_validation->set_rules('nama_program', 'Nama_program', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('templates/dashboard_topbar', $data);
            $this->load->view('templates/dashboard_sidebar', $data);
            $this->load->view('program/edit', $data);
            $this->load->view('templates/dashboard_footer');
        } else {
            $id = $this->input->post('id');
            $data = [
                'nama_program' => $this->input->post('nama_program')
            ];
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Master program berhasil di edit</div>');
            $this->db->update('program', $data, ['id' => $id]);
            redirect('master/program');
        }
    }
    public function delete($id)
    {
        $this->program->deleteProgramById($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Master program berhasil di hapus</div>');
        redirect('master/program');
    }
}
