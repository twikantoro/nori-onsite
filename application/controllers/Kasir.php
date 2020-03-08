<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('user_model','settings_model','konfigurasi_model'));
    if(!isset($_SESSION['nori_user'])){
      redirect('auth');
    }
  }

  public function index()
  {
    $this->dashboard();
  }

  public function dashboard()
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
    $data2['judul'] = 'Dashboard - SiNori';
    $this->load->view('kasir/head',$data2);
    $this->load->view('kasir/navbar');
    $this->load->view('kasir/sidebar');
    $this->load->view('kasir/content/dashboard',$data);
    $this->load->view('kasir/footer');
  }
  public function pengaturanAkun()
  {
    if($_SESSION['nori_user']['role']=='admin'){
      redirect('admin/pengaturan_akun');
    }
    $where = array('id' => $_SESSION['nori_user']['id']);
    $data2 = $this->user_model->get_one($where)->result_array()[0];
    $data['judul'] = 'Kasir - SiNori';
    $this->load->view('kasir/head',$data);
    $this->load->view('kasir/navbar');
    $this->load->view('kasir/sidebar');
    $this->load->view('kasir/content/akun',$data2);
    $this->load->view('kasir/footer');
  }
  public function layar_utama()
  {
    redirect('antrian');
  }
  public function submitAkun()
  {
    $where = array('id' => $_SESSION['nori_user']['id']);
    $data = array(
      'nama' => $_POST['nama'],
      'username' =>$_POST['username']
    );
    //username beda?
    if($_POST['username']!==$_SESSION['nori_user']['username']){
      //username dah ada?
      $exists = array('username' => $_POST['username']);
      if($this->user_model->exists($exists)){
        $json['success']=false;
        $json['message']='Username sudah dipakai';
        echo json_encode($json);
        return false;
      }
    }
    $this->user_model->update($where,$data);
    $json['success'] = true;
    echo json_encode($json);
  }
  public function submitPassword()
  {
    //password lama tidak benar?
    $exists = array('password' => md5($_POST['password_lama']));
    if(!$this->user_model->exists($exists)){
      $json['success']=false;
      $json['message']='Password Salah';
      echo json_encode($json);
      return false;
    }
    //password baru terkonfirmasi?
    if($_POST['password_baru']!==$_POST['password_baru_konfirmasi']){
      $json['success']=false;
      $json['message']='Password konfirmasi tidak sama';
      echo json_encode($json);
      return false;
    } else {
      $where = array (
        'id' => $_SESSION['nori_user']['id']
      );
      $data = array(
        'password' => md5($_POST['password_baru'])
      );
      $json = array(
        'success' => true,
        'message' => 'Berhasil'
      );
      echo json_encode($json);
    }
    $this->user_model->update($where,$data);
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
}