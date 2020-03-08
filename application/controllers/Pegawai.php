<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('antrian_model');
    $this->load->model('konfigurasi_model');
    $this->load->model('settings_model');
    $this->load->model('playlist_model');
  }
  public function index()
  {   
    $konfigurasi = json_decode($this->konfigurasi_model->get_konfigurasi2());
    foreach($konfigurasi as $field => $value){
      $konfigurasiArr[$field] = $value;
    }
    $settings = $this->settings_model->get_settings()->result()[0];
    $defaults = $this->get_default_settings();
    foreach($settings as $field => $value){
      if($value==''){
        $newSettings[$field] = $defaults[$field];
      } else {
        $newSettings[$field] = $value;
      }
    }
    $data = array_merge($konfigurasiArr,$newSettings);
    //print_r($data);
    $this->load->view('pegawai/layarutamab6',$data);
  }
  public function modern()
  {
    $this->load->view('pegawai/layarutama2');
  }
  public function panggil()
  {

  }
  public function tunda()
  {

  }
  public function serve($id_antrian, $loket)
  {
    $this->antrian_model->serve($id_antrian, $loket);
  }
  public function resettozero(){
    $today = date("Y-m-d");
    $this->db->query("delete from `antrian` where tanggal = cast(now() as DATE)");
    if(isset($_SESSION['loket'][1])){
      $_SESSION['prevloket'][1]=$_SESSION['loket'][1];
    }
    unset($_SESSION['loket'][1]);
    if(isset($_SESSION['loket'][2])){
      $_SESSION['prevloket'][2]=$_SESSION['loket'][2];
    }
    unset($_SESSION['loket'][2]);
    if(isset($_SESSION['loket'][3])){
      $_SESSION['prevloket'][3]=$_SESSION['loket'][3];
    }
    unset($_SESSION['loket'][3]);
    if(isset($_SESSION['loket'][4])){
      $_SESSION['prevloket'][4]=$_SESSION['loket'][4];
    }
    unset($_SESSION['loket'][4]);
  }
  public function nextXY($loket, $jenis=null)
  {
    $unserved_obj = $this->antrian_model->get_first_unserved();
    $urutan = $unserved_obj->urutan;
    $id_antrian = $unserved_obj->id_antrian;
  }
  public function get_default_settings()
  {
    $data['tata_letak'] = 'klasik';
    $data['background'] = 'bgantrian.jpg';
    $data['running_text'] = 'Diberitahukan kepada masyarakat bahwa hari ini adalah hari yang kau tunggu.';
    $data['running_text_warna'] = 'white';
    $data['running_text_background'] = 'black';
    $playlist[0] = 'video/perjalanan_rupiah.mkv';
    $data['playlist'] = json_encode($playlist);
    $data['loket_text_warna'] = '#e9c26b';
    $data['loket_border_warna'] = 'linear-gradient(to right, #000000, #111111, #000000), linear-gradient(to right, #8f6B29, #FDE08D, #DF9F28)';
    $data['loket_kotak_warna'] = 'linear-gradient(to right, #8f6B29, #FDE08D)';
    return $data;
  }
  public function json_loket_statuses()
  {
    $config = $this->konfigurasi_model->get_one_row()->result_array()[0];
    echo json_encode($config);
  }
  public function json_settings()
  {
    $settings = $this->settings_model->get_settings()->result()[0];
    $defaults = $this->get_default_settings();
    foreach($settings as $field => $value){
      if($value==''){
        $newSettings[$field] = $defaults[$field];
      } else {
        $newSettings[$field] = $value;
      }
    }
    echo json_encode($newSettings);
  }
  public function json_playlist()
  {
    $playlist = $this->playlist_model->get_all()->result_array();
    echo json_encode($playlist);
  }
  public function json_playlist_backup()
  {
    $dir = '/xamppbaru/htdocs/nori-magang/assets/playlist';
    $files = scandir($dir);
    //
    $found = 0;
    for($i=0;true;$i++){
      if(!isset($files[$i])){
        break;
      }
      $title = $files[$i];
      if(preg_match('/^[1-9].*\.(bmp|jpeg|png|jpg|mp4|mkv|webm)$/i',$title)){
        $playlist[$found] = $title;
        $found++; 
      }
    }
    //
    if(isset($playlist)){
      echo json_encode($playlist);  
    } else {
      echo 'none found';
    } 
  }
}
?>