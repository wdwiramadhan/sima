<?php

class Rencanaanggaran_model extends CI_Model
{

  var $table = 'rencana_anggaran'; //nama tabel dari database
  var $column_order = array(null, 'tahun_anggaran', 'program', 'nama_kegiatan', 'pendapatan', 'belanja', 'saldo'); //field yang ada di table user
  var $column_search = array('nama_kegiatan'); //field yang diizin untuk pencarian 
  var $order = array('id' => 'asc'); // default order 

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
  public function getIdLastRow()
  {
    $data = $this->db->order_by('id', 'desc')
      ->limit(1)
      ->get($this->table)
      ->row_array();
    return $data;
  }
  public function getRencanaAnggaranById($id)
  {
    return $this->db->get_where($this->table, ['id' => $id])->row_array();
  }
  public function getAllRencanaAnggaranPendapatanById($id)
  {
    return $this->db->get_where('rencana_anggaran_pendapatan', ['rencana_anggaran_id' => $id])->result_array();
  }
  public function getRencanaAnggaranPendapatanById($id)
  {
    return $this->db->get_where('rencana_anggaran_pendapatan', ['id' => $id])->row_array();
  }
  public function getTotalJumlahPendapatanById($id)
  {
    $this->db->select_sum('jumlah');
    $result = $this->db->get_where('rencana_anggaran_pendapatan',  ['rencana_anggaran_id' => $id])->row();  
    return $result->jumlah;
  }
  public function getTotalJumlahBelanjaById($id)
  {
    $this->db->select_sum('jumlah');
    $result = $this->db->get_where('rencana_anggaran_belanja', ['rencana_anggaran_id' => $id])->row();  
    return $result->jumlah;
  }
  public function getAllRencanaAnggaranBelanjaById($id)
  {
    return $this->db->get_where('rencana_anggaran_belanja', ['rencana_anggaran_id' => $id])->result_array();
  }
  public function getRencanaAnggaranBelanjaById($id)
  {
    return $this->db->get_where('rencana_anggaran_belanja', ['id' => $id])->row_array();
  }
  public function deleteRencanaAnggaranPendapatanById($id)
  {
    return $this->db->delete('rencana_anggaran_pendapatan', ['id' => $id]);
  }
  public function deleteRencanaAnggaranBelanjaById($id)
  {
    return $this->db->delete('rencana_anggaran_belanja', ['id' => $id]);
  }
  public function deleteRencanaAnggaranById($id)
  {
    $this->db->delete('rencana_anggaran_pendapatan', ['rencana_anggaran_id' => $id]);
    $this->db->delete('rencana_anggaran_belanja', ['rencana_anggaran_id' => $id]);
    $this->db->delete('rencana_anggaran', ['id' => $id]);
  }
}
