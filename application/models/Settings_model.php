<?php
class Settings_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }
  public function get_settings()
  {
    $this->db->where('id',1);
    return $this->db->get('settings');
  }
  public function update_settings($data)
  {
    $this->db->where('id',1);
    $this->db->update('settings',$data);
  }
}