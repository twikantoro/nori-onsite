<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    //$_SESSION['alert']='';
    $this->load->model('user_model');
  }

  public function index()
  {
    if($this->logged_in_as()==false){
      redirect('auth/login');
    } else {
      redirect($_SESSION['nori_user']['role']);
    }
  }

  public function logged_in_as()
  {
    if(isset($_SESSION['nori_user']['role'])){
      return $_SESSION['nori_user']['role'];
    } else {
      return false;
    }
  }

  public function login()
  {
    $this->load->view('login');
    $_SESSION['alert']='';
  }

  public function login_action()
  {
    $data=$_POST;
    $data['password']=md5($_POST['password']);
    if($this->user_model->exists($data)){
      $user = $this->user_model->get_one($data)->result_array()[0];
      if($user['aktif']==0){
        $_SESSION['alert']='Akun anda belum diaktifkan, silahkan hubungi admin';
        redirect('auth/login');
        return false;
      }
      $_SESSION['nori_user']=$user;
      $this->index();
    } else {
      $_SESSION['alert']='Kombinasi username dan password tidak ditemukan';
      redirect('auth/login');
    }
  }

  public function logout()
  {
    $this->logout_action();
    redirect('auth');
  }
  
  public function logout_action()
  {
    session_destroy();
  }

  public function register()
  {
    $this->load->view('register');
  }

  public function register_action()
  {
    $where['username']=$_POST['username'];
    if($this->user_model->exists($where)){
      redirect('auth/register');
      $_SESSION['alert']='username exists';
    } else {
      $data = $_POST;
      $data['aktif'] =0;
      $this->user_model->create($data);
      redirect('auth/login');
    }
  }
}