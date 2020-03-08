<?php
class Konfigurasi_model extends CI_Model {

  public $title;
  public $content;
  public $date;

  public function __construct()
  {
    $this->load->model('konfigurasi_model');
    $this->load->database();
  }
  public function activate_loket($loket)
  {
    $this->db->where('id_konfigurasi',1);
    $query = $this->db->get('konfigurasi');
    $array = $query->result_array()[0];
    $varname = 'loket'.$loket.'_status';
    if($array[$varname]==true){
      $array[$varname]=false;
    } else {
      $array[$varname]=true;
    }
    //INSERT
    $this->db->update('konfigurasi',$array);
    //RETURN
    if($array[$varname]==true){
      return "turned_on";
    } else {
      return "turned_off";
    }
  }
  public function get_row($id)
  {
    $this->db->where('id_konfigurasi',1);
    return $this->db->get('konfigurasi')->result_array()[0];
  }
  public function get_all_urutan()
  {
    $query1 = $this->db->query('
      SELECT urutan
      FROM antrian
      WHERE DATE(tanggal) = CURDATE()
      AND loket = 1
    ');
    if(isset($query1->result()[0])){
      $data['loket1_urutan'] = $query1->result()[0]->urutan;
    } else $data['loket1_urutan'] = '-';
    $query2 = $this->db->query('
      SELECT urutan
      FROM antrian
      WHERE DATE(tanggal) = CURDATE()
      AND loket = 2
    ');
    if(isset($query1->result()[0])){
      $data['loket2_urutan'] = $query2->result()[0]->urutan;
    } else $data['loket2_urutan'] = '-';
    $query3 = $this->db->query('
      SELECT urutan
      FROM antrian
      WHERE DATE(tanggal) = CURDATE()
      AND loket = 3
    ');
    if(isset($query3->result()[0])){
      $data['loket3_urutan'] = $query3->result()[0]->urutan;
    } else $data['loket3_urutan'] = '-';
    $query4 = $this->db->query('
      SELECT urutan
      FROM antrian
      WHERE DATE(tanggal) = CURDATE()
      AND loket = 4
    ');
    if(isset($query4->result()[0])){
      $data['loket4_urutan'] = $query4->result()[0]->urutan;
    } else $data['loket4_urutan'] = '-';
    return $data;
  }
  
  public function get_konfigurasi($id=1){
    $select = array(
      'loket1_layani',
      'loket2_layani',
      'loket3_layani',
      'loket4_layani',
      'loket5_layani',
      'loket6_layani',
                  
                   );
    $this->db->select($select);
    $this->db->where('id_konfigurasi',$id);
    $query = $this->db->get('konfigurasi');
    return $query->result_array()[0];
  }
  public function get_konfigurasi2($id=1){
    $this->db->select('config_json');
    $this->db->where('id_konfigurasi',$id);
    $query = $this->db->get('konfigurasi');
    return $query->result_array()[0]['config_json'];
  }
  public function update_konfigurasi($data,$id=1)
  {
    $this->db->where('id_konfigurasi',$id);
    $this->db->update('konfigurasi',$data);
  }
  public function get_one_row()
  {
    $this->db->where('id_konfigurasi',1);
    return $this->db->get('konfigurasi');
  }
}
?>