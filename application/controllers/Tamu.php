<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tamu extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('antrian_model');
  }
  public function index()
  {   
    //DISPLAY APA ADANYA
    $this->load->view('tamu/index');
  }
  public function api_periodical()
  {
    $terpanggil = $this->antrian_model->get_terpanggil();
    $total = $this->antrian_model->get_last_antrian();
    $time_served = $this->antrian_model->get_time_served();

    if(isset($terpanggil)){
      $api['terpanggil'] = $terpanggil;
    } else $api['terpanggil'] = '0';
    if(isset($total)){
      $api['total'] = $total;
    } else $api['total'] = '0';
    if(isset($time_served)){
      $time_served_timestamp = strtotime($time_served);
      $api['time_served'] = $time_served_timestamp;
    } else {
      $time = mktime(7,0,0);
      $api['time_served'] = strtotime("today 7 am");
    }

    echo json_encode($api);
  }//$api['kode'] = rand(1000,9999);

  public function api_daftar($no_hp,$force=false)
  {
    //CARI DI DATABASE, ADA?
    $isnew = $this->antrian_model->isnew($no_hp);

    //print_r($isnew);

    //GADA -> INSERT, DAPET KODE, DAPET COOKIES
    if($isnew==true){
      $data['tanggal'] = date('Y-m-d');
      $data['no_hp'] = $no_hp;
      $urutan = (int)$this->antrian_model->get_last_urutan();
      $urutan++;
      $data['urutan'] =  $urutan;

      $timestamp = date('Y-m-d H:i:s');
      $data['waktu_masuk'] = date($timestamp);
      $data['pin_kode'] = rand(1000,9999);
      $this->antrian_model->insert($data);

      $api['kondisi'] = 'new';
      $api['kode'] = $data['pin_kode'];
      $api['urutan'] = $data['urutan'];

      echo json_encode($api);
    } 

    //ADA -> MASUKIN KODE
    else if($force!=true) {
      $api['kondisi'] = 'old';

      echo json_encode($api);
    }

    //ADA -> DAFTAR LAGI, DAPET KODE
    if($isnew==false&&$force==true){
      $data['tanggal'] = date('Y-m-d');
      $data['no_hp'] = $no_hp;
      $data['urutan'] = $this->antrian_model->get_last_urutan() + 1;
      $data['pin_kode'] = rand(1000,9999);
      $this->antrian_model->insert($data);

      $api['kondisi'] = 'new';
      $api['kode'] = $data['pin_kode'];
      $api['urutan'] = $data['urutan'];

      echo json_encode($api);
    }
  }

  public function api_login($no_hp, $kode)
  {
    //CEK HP KODE MATCH
    $arr_antrian = $this->antrian_model->hpkode_matches($no_hp, $kode);

    //MATCHES, DAPET NO URUT
    if(isset($arr_antrian->urutan)){
      $api['kondisi'] = 'bener';
      $api['urutan'] = $arr_antrian->urutan;

      echo json_encode($api);
    }

    //DOESNT MATCH, MASUKIN KODE LAGI
    else {
      $api['kondisi'] = 'salah';

      echo json_encode($api);
    }
  }
  
  public function coba()
  {
    $time_served = $this->antrian_model->get_time_served();
    echo $time_served;
  }
  
  public function api_recall($urutan,$kode)
  {
    $match_urutan_kode = $this->antrian_model->matches_urutan_kode($urutan,$kode);
    if($match_urutan_kode!='salah'){
      $this->antrian_model->recall($urutan);
      $api['kondisi']='benar';
      echo json_encode($api);
    } else {
      $api['kondisi']='salah';
      echo json_encode($api);
    }
  }
  public function pilih_layanan()
  {
    $this->load->view('tamu/pilih_layanan');
  }
}
