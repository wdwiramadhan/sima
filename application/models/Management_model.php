<?php

class Management_model extends CI_Model
{
  var $table = 'management';

  public function getManagement($id)
  {
    return $this->db->get_where($this->table, ['id' => $id])->row_array();
  }
  public function updateManagementById($data, $id)
  {
    $this->db->update($this->table, $data, ['id' => $id]);
  }
}
