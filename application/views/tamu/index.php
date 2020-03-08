<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nori Guest</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php base_url(); ?>vendor/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php base_url(); ?>assets/dist/css/adminlte.mod.css">
    <!-- Google Font: Source Sans Pro -->
    <!--  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">-->

    <!-- Bootstrap CSS -->
    <!--    <link rel="stylesheet" href="<?php base_url(); ?> vendor/bootstrap/4.0.0/css/bootstrap.min.css">-->
    <!--  Custom CSS  -->
    <!--    <link rel="stylesheet" href="assets/css/login.css">-->
    <style>
      body {
        background-image: linear-gradient(#ddd, #eee, #ddd) !important;
      }
      #login_sebagai {
        position: fixed;
        bottom: 5px;
        right: 50vw;
        display: none;
      }
    </style>

  </head>
  <body class="hold-transition login-page">
    <div id="login_sebagai">Login sebagai <a href="<?php echo base_url('admin');?>">admin</a></div>
    <div class="login-box">
      <div class="login-logo">
        <!--        <img style="height: 2em" src="assets/images/bilogohitam.png"><br>-->
        <a>Si<b>Nori</b></a>
      </div>
      <!-- /.login-logo -->
      <div style="color: #495057" class="card">
        <div class="card-body">
          <h5>Antrian saat ini</h5>
          <div id="box_info" class="small-box bg-gradient-info">
            <div class="inner">
              <h3 style="text-align: center" id="terpanggil">...</h3>

              <p style="text-align: center">Telah dipanggil</p>
            </div>

            <p style="color:white" href="#" class="small-box-footer">Total <b id="total">...</b> terdaftar</p>
          </div>

          <!-- DIV DAFTAR -->
          <div style="display:none" id="div_daftar" class="elemen">
            <div class="text-center">
              <p>- Daftar antrian online -</p>
            </div>


            <div class="input-group mb-3" style="margin-bottom: 10px !important;">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">+62</span>
              </div>
              <input type="text" id="no_hp" class="form-control" placeholder="Nomor HP" aria-label="Username" aria-describedby="basic-addon1">

            </div>
            <input id="btndaftar" class="btn btn-primary float-right" style="width: 100%" type="submit" value="Daftar">
            <input id="btn_batal_daftar" class="btn btn-outline-primary float-right" style="width: 100%; display:none; margin-top: 5px" value="Batal" type="submit">
            <div id="warning_terdaftar" style="padding-top: 60px !important; display: none" class="text-center">
              <p  style="">Nomor HP sudah terdaftar. Apakah anda berkenan <a href="#" id="login_link">login</a>  untuk <b>mempertahankan nomor urut</b> atau <a href="#" id="daftar_link">daftar</a> antrian baru?</p>
            </div>
            <p class="float-right" style="margin-top:0.3em !important; margin-bottom: 0px;">
              <a id="a_dah_daftar" href="#">Saya sudah daftar hari ini</a>
            </p>
          </div>

          <!-- DIV LOGIN -->
          <div style="display:none" id="div_login" class="elemen">
            <div class="text-center">
              <p>- Silahkan masuk untuk memonitor nomor urut dan perkiraan waktu dipanggil -</p>
            </div>
            <div class="input-group mb-3" style="margin-bottom: 10px !important;">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">+62</span>
              </div>
              <input type="text" id="no_hp_login" class="form-control" placeholder="Nomor HP" aria-label="Username" aria-describedby="basic-addon1">

            </div>
            <div class="input-group mb-3" style="margin-bottom: 10px !important;">

              <input type="text" id="pin_kode" class="form-control" placeholder="Kode PIN" aria-label="Username" aria-describedby="basic-addon1">

            </div>
            <div class="text-center">
              <p id="feedback" style="display: none; color: red">Kombinasi nomor HP dan kode PIN tidak ditemukan</p>
            </div>
            <input id="btnlogin" class="btn btn-primary float-right" style="width: 100%" type="submit" value="Masuk">
            <input id="btn_batal_login" class="btn btn-outline-primary float-right" style="width: 100%; margin-top:5px" type="submit" value="Batal">
            <p class="float-right" style="margin-top:0.3em !important; margin-bottom: 0px;">
              <a id="a_daftar_lagi" href="#">Daftar lagi</a>
            </p>

          </div>

          <!-- DIV TUNGGU -->
          <div style="display:none" id="div_tunggu" class="elemen">
            <div id="p_tunggu" class="text-center">
              <p>- Silahkan tunggu. Mohon datang 15 menit sebelum perkiraan waktu dipanggil -</p>
            </div>
            <h5>Antrian anda</h5>
            <div id="box_menunggu" class="small-box bg-gradient-warning">
              <div class="inner">
                <h3 id="urutan" style="text-align: center">...</h3>

                <p style="text-align: center">PIN <b id="pin_kode_show">****</b></p>
              </div>
              <!-- p terlambat -->
              <p id="p_terlambat" style="color:#495057;display:none" href="#" class="small-box-footer">Anda sudah dipanggil</p>
              <!-- p terlambat 2 -->
              <p id="p_terlambat_2" style="color:#495057;display:none" href="#" class="small-box-footer">Anda akan dipanggil lagi</p>
              <!-- p sedang dipanggil-->
              <p id="p_dipanggil" style="color:white;display:none" href="#" class="small-box-footer">Anda sedang dipanggil!</p>
              <!-- p menunggu -->
              <p id="p_menunggu" style="color:white" href="#" class="small-box-footer">Perkiraan dipanggil pukul <b id="waktu_dipanggil">...</b></p>
            </div>

            <div id="btn_terlambat" style="display:none">
              <input type="submit" class="btn btn-success float-right" style="width: 100%; margin-top:-12.5px;" href="#" id="a_beres" value="Beres">
              <input type="submit" class="btn btn-outline-success float-right" style="width: 100%; margin-top:5px;" href="#" id="a_sudah_di_lokasi" value="Panggil saya lagi">
            </div>

            <p id="a_daftar_lagi_2" class="float-right" style="margin-top:0.3em !important; margin-bottom: 0px; margin-top: -12.5px !important">


              <a  href="#">Daftar lagi</a>
            </p>
          </div>
          <!-- /div -->

        </div>
        <!-- /.login-card-body -->
      </div>
      <div style="font-size: 1em; margin-top: -0.5em" class="login-logo"><a><b>&copy; KPw Bank Indonesia Solo 2019</b></a></div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?php base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php base_url(); ?>assets/dist/js/adminlte.min.js"></script>

    <input type="hidden" id="base_url" value="<?php echo base_url()?>">

    <script>
      url = window.location.href;
      lastSubstr = url.substr(url.length-1);
      if(lastSubstr=='/'){
        window.location.href ="<?php echo base_url();?>tamu";
      }
    </script>
    <script src="assets/js/tamu.js">

    </script>
  </body>
</html>
