<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('antrian_model');
    $this->load->model('konfigurasi_model');
    $this->load->model('settings_model');
    $this->load->model('layanan_model');
    $this->load->model('user_model');
    $this->load->model('playlist_model');
    if(!isset($_SESSION['nori_user'])){
      redirect('auth');
    }
    if($_SESSION['nori_user']['role']!='admin'){
      redirect('auth/login');
    }
    $_SESSION['prev_page']=current_url();
    $this->fileControl();
  }
  public function index()
  {   
    $data['judul'] = 'Admin - SiNori';
    $this->load->view('admin/head',$data);
    $this->load->view('admin/navbar');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/content_dashboard');
    $this->load->view('admin/footer');
  }
  public function activate_loket($loket)
  {
    $status = $this->konfigurasi_model->activate_loket($loket);
    $api['kondisi'] = $status;
    echo json_encode($api);
  }
  public function dashboard_startup_status()
  {
    $query = $this->konfigurasi_model->get_row(1);
    echo json_encode($query);
  }
  public function dashboard_startup_urutan()
  {
    $query = $this->konfigurasi_model->get_all_urutan();
    echo json_encode($query);
  }
  public function pengaturan_tombol()
  {

    //keys2
    $array=$this->konfigurasi_model->get_konfigurasi2();
    $data['array_tombol']=json_decode($array);

    //load page
    $data['judul'] = 'Admin - SiNori';
    $this->load->view('admin/head',$data);
    $this->load->view('admin/navbar');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/content_pengaturan_tombol',$data);
    $this->load->view('admin/footer');
  }
  public function pengaturan_tampilan()
  {
    $data['judul'] = 'Admin - SiNori';
    $this->load->view('admin/head',$data);
    $this->load->view('admin/navbar');
    $this->load->view('admin/sidebar');
    $settings['settings'] = $this->settings_model->get_settings()->result()[0];
    $settings['defaults'] = $this->get_default_settings();
    $this->load->view('admin/content_pengaturan_tampilan_b',$settings);
    $this->load->view('admin/footer');
  }
  public function load_conf()
  {

  }
  public function set_conf_default()
  {
    $conf['loket1_layani'] = 'q';
    $conf['loket2_layani'] = 'y';
    $conf['loket3_layani'] = 'a';
    $conf['loket4_layani'] = 'z';
    $anu = json_encode($conf);
    $data['config_json']=$anu;

    //echo $anu;
    $this->konfigurasi_model->update_konfigurasi($data);
  }
  public function set_button($raw)
  {
    $arr = explode("~",$raw);
    $konf_json = $this->konfigurasi_model->get_konfigurasi2();
    $konf_array = json_decode($konf_json);
    $i=1;
    foreach ($konf_array as $key => $value){
      $new_konf_array[$key] = $arr[$i];
      $i++;
    }
    $data['config_json'] = json_encode($new_konf_array);
    $this->konfigurasi_model->update_konfigurasi($data);
  }
  public function layanan()
  {
    $query = $this->layanan_model->get_layanan();
    $data['layanan'] = $query->result();
    $data['judul'] = 'Admin - SiNori';
    $this->load->view('admin/head',$data);
    $this->load->view('admin/navbar');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/content_layanan',$data);
    $this->load->view('admin/footer');
  }
  public function general_action()
  {
    $data['tata_letak'] = $_POST['tata_letak'];
    $data['running_text'] = $_POST['running_text'];
    //verifyname
    $data['background'] = $_FILES['backgroundImage'];
  }
  public function get_default_settings()
  {
    $data['tata_letak'] = 'klasik';
    $data['background'] = '';
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
  public function get_settings()
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
    return $newSettings;
  }
  public function tampilan_action()
  {
    $minus['klasik'] = '';
    $minus['modern'] = '';
    $data = array_diff_key($_POST,$minus);
    $this->settings_model->update_settings($data);
    redirect('admin/pengaturan_tampilan');
  }
  public function manajemen($perpage=10,$page=1)
  {
    $data['pengguna'] = $this->user_model->get_ten($page);
    $data['judul'] = 'Admin - SiNori';
    $data['page'] = $page;
    $this->load->view('admin/head',$data);
    $this->load->view('admin/navbar');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/content_manajemen');
    $this->load->view('admin/footer');
  }
  public function fetch_user_table($perpage=10,$page=1,$keyword=null)
  {
    $query = $this->user_model->fetch_user_table($perpage,$page,$keyword);
    $start = $perpage*($page-1)+1;
    $stop = $perpage*($page-1)+11;
    $total = $query->num_rows();
    $total_pages = ceil($total/$perpage);
    if($stop>$total){
      $stop = $total;
    }
    $rows['showing'] = $start.' ke '.$stop;
    $rows['total'] =  $total;
    $rows['total_pages'] = $total_pages;
    $rows['table'] = $query->result();
    echo json_encode($rows);
  }
  public function aktivasi($id)
  {
    $where['id'] = $id;
    $data['aktif'] = 1;
    $this->user_model->update($where,$data);
    echo '<script>location.replace(document.referrer);</script>';
  }
  public function deaktivasi($id)
  {
    $where['id'] = $id;
    $data['aktif'] = 0;
    $this->user_model->update($where,$data);
    echo '<script>location.replace(document.referrer);</script>';
  }
  public function angkat($id)
  {
    $where['id'] = $id;
    $data['role'] = 'admin';
    $this->user_model->update($where,$data);
    echo '<script>location.replace(document.referrer);</script>';
  }
  public function backgroundUpload()
  {
    $image_path = realpath(APPPATH).'/../uploads/';
    $config['upload_path']          = $image_path;
    $config['allowed_types']        = 'jpg|png|jpeg|bmp';
    //$config['max_size']             = 100;
    //$config['max_width']            = 1024;
    //$config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('background'))
    {
      $error = array('error' => $this->upload->display_errors());

      //$this->load->view('upload_form', $error);
      $json = array(
        'success' => false,
        'message' => $error
      );
    }
    else
    {
      $data = array('upload_data' => $this->upload->data());

      //$this->load->view('upload_success', $data);
      $json = array(
        'success' => true,
        'data' => $data
      );

      $data2['background'] = $data['upload_data']['file_name'];
      $this->settings_model->update_settings($data2);

      //$this->settings_model->
    }
    echo json_encode($json);
  }
  public function formMedia($urutan,$durasi=null)
  {
    $media_path = realpath(APPPATH).'/../uploads/media/';
    $config['upload_path']          = $media_path;
    $config['allowed_types']        = 'jpg|png|jpeg|bmp|mpeg|mp4';
    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('media'))
    {
      $error = array('error' => $this->upload->display_errors());
      $json = array(
        'success' => false,
        'message' => $error
      );
    }
    else
    {
      $data = array('upload_data' => $this->upload->data());
      $json = array(
        'success' => true,
        'data' => $data
      );
      $row = array(
        'urutan' => $urutan,
        'nama' => $data['upload_data']['file_name'],
        'jenis' => $data['upload_data']['file_type'],
      );
      if(substr($data['upload_data']['file_type'],0,1)=='i'){
        $row['durasi'] = 10;
      } else {
        $row['durasi'] = 'durasi';
      }
      $where['urutan'] = $urutan;
      if($this->playlist_model->exists($where)){
        $this->playlist_model->update($where,$row);
      } else {
        $this->playlist_model->create($row);  
      }
    }
    echo json_encode($json);
  }
  public function formGeneral()
  {
    $this->settings_model->update_settings($_POST);
    $json = array('success'=>true);
    echo json_encode($json);
  }
  public function formWarna()
  {
    $this->settings_model->update_settings($_POST);
    $json = array('success'=>true);
    echo json_encode($json);
  }
  public function json_settings()
  {
    $settings = $this->settings_model->get_settings()->result()[0];
    echo json_encode($settings);
  }
  public function getOverlayHtml(){
    return '<div class="overlay">
                <i class="fas fa-3x fa-sync-alt"></i>
              </div>';
  }
  public function json_medias(){
    $data = $this->playlist_model->get_all()->result();
    echo json_encode($data);
  }
  public function updateUrutan(){
    $urutans = json_decode($_POST['shit']);
    foreach($urutans as $field => $value){
      $where = array(
        'id' => $value
      );
      $data = array(
        'urutan' => $field+1
      );
      $error[$field] = $this->playlist_model->update($where,$data);
    }
    //echo $urutans;
    print_r($error);
  }
  public function removeMedia($id){
    $where = array('id' => $id);
    $this->playlist_model->remove($where);
  }
  public function submitMedia(){
    $urutans = json_decode($_POST['shit']);
    foreach($urutans as $field => $value){
      $where = array(
        'id' => $value
      );
      $data = array(
        'urutan' => $field+1
      );
      $error[$field] = $this->playlist_model->update($where,$data);
    }
    //echo $urutans;
    print_r($error);
  }
  public function fileControl(){
    error_reporting(0);
    //backgrounds
    $used_uploads = array('bgantrian.jpg','media');
    $settings = $this->settings_model->get_settings()->result()[0];
    array_push($used_uploads,$settings->background);
    $image_path = realpath(APPPATH).'/../uploads/';
    $all_uploads = scandir($image_path);
    $to_be_deleted = array_diff($all_uploads,$used_uploads);
    //print_r($to_be_deleted);
    foreach($to_be_deleted as $row => $value){
      unlink($image_path.$value);
    }
    //media
    $used_uploads = array();
    $query = $this->playlist_model->get_all()->result();
    foreach($query as $row){
      array_push($used_uploads,$row->nama);
    }
    $image_path = realpath(APPPATH).'/../uploads/media/';
    $all_uploads = scandir($image_path);
    $to_be_deleted = array_diff($all_uploads,$used_uploads);
    //print_r($to_be_deleted);
    foreach($to_be_deleted as $row => $value){
      unlink($image_path.$value);
    }
    error_reporting(E_ALL);
  }
  public function pengaturan_akun()
  {
    $where = array('id' => $_SESSION['nori_user']['id']);
    $data2 = $this->user_model->get_one($where)->result_array()[0];
    $data['judul'] = 'Admin - SiNori';
    $this->load->view('admin/head',$data);
    $this->load->view('admin/navbar');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/content_pengaturan_akun',$data2);
    $this->load->view('admin/footer');
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
  public function resetPassword()
  {
    $where = array('username' => $_POST['username']);
    $data = array('password' => md5($_POST['password']));
    $this->user_model->update($where,$data);
    $json = array('success' => true);
    echo json_encode($json);
  }
}
?>