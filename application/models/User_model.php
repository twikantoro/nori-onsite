<?php
class User_model extends CI_Model {
  
  private $table = 'user';
  
  public function __construct()
  {
    $this->load->model('layanan_model');
    $this->load->database();
  }
  public function get_one($where)
  {
    $this->db->where($where);
    return $this->db->get($this->table);
  }
  public function exists($where)
  {
    $this->db->where($where);
    if(isset($this->db->get($this->table)->result_array()[0])){
      return true;
    } else {
      return false;
    }
  }
  public function create($data)
  {
    $data2=$data;
    $data2['password']=md5($data['password']);
    $this->db->insert($this->table,$data2);
  }
  public function get_ten($page=1)
  {
    $start = 10*($page-1);
    $this->db->order_by('id','DESC');
    return $this->db->get('user',10,$start);
  }
  public function fetch_user_table($perpage,$page,$keyword)
  {
    $start = $perpage*($page-1);
    if($keyword!=null){
      $this->db->like('username',$keyword);
      $this->db->or_like('nama',$keyword);
    }
    $this->db->order_by('id','DESC');
    return $this->db->get('user',$perpage,$start);
  }
  public function update($where,$data)
  {
    $this->db->where($where);
    $this->db->update('user',$data);
    return $this->db->error();
  }
}