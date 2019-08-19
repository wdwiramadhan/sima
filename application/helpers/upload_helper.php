<?php

function uploadImage($address, $data)
{
  $ci = get_instance();
  $config['allowed_types'] = 'gif|jpg|png';
  $config['max_size']     = '1024';
  $config['upload_path'] = './assets/img/' . $address;
  $config['encrypt_name'] = TRUE;

  $ci->load->library('upload', $config);
  if ($ci->upload->do_upload('image')) {
    $old_image = $data['image'];
    if ($old_image != 'default.png') {
      unlink(FCPATH . 'assets/img/' . $address . $old_image);
    }
    $new_image = $ci->upload->data('file_name');
    return $ci->db->set('image', $new_image);
  }
}
