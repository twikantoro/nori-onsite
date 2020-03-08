<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antrian extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->database();
    $this->load->library('session');
    $this->load->model('antrian_model');
  }
  public function index()
  {
    $this->load->view('antrian/layarutamab');
  }
  public function layarutama()
  {
    // $this->load->view('antrian/before_mainmenu2');
    $data['USD'] = number_format((double)explode(".",substr($this->CallAPI('GET',
                                                                           'https://api.exchangeratesapi.io/latest?base=USD&symbols=IDR'), 29,11))[0],0,",",".");
    $data['SGD'] = number_format((double)explode(".",substr($this->CallAPI('GET',
                                                                           'https://api.exchangeratesapi.io/latest?base=SGD&symbols=IDR'), 29,11))[0],0,",",".");
    $data['EUR'] = number_format((double)explode(".",substr($this->CallAPI('GET',
                                                                           'https://api.exchangeratesapi.io/latest?base=EUR&symbols=IDR'), 29,11))[0],0,",",".");
    $data['AUD'] = number_format((double)explode(".",substr($this->CallAPI('GET',
                                                                           'https://api.exchangeratesapi.io/latest?base=AUD&symbols=IDR'), 29,11))[0],0,",",".");
    $data['DKK'] = number_format((double)explode(".",substr($this->CallAPI('GET',
                                                                           'https://api.exchangeratesapi.io/latest?base=DKK&symbols=IDR'), 29,11))[0],0,",",".");
    $data['SEK'] = number_format((double)explode(".",substr($this->CallAPI('GET',
                                                                           'https://api.exchangeratesapi.io/latest?base=SEK&symbols=IDR'), 29,11))[0],0,",",".");
    $data['CAD'] = number_format((double)explode(".",substr($this->CallAPI('GET',
                                                                           'https://api.exchangeratesapi.io/latest?base=CAD&symbols=IDR'), 29,11))[0],0,",",".");
    $data['CHF'] = number_format((double)explode(".",substr($this->CallAPI('GET',
                                                                           'https://api.exchangeratesapi.io/latest?base=CHF&symbols=IDR'), 29,11))[0],0,",",".");
    $data['NZD'] = number_format((double)explode(".",substr($this->CallAPI('GET',
                                                                           'https://api.exchangeratesapi.io/latest?base=NZD&symbols=IDR'), 29,11))[0],0,",",".");
    $data['GBP'] = number_format((double)explode(".",substr($this->CallAPI('GET',
                                                                           'https://api.exchangeratesapi.io/latest?base=GBP&symbols=IDR'), 29,11))[0],0,",",".");
    $data['HKD'] = number_format((double)explode(".",substr($this->CallAPI('GET',
                                                                           'https://api.exchangeratesapi.io/latest?base=HKD&symbols=IDR'), 29,11))[0],0,",",".");
    $shitJPY=substr($this->CallAPI('GET','https://api.exchangeratesapi.io/latest?base=JPY&symbols=IDR'), 29,11);
    $shitJPY=(double)$shitJPY;
    $shitJPY=$shitJPY*100;
    $data['JPY']=number_format(explode(".",$shitJPY)[0],0,",",".");
    $data['SAR'] = number_format((double)explode(".",substr($this->CallAPI('GET',
                                                                           'https://api.exchangeratesapi.io/latest?base=SAR&symbols=IDR'), 29,11))[0],0,",",".");
    $data['CNY'] = number_format((double)explode(".",substr($this->CallAPI('GET',
                                                                           'https://api.exchangeratesapi.io/latest?base=CNY&symbols=IDR'), 29,11))[0],0,",",".");
    $data['MYR'] = number_format((double)explode(".",substr($this->CallAPI('GET',
                                                                           'https://api.exchangeratesapi.io/latest?base=MYR&symbols=IDR'), 29,11))[0],0,",",".");
    $data['THB'] = number_format((double)explode(".",substr($this->CallAPI('GET',
                                                                           'https://api.exchangeratesapi.io/latest?base=THB&symbols=IDR'), 29,11))[0],0,",",".");
    $this->load->view('antrian/layarutama2', $data);
  }
  public function thejson()
  {


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
  public function addX($jenis)
  {
    $this->db->select('urutan');
    $this->db->from('antrian');
    $this->db->order_by("waktu_masuk", "desc");
    $today = date("Y-m-d");
    $array = array('tanggal >=' => $today,'grup_antrian' => $jenis);
    $this->db->where($array);
    $query = $this->db->get();
    if(empty($query->result())){
      $data['urutan']=1;
    } else {
      foreach ($query->result() as $row)
      {
        $data['urutan']=$row->urutan+1;
        break;
      }
    }
    $data['grup_antrian']=$jenis;
    $data['tanggal']=date("Y-m-d");
    $data['waktu_masuk']=date("Y-m-d H:i:s");
    $this->db->insert('antrian', $data);
  }

  public function nextXY($loket, $jenis)
  {	
    $today = date("Y-m-d");
    $query = $this->db->query("select * from antrian where tanggal = cast(now() as DATE) AND loket IS NULL AND jenis = ".$jenis." ORDER BY waktu_masuk ASC");
    if ($query->result()!=null){
      foreach ($query->result() as $row)
      {
        $urutan=$row->urutan;
        $id=$row->id;
        break;
      }
      $data['waktu_dilayani']=date("H:i:s");
      $data['loket']=$loket;
      $this->db->where(array("id" => $id));
      $this->db->update('antrian',$data);

      //THE JSON
      if($jenis == 0){
        $strjenis = 'A';
      } else $strjenis = 'B';
      $json['visual']=array("jenis" => $strjenis, "nomor" => $urutan);
      if($urutan%2==0){
        $json['audio']=array_merge(array('nomorantrian'.$strjenis),$this->audioId($urutan),array('silahkan_menuju_loket',$loket,
                                                                                                 'jnomorantrian'.$strjenis),$this->audioJawa($urutan),array('jdipunaturi_pinarak_wonten_loket',"j".$loket,'out'));
      } else {
        $json['audio']=array_merge(array('nomorantrian'.$strjenis."cad"),$this->audioId($urutan),array('silahkan_menuju_loket',$loket,'jnomorantrian'.$strjenis),$this->audioJawa($urutan),array('jdipunaturi_pinarak_wonten_loket',"j"	.$loket,'out'));
      }
      $json['soundid']=array('theid' => $this->getSoundId());
      //SESSION
      if(isset($_SESSION['loket'][$loket])){
        $_SESSION['prevloket'][$loket]=$_SESSION['loket'][$loket];
      }
      $_SESSION['loket'][$loket]=$strjenis.$urutan;
      //CETAK
      echo json_encode($json);
    } else {echo json_encode(array('visual'=>'nothing'));}
  }
  public function nextXAutoBackup($loket)
  {	
    $today = date("Y-m-d");
    $query = $this->db->query("select * from antrian where tanggal = cast(now() as DATE) AND waktu_dilayani IS NULL ORDER BY id_antrian ASC");
    if ($query->result()!=null){
      foreach ($query->result() as $row)
      {
        $urutan=$row->urutan;
        $id=$row->id_antrian;
        $jenis=$row->grup_antrian;
        break;
      }
      $data['waktu_dilayani']=date("H:i:s");
      $data['loket']=$loket;
      $this->db->where(array("id_antrian" => $id));
      $this->db->update('antrian',$data);

      //THE JSON
      if($jenis == 'A'){
        $strjenis = 'A';
      } else $strjenis = 'B';
      $json['visual']=array("jenis" => $strjenis, "nomor" => $urutan);
      if($urutan%2==0){
        $json['audio']=array_merge(array('nomorantrian'.$strjenis),$this->audioId($urutan),array('silahkan_menuju_loket',$loket,
                                                                                                 'jnomorantrian'.$strjenis),$this->audioJawa($urutan),array('jdipunaturi_pinarak_wonten_loket',"j".$loket,'out'));
      } else {
        $json['audio']=array_merge(array('nomorantrian'.$strjenis."cad"),$this->audioId($urutan),array('silahkan_menuju_loket',$loket,
                                                                                                       'jnomorantrian'.$strjenis),$this->audioJawa($urutan),array('jdipunaturi_pinarak_wonten_loket',"j".$loket,'out'));
      }


      $json['soundid']=array('theid' => $this->getSoundId());
      //SESSION
      if(isset($_SESSION['loket'][$loket])){
        $_SESSION['prevloket'][$loket]=$_SESSION['loket'][$loket];
      }
      $_SESSION['loket'][$loket]=$strjenis.$urutan;
      //CETAK
      echo json_encode($json);
    } else {echo json_encode(array('visual'=>'nothing'));}
  }
  public function nextXAuto($loket)
  {
    //get first unserved
    $query = $this->antrian_model->get_first_unserved()->result();
    if(!isset($query[0])){
      $json['visual'] = 'nothing';
      echo json_encode($json);
    }
    $query = $this->antrian_model->serve_and_get($loket);
    if(isset($query->result()[0])){
      $row = $query->result()[0];
      $json['visual']['jenis']=$row->grup_antrian;
      $json['visual']['nomor']=$row->urutan;
    }
  }
  public function undoX($loket)
  {
    //RECOGNIZE Y
    if(substr($_SESSION['loket'][$loket], 0, 1)=='A'){
      $jenis = 0;
    } else $jenis = 1;
    //RECOGNIZE URUTAN
    $urutan = substr($_SESSION['loket'][$loket], 1);
    //SET DATABASE
    $this->db->query('update antrian set waktu_dilayani = NULL, loket = NULL where tanggal = cast(now() as DATE) and jenis = '.$jenis.' and urutan = '.$urutan);
    //SET VISUAL
    $_SESSION['loket'][$loket]=$_SESSION['prevloket'][$loket];
    //RE RECOGNIZE
    //RECOGNIZE Y
    if(substr($_SESSION['loket'][$loket], 0, 1)=='A'){
      $jenis = 0;
    } else $jenis = 1;
    //RECOGNIZE URUTAN
    $urutan = substr($_SESSION['loket'][$loket], 1);
    //CETAK
    if($jenis == 0){
      $strjenis = 'A';
    } else $strjenis = 'B';
    $json['visual']=array("jenis" => $strjenis, "nomor" => $urutan);
    if($urutan%2==0){
      $json['audio']=array_merge(array('nomorantrian'.$strjenis),$this->audioId($urutan),array('silahkan_menuju_loket',$loket,
                                                                                               'jnomorantrian'.$strjenis),$this->audioJawa($urutan),array('jdipunaturi_pinarak_wonten_loket',"j".$loket,'out'));
    } else {
      $json['audio']=array_merge(array('nomorantrian'.$strjenis."cad"),$this->audioId($urutan),array('silahkan_menuju_loket',$loket,
                                                                                                     'jnomorantrian'.$strjenis),$this->audioJawa($urutan),array('jdipunaturi_pinarak_wonten_loket',"j".$loket,'out'));
    }
    $json['soundid']=array('theid' => $this->getSoundId());
    echo json_encode($json);
  }
  public function audioId($angka)
  {
    if($angka<=99){$length=2;$satuanpuluhan=$angka;}
    if($angka>99){$length=3;$satuanpuluhan=$angka%100;}
    if($angka>999){$length=4;$satuanpuluhan=$angka%1000;$ratusan=$angka%10;}

    //jeda
    if($satuanpuluhan==0){}
    if($satuanpuluhan<=19&&$satuanpuluhan>0){$temp = array($satuanpuluhan);}
    if($satuanpuluhan<=99&&$satuanpuluhan>19){
      $puluhan=floor($satuanpuluhan/10)*10;
      $satuan=$angka%10;
      if($satuan==0){$temp = array($puluhan);}
      else{$temp = array($puluhan,$satuan);}
    }
    if($length==3&&$angka<200){
      $ratusan=floor($angka/100)*100;
      if(isset($temp)&&$ratusan>0){
        $temp=array_merge(array($ratusan),$temp);
      } else if($ratusan>0){
        $temp=array($ratusan);
      }
    } else {
      $ratusan=floor($angka/100);
      if(isset($temp)&&$ratusan>0){
        $temp=array_merge(array($ratusan,'ratus'),$temp);
      } else if($ratusan>0){
        $temp=array($ratusan,'ratus');
      }
    }
    if($length==4){
      $ribuan=floor($angka/1000)*1000;
      $temp=array_merge(array($ribuan),$temp);
    }
    if(isset($temp)){
      return $temp;
    } else return 0;
  }
  public function cobaangka(){

    for($i=0;$i<=400;$i++){
      echo $i.". ".json_encode($this->audioJawa($i))."<br/>";
    }
  }
  public function audioJawa($angka)
  {
    if($angka<=99){$length=2;$satuanpuluhan=$angka;}
    if($angka>99){$length=3;$satuanpuluhan=$angka%100;}
    if($angka>999){$length=4;$satuanpuluhan=$angka%1000;}

    //jeda
    if($satuanpuluhan==0){}
    if($satuanpuluhan<=29&&$satuanpuluhan>0){$temp = array("j".$satuanpuluhan);}
    if($satuanpuluhan<=99&&$satuanpuluhan>29){
      $puluhan=floor($satuanpuluhan/10)*10;
      $satuan=$angka%10;
      if($satuan==0){$temp = array("j".$puluhan);}
      else{$temp = array("j".$puluhan,"j".$satuan);}
    }
    if($length>=3){
      $ratusan=floor($angka/100)*100;
      if(isset($temp)){
        $temp=array_merge(array("j".$ratusan),$temp);
      } else {
        $temp=array("j".$ratusan);
      }
    }
    if($length==4){
      $ribuan=floor($angka/1000)*1000;
      $temp=array_merge(array("j".$ribuan),$temp);
    }
    if(isset($temp)){
      return $temp;
    } else return 0;
  }
  public function recallX($loket){
    //RECOGNIZE Y
    if(substr($_SESSION['loket'][$loket], 0, 1)=='A'){
      $jenis = 0;
    } else $jenis = 1;
    //RECOGNIZE URUTAN
    $urutan = substr($_SESSION['loket'][$loket], 1);
    //PRINT
    if($jenis == 0){
      $strjenis = 'A';
    } else $strjenis = 'B';
    $json['visual']=array("jenis" => $strjenis, "nomor" => $urutan);
    if(!isset($_SESSION['recallcad'])){
      $_SESSION['recallcad']=false;
    }
    if($_SESSION['recallcad']==false){
      $json['audio']=array_merge(array('nomorantrian'.$strjenis."recall"),$this->audioId($urutan),array('silahkan_menuju_loket',$loket,
                                                                                                        'jnomorantrian'.$strjenis),$this->audioJawa($urutan),array('jdipunaturi_pinarak_wonten_loket',"j".$loket,'out'));
      $_SESSION['recallcad']=true;
    } else {
      $json['audio']=array_merge(array('nomorantrian'.$strjenis."recallcad"),$this->audioId($urutan),array('silahkan_menuju_loket',$loket,
                                                                                                           'jnomorantrian'.$strjenis),$this->audioJawa($urutan),array('jdipunaturi_pinarak_wonten_loket',"j".$loket,'out'));
      $_SESSION['recallcad']=false;
    }


    $json['soundid']=array('theid' => $this->getSoundId());
    echo json_encode($json);
  }
  public function getSoundId()
  {
    if(isset($_SESSION['soundid'])){
      $_SESSION['soundid']++;
      return $_SESSION['soundid'];
    } else {
      $_SESSION['soundid']=1;
      return 1;
    }
  }
  public function customY($jenis,$nomor){
    $today = date("Y-m-d");
    $this->db->query("delete from `antrian` where tanggal = cast(now() as DATE) AND jenis = $jenis");
    $data['urutan']=$nomor;
    $data['jenis']=$jenis;
    $data['tanggal']=date("Y-m-d");
    $data['waktu_masuk']=date("H:i:s");
    $this->db->insert('antrian',$data);

  }
  function CallAPI($method, $url, $data = false)
  {
    $curl = curl_init();

    switch ($method)
    {
      case "POST":
        curl_setopt($curl, CURLOPT_POST, 1);

        if ($data)
          curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        break;
      case "PUT":
        curl_setopt($curl, CURLOPT_PUT, 1);
        break;
      default:
        if ($data)
          $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
  }
  function pagePengaturan(){
    include ('Admin/pengaturan.php');
  }
  function get_many_unserved($many)
  {
    $query = $this->antrian_model->get_many_unserved($many);
    echo json_encode($query->result());
  }
  function get_many_served($many)
  {
    $query = $this->antrian_model->get_many_served($many);
    echo json_encode($query->result());
  }
  function get_last_unserved()
  {
    $query = $this->antrian_model->get_last_unserved()->result();
    if(isset($query[0])){
      $row = $query[0];
      $unserved = $row->grup_antrian;
      $unserved = $unserved.$row->urutan;
      $json['unserved'] = $unserved;
    } else {
      $json['unserved'] = 0;
    }
    echo json_encode($json);
  }
  function get_first_unserved()
  {
    $query = $this->antrian_model->get_first_unserved()->result();
    if(isset($query[0])){
      $row = $query[0];
      $unserved = $row->grup_antrian;
      $unserved = $unserved.$row->urutan;
      $json['unserved'] = $unserved;
    } else {
      $json['unserved'] = 0;
    }
    echo json_encode($json);
  }
  function get_firstnlast_unserved()
  {
    $query = $this->antrian_model->get_first_unserved()->result();
    if(isset($query[0])){
      $row = $query[0];
      $unserved = $row->grup_antrian;
      $unserved = $unserved.$row->urutan;
      $json['unservedFirst'] = $unserved;
    } else {
      $json['unservedFirst'] = 0;
    }
    $query = $this->antrian_model->get_last_unserved()->result();
    if(isset($query[0])){
      $row = $query[0];
      $unserved = $row->grup_antrian;
      $unserved = $unserved.$row->urutan;
      $json['unservedLast'] = $unserved;
    } else {
      $json['unservedlast'] = 0;
    }
    echo json_encode($json);
  }
  function layani($loket,$id)
  {
    $this->antrian_model->layani($loket,$id);
  }
  function get_firstnlast_served()
  {
    $query = $this->antrian_model->get_first_served()->result();
    if(isset($query[0])){
      $row = $query[0];
      $unserved = $row->grup_antrian;
      $unserved = $unserved.$row->urutan;
      $json['servedFirst'] = $unserved;
    } else {
      $json['servedFirst'] = 0;
    }
    $query = $this->antrian_model->get_last_served()->result();
    if(isset($query[0])){
      $row = $query[0];
      $unserved = $row->grup_antrian;
      $unserved = $unserved.$row->urutan;
      $json['servedLast'] = $unserved;
    } else {
      $json['servedlast'] = 0;
    }
    echo json_encode($json);
  }
  function undo($id)
  {
    $this->antrian_model->undo($id);
  }
  function resetAntrian()
  {
    $this->antrian_model->resetAntrian();
  }
  function getUrutanInLokets()
  {
    $json['loket1_urutan'] = $this->antrian_model->getUrutanInLoket(1);
    $json['loket2_urutan'] = $this->antrian_model->getUrutanInLoket(2);
    $json['loket3_urutan'] = $this->antrian_model->getUrutanInLoket(3);
    $json['loket4_urutan'] = $this->antrian_model->getUrutanInLoket(4);
    $json['loket5_urutan'] = $this->antrian_model->getUrutanInLoket(5);
    $json['loket6_urutan'] = $this->antrian_model->getUrutanInLoket(6);
    echo json_encode($json);
  }
  function getAudio($loket,$urutanPlus='')
  {
    $urutan = substr($urutanPlus,1);
    $strjenis = substr($urutanPlus,0,1);
    if($urutan%2==0){
      $json['audio']=array_merge(array('nomorantrian'.$strjenis),$this->audioId($urutan),array('silahkan_menuju_loket',$loket,
                                                                                               'jnomorantrian'.$strjenis),$this->audioJawa($urutan),array('jdipunaturi_pinarak_wonten_loket',"j".$loket,'out'));
    } else {
      $json['audio']=array_merge(array('nomorantrian'.$strjenis."cad"),$this->audioId($urutan),array('silahkan_menuju_loket',$loket,
                                                                                                     'jnomorantrian'.$strjenis),$this->audioJawa($urutan),array('jdipunaturi_pinarak_wonten_loket',"j".$loket,'out'));
    }
    $json['soundid']=array('theid' => $this->getSoundId());
    echo json_encode($json);
  }
}
