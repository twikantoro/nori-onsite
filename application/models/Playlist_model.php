<?php
class Playlist_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }
  public function get_all()
  {
    $this->db->order_by('urutan','asc');
    return $this->db->get('playlist');
  }
  public function create($data)
  {
    $this->db->insert('playlist',$data);
  }
  public function update($where,$data)
  {
    $this->db->where($where);
    $this->db->update('playlist',$data);
    return $this->db->error();
  }
  public function exists($where)
  {
    $row = $this->db->get_where('playlist',$where)->result();
    if(isset($row[0])){
      return true;
    } else {
      return false;
    }
  }
  public function remove($where)
  {
    $this->db->delete('playlist',$where);
  }
}