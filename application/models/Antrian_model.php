<?php
class Antrian_model extends CI_Model {

  public $title;
  public $content;
  public $date;

  public function __construct()
  {
    $this->load->model('antrian_model');
    $this->load->database();
  }

  public function get_terpanggil()
  {
    $query = $this->db->query("
            SELECT urutan
            FROM antrian
            WHERE waktu_dilayani IS NOT NULL
            AND DATE(tanggal) = CURDATE()
            ORDER BY urutan DESC
        ");

    if (isset($query->result()[0])){
      return $query->result()[0]->urutan;
    }
  }

  public function get_last_antrian()
  {
    $query = $this->db->query("
            SELECT urutan
            FROM antrian
            WHERE DATE(tanggal) = CURDATE()
            ORDER BY urutan DESC
        ");

    if (isset($query->result()[0])){
      return $query->result()[0]->urutan;
    }
  }

  public function isnew($no_hp)
  {
    $query = $this->db->query("
            SELECT *
            FROM antrian
            WHERE DATE(tanggal) = CURDATE()
            AND no_hp = '".$no_hp."'
        ");
    if (isset($query->result()[0])){
      return false;
    } else return true;
    //return $query;
  }

  public function insert($data)
  {
    $this->db->insert('antrian',$data);
  }

  public function get_last_urutan()
  {
    //        $this->db->sort_by('urutan', 'DESC');
    //        $this->db->where('tanggal', );
    //        $query = $this->db->get('antrian');
    $query = $this->db->query('
            SELECT urutan
            FROM antrian
            WHERE DATE(tanggal) = CURDATE()
            ORDER BY urutan DESC
        ');
    if(isset($query->result()[0])){
      return $query->result()[0]->urutan;  
    } else {
      return '0';
    }
  }

  public function hpkode_matches($no_hp, $kode)
  {
    $where['no_hp'] = $no_hp;
    $where['pin_kode'] = $kode;
    $this->db->where($where);
    $query = $this->db->get('antrian');
    if(isset($query->result()[0])){
      return $query->result()[0];
    } else return 'salah';
  }

  public function get_time_served()
  {
    $query = $this->db->query('
      SELECT waktu_dilayani
      FROM antrian
      WHERE DATE(tanggal) = CURDATE()
      AND waktu_dilayani IS NOT NULL
      ORDER BY urutan DESC
    ');
    if(isset($query->result()[0])){
      return $query->result()[0]->waktu_dilayani;  
    } else {
      return NULL;
    }

  }

  public function serve($id_antrian, $loket)
  {
    $this->db->query('
      UPDATE antrian
      SET 
      waktu_dilayani = CURRENT_TIMESTAMP,
      loket = '.$loket.'
      WHERE id_antrian = '.$id_antrian);
  }

  public function get_first_tertunda()
  {
    $this->db->query('
      SELECT *
      FROM antrian
      WHERE waktu_dilayani IS NULL
      ');
  }

  public function matches_urutan_kode($urutan, $kode)
  {
    $where['urutan'] = $urutan;
    $where['pin_kode'] = $kode;
    $this->db->where($where);
    $query = $this->db->get('antrian');
    if(isset($query->result()[0])){
      return $query->result()[0];
    } else return 'salah';
  }

  public function recall($urutan)
  {
    $this->db->query('
      UPDATE antrian
      SET 
      status = 2
      WHERE DATE(tanggal) = CURDATE()
    ');
  }
/*  public function get_first_unserved()
  {
    $query = $this->db->query('
      SELECT *
      FROM antrian
      WHERE waktu_dilayani IS NULL
      AND DATE(tanggal) = CURDATE()
      ');
    return $query->result()[0];
  }*/
  public function get_many_unserved($many)
  {
    return $this->db->query('
      SELECT *
      FROM antrian
      WHERE waktu_dilayani IS NULL
      AND DATE(tanggal) = CURDATE()
      ORDER BY id_antrian ASC
      LIMIT '.$many.'
      '); 
  }
  public function get_many_served($many)
  {
    return $this->db->query('
      SELECT *
      FROM antrian
      WHERE waktu_dilayani IS NOT NULL
      AND DATE(tanggal) = CURDATE()
      ORDER BY id_antrian DESC
      LIMIT '.$many.'
      '); 
  }
  public function get_last_unserved()
  {
    return $this->db->query('
      SELECT *
      FROM antrian
      WHERE waktu_dilayani IS NULL
      AND DATE(tanggal) = CURDATE()
      ORDER BY id_antrian DESC
      '); 
  }
  public function get_first_unserved()
  {
    return $this->db->query('
      SELECT *
      FROM antrian
      WHERE waktu_dilayani IS NULL
      AND DATE(tanggal) = CURDATE()
      ORDER BY id_antrian ASC
      '); 
  }
  public function layani($loket,$id)
  {
    $data['waktu_dilayani'] = date('Y-m-d H:i:s');
    $data['status'] = 1;
    $data['loket'] = $loket;
    $this->db->where('id_antrian',$id);
    $this->db->update('antrian',$data);
  }
  public function get_last_served()
  {
    return $this->db->query('
      SELECT *
      FROM antrian
      WHERE waktu_dilayani IS NOT NULL
      AND DATE(tanggal) = CURDATE()
      ORDER BY id_antrian DESC
      '); 
  }
  public function get_first_served()
  {
    return $this->db->query('
      SELECT *
      FROM antrian
      WHERE waktu_dilayani IS NOT NULL
      AND DATE(tanggal) = CURDATE()
      ORDER BY id_antrian ASC
      '); 
  }
  public function undo($id)
  {
    $data['waktu_dilayani'] = null;
    $data['status'] = 0;
    $this->db->where('id_antrian',$id);
    $this->db->update('antrian',$data);
  }
  public function resetAntrian()
  {
    $this->db->query('
      DELETE FROM antrian
      WHERE DATE(tanggal) = CURDATE()
    ');
  }
  public function getUrutanInLoket($loket)
  {
    $query =  $this->db->query('
      SELECT *
      FROM antrian
      WHERE waktu_dilayani IS NOT NULL
      AND DATE(tanggal) = CURDATE()
      AND loket = '.$loket.'
      ORDER BY id_antrian DESC
    ')->result();
    if(isset($query[0])){
      return $query[0]->grup_antrian.$query[0]->urutan;  
    } else {
      return '-';
    }
  }
  public function serve_and_get($loket)
  {
    $row = $this->get_first_unserved();
    $this->layani($loket,$row->result()[0]->id_antrian);
    return $row;
  }
}
?>