<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Antrian | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url()?>vendor/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url()?>vendor/almasaeed2010/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url()?>vendor/almasaeed2010/adminlte/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?php echo base_url()?>assets/index2.html">Mesin <b>Antrian</b></a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in untuk memulai sesi anda</p>

          <form action="<?php echo base_url()?>auth/login_action" method="post">
            <div class="input-group mb-3">
              <input type="text" name="username" class="form-control" placeholder="Username">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" name="password" class="form-control" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <!-- /.col -->
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>

          <p class="mb-1" style="color: red">
            <span><?php if(isset($_SESSION['alert'])){
  echo $_SESSION['alert'];} ?></span>
          </p>
          
          <p class="mb-0">
            <a href="<?php echo base_url('auth/register')?>" class="text-center">Daftar akun</a>
          </p>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?php echo base_url()?>vendor/almasaeed2010/adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url()?>vendor/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url()?>vendor/almasaeed2010/adminlte/dist/js/adminlte.min.js"></script>

  </body>
</html>
