<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SiKarang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="<?php echo base_url()?>vendor/thomaspark/bootswatch/docs/4/cosmo/bootstrap.css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url()?>vendor/thomaspark/bootswatch/docs/_assets/css/custom.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <script>

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-23019901-1']);
      _gaq.push(['_setDomainName', "bootswatch.com"]);
      _gaq.push(['_setAllowLinker', true]);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>
    <style>
      .btnlayarutama {
        height:20vw; width:20vw; background-color: #2780E3;
      }
      .btnlayarutama:hover {
        background-color: #1A6DCA;
      }

    </style>
  </head>
  <body>
    <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
      <div class="container">
        <a href="../" class="navbar-brand">SiKarang</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">

          </ul>

          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="http://builtwithbootstrap.com/" target="_blank">Petunjuk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://wrapbootstrap.com/?ref=bsw" target="_blank">Tentang</a>
            </li>
          </ul>

        </div>
      </div>
    </div>


    <div class="container">

      <div class="bs-docs-section">
        <div style="background-color: transparent;font-weight:bold !important; font-size; color: white">
          <a class="btn btn-success" style="height:5vw; width:20vw; background-color: white !important; border-color: white !important">
            <div style="font-size: 2em; font-weight:600;float: margin: auto;">
              Pengunjung
            </div>
          </a>
          <a class="btn btn-success" target="_blank" style="height:5vw; width:20vw;" href="<?php echo site_url('antrian/layarutama')?>">
            <div style="font-size: 2em; font-weight:600;float: margin: auto;">
              Layar Utama
            </div>
            <i class="fa fa-fw fa-desktop" style="height:10vw;width:10vw"></i>
          </a>
          <a class="btn btn-warning" target="_blank" style="height:5vw; width:20vw;" href="<?php echo site_url('admin')?>">
            <div style="font-size: 2em; font-weight:600;float: margin: auto;">
              Pengaturan
            </div>
          </a>
          <a class="btn btn-warning" style="height:5vw; width:20vw; background-color: white !important; border-color: white !important" href="<?php echo site_url('pegawai')?>">
            <div style="font-size: 2em; font-weight:600;float: margin: auto;">
              Kasir
            </div>
          </a>
        </div>
        <a class="btn btn-success" style="height:5vw; width:20vw; background-color: white !important; border-color: white !important">
        </a>
        Pastikan anda menjalankan layar utama secara Full-Screen (tekan F11)
      </div>

    </div>

    <script src="<?php echo base_url()?>vendor/thomaspark/bootswatch/docs/_vendor/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url()?>vendor/thomaspark/bootswatch/docs/_vendor/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url()?>vendor/thomaspark/bootswatch/docs/_vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>vendor/thomaspark/bootswatch/docs/_assets/js/custom.js"></script>
  </body>
</html>
