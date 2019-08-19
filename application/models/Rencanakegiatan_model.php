<?php

class Rencanakegiatan_model extends CI_Model
{

  var $table = 'rencana_kegiatan'; //nama tabel dari database
  var $column_order = array(null, 'tahun_anggaran', 'nama_kegiatan', 'pelaksanaan', 'penanggungjawab'); //field yang ada di table user
  var $column_search = array('tahun_anggaran', 'nama_kegiatan'); //field yang diizin untuk pencarian 
  var $order = array('id' => 'desc'); // default order 

  private function _get_datatables_query()
  {

    $this->db->from($this->table);

    $i = 0;

    foreach ($this->column_search as $item) // looping awal
    {
      if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
      {

        if ($i === 0) // looping awal
        {
          $this->db->group_start();
          $this->db->like($item, $_POST['search']['value']);
        } else {
          $this->db->or_like($item, $_POST['search']['value']);
        }

        if (count($this->column_search) - 1 == $i)
          $this->db->group_end();
      }
      $i++;
    }

    if (isset($_POST['order'])) {
      $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } else if (isset($this->order)) {
      $order = $this->order;
      $this->db->order_by(key($order), $order[key($order)]);
    }
  }

  function get_datatables()
  {
    $this->_get_datatables_query();
    if ($_POST['length'] != -1)
      $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

  function count_filtered()
  {
    $this->_get_datatables_query();
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function count_all()
  {
    $this->db->from($this->table);
    return $this->db->count_all_results();
  }
  public function getAllRencanakegiatan()
  {
    $this->db->order_by('pelaksanaan', 'DESC');
    return $this->db->get($this->table)->result_array();
  }
  public function getRencanakegiatanById($id)
  {
    return $this->db->get_where($this->table, ['id' => $id])->row_array();
  }
  public function updateRencanakegiatan($data, $id)
  {
    return $this->db->update($this->table, $data, ['id' => $id]);
  }
  public function deleteRencanakegiatanById($id)
  {
    return $this->db->delete($this->table, ['id' => $id]);
  }
  function uploadFiles($data)
  {
    $config['allowed_types'] = 'xls|xlsx|doc|docx|pdf|zip|rar';
    $config['max_size']     = 0;
    $config['remove_spaces'] = true;
    $config['file_name'] = date('dmYsiH') .  $_FILES['proposal_kegiatan']['name'];
    $config['upload_path'] = './uploads/files/proposalkegiatan/';

    $this->load->library('upload', $config);
    if ($this->upload->do_upload('proposal_kegiatan')) {
      $old_file = $data['proposal_kegiatan'];
      if (!empty($old_file)) {
        unlink(FCPATH . 'uploads/files/proposalkegiatan/' . $old_file);
      }
      return $this->upload->data('file_name');
    }
  }
}
