<?php
class Layanan_model extends CI_Model {

  public function __construct()
  {
    $this->load->model('layanan_model');
    $this->load->database();
  }
  public function get_layanan()
  {
    $query = $this->db->get('layanan');
    return $query;
  }
}