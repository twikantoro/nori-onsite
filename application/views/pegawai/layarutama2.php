<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
  <head>
    <title>SiKarang</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css') ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/nori2.css') ?>"/>
    <script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <style>
      body {
        height: 100vh;

        /*background: linear-gradient(to right, #5c6a73, #ffffff, #5c6a73);*/
        background-image: url('<?php echo base_url()?>assets/images/bg-lines.jpg');
        font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
      }
      .bilogo {
        width:95%;height:20%;margin:auto;margin-bottom:1.5vw;
        padding:0px;background-image: url('<?php echo base_url()?>assets/images/bilogofull.png');
        background-size:contain;background-repeat: no-repeat;background-position:center;
      }
      .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
        margin-top: calc(50vh - 60px);
        margin-left: calc(50vw - 60px);
      }

      /* Safari */
      @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
      }

      @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
      }
    </style>
  </head>
  <body onkeydown="fungsiKeyPress()">
    <input type="hidden" id="base_url" value="<?php echo base_url()?>">
    <!-- Modal -->
    <div id="loadingpopup" style="position: fixed; width: 100vw; height: 100vh; z-index: 1001; background-color: #333333; opacity: 0.6">
      <div class="loader"></div>
    </div>

    <div class="container-fluid" style="padding:0px;margin:0px;overflow:hidden;height:100vh;">
      <!-- <div class="themodal">
<div style="width: 100vw; height: 100vh; opacity: 0.8; z-index: 900; color: black; background-color: black; position: absolute; display: block">

</div>
<div style="width: 20vw; height: 20vh; background-color: white; margin: auto; position: absolute; z-index: 901;">

</div>
</div> -->
      <div class="modal fade in" id="customAmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none !important; padding-right: 17px; opacity: 1; top: 100px">
        <div class="modal-dialog modal-sm">
          <div class="modal-content" style="top:40px !important">
            <div class="modal-header">
              <button type="button" onclick="tutupmodalA()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body" style="">
              <p>Antrian yang akan dipanggil:</p>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">A</span>
                </div>
                <input id="customAinput"  type="number" class="form-control" placeholder="" aria-label="Nomor urut" aria-describedby="basic-addon1">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" id="customAbutton" onclick="customAset()" class="btn btn-default" data-dismiss="modal">Oke</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade in" id="customBmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none !important; padding-right: 17px; opacity: 1; top: 100px">
        <div class="modal-dialog modal-sm">
          <div class="modal-content" style="top:40px !important">
            <div class="modal-header">
              <button type="button" onclick="tutupmodalB()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body" style="">
              <p>Antrian yang akan dipanggil:</p>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">B</span>
                </div>
                <input id="customBinput" type="number" class="form-control" placeholder="" aria-label="Nomor urut" aria-describedby="basic-addon1">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" id="customBbutton" onclick="customBset()" class="btn btn-default" data-dismiss="modal">Oke</button>
            </div>
          </div>
        </div>
      </div>
      <div class="row" style="z-index: 898; position: relative; height: 94.5vh; overflow: hidden;">
        <!-- THE MAIN COLL -->
        <div class="col" style="background-color:transparent;height:100vh;padding:1vw;margin-top: 1.5vh;">
          <div style="width:60vw;height:15vh;background-color:;margin-left:1vw;margin-bottom:1vw;

                      background-size: 40vw auto; background-repeat: no-repeat;">
            <div style="width:40vw; height: 100%; 
                        background-image: url('<?php echo base_url()?>assets/images/bilogofull.png');
                        background-size: 40vw auto; background-repeat: no-repeat;
                        margin-left: 10vw;
                        ">
            </div>
          </div>
          <div style="width:50vw;height:28.125vw !important;background-color:black;overflow:hidden;position:absolute;left:7vw">
            <video id="vid" loop volume="0" autoplay style="width:50vw;height:28.125vw !important;">

            </video>
          </div>
          <!-- KOTAK INFORMASI -->
          <div class="kotakinformasi">
            <div class="row tableheader" style="height: 5vh;">
              <table style="height: 5vh; width: calc(100% - 2vw); text-align: center; margin-left:1vw; margin-right:1vw; position: relative; z-index: 1000;">
                <tr style="height: 100%" class="kotakkurs">
                  <td style="width: 8vw; border-right: 2px solid transparent">Mata Uang</td>
                  <td style="width: 8.5vw; border-right: 2px solid transparent">Nilai</td>
                  <td style="width: 8.5vw; border-right: 2px solid rgb(218,218,218)">Kurs</td>
                  <td style="width: 8vw; border-right: 2px solid transparent">Mata Uang</td>
                  <td style="width: 8.5vw; border-right: 2px solid transparent">Nilai</td>
                  <td >Kurs</td>
                </tr>
              </table>
            </div>
            <table id="kontenkurs1" style="height: 5vh; width: 100%; text-align: center; margin-right:1vw; background-color: #e9e9e9 ; color: #333333; font-weight: 500; animation-name: phase1; animation-duration: 1s; overflow: hidden; position: relative; z-index: 999">
              <tr style="height: 5vh" id="USD-AUD">
                <td style="width: 8vw; border-right: 2px solid rgb(218,218,218);">USD</td>
                <td style="width: 8.5vw; border-right: 2px solid rgb(218,218,218)">1</td>
                <td style="width: 8.5vw; border-right: 2px solid rgb(218,218,218)"><?php echo $USD; ?></td>
                <td style="width: 8vw; border-right: 2px solid rgb(218,218,218)">SGD</td>
                <td style="width: 8.5vw">1</td>
                <td><?php echo $SGD; ?></td>

              </tr>
              <tr style="height: 5vh" id="SGD-DKK">
                <td style="width: 8vw; border-right: 2px solid rgb(218,218,218);">EUR</td>
                <td style="width: 8.5vw; border-right: 2px solid rgb(218,218,218)">1</td>
                <td style="width: 8.5vw; border-right: 2px solid rgb(218,218,218)"><?php echo $EUR; ?></td>
                <td style="width: 8vw; border-right: 2px solid rgb(218,218,218)">AUD</td>
                <td style="width: 8.5vw">1</td>
                <td><?php echo $AUD; ?></td>
              </tr>
              <tr style="height: 5vh" id="EUR-SEK">
                <td style="width: 8vw; border-right: 2px solid rgb(218,218,218);">DKK</td>
                <td style="width: 8.5vw; border-right: 2px solid rgb(218,218,218)">1</td>
                <td style="width: 8.5vw; border-right: 2px solid rgb(218,218,218)"><?php echo $DKK; ?></td>
                <td style="width: 8vw; border-right: 2px solid rgb(218,218,218)">SEK</td>
                <td style="width: 8.5vw">1</td>
                <td><?php echo $SEK; ?></td>
              </tr>
              <tr style="height: 5vh" id="USD-AUD">
                <td style="width: 8vw; border-right: 2px solid rgb(218,218,218);">CAD</td>
                <td style="width: 8.5vw; border-right: 2px solid rgb(218,218,218)">1</td>
                <td style="width: 8.5vw; border-right: 2px solid rgb(218,218,218)"><?php echo $CAD; ?></td>
                <td style="width: 8vw; border-right: 2px solid rgb(218,218,218)">CHF</td>
                <td style="width: 8.5vw">1</td>
                <td><?php echo $CHF; ?></td>

              </tr>
              <tr style="height: 5vh" id="SGD-DKK">
                <td style="width: 8vw; border-right: 2px solid rgb(218,218,218);">NZD</td>
                <td style="width: 8.5vw; border-right: 2px solid rgb(218,218,218)">1</td>
                <td style="width: 8.5vw; border-right: 2px solid rgb(218,218,218)"><?php echo $NZD; ?></td>
                <td style="width: 8vw; border-right: 2px solid rgb(218,218,218)">GBP</td>
                <td style="width: 8.5vw">1</td>
                <td><?php echo $GBP; ?></td>
              </tr>
              <tr style="height: 5vh" id="EUR-SEK">
                <td style="width: 8vw; border-right: 2px solid rgb(218,218,218);">HKD</td>
                <td style="width: 8.5vw; border-right: 2px solid rgb(218,218,218)">1</td>
                <td style="width: 8.5vw; border-right: 2px solid rgb(218,218,218)"><?php echo $HKD; ?></td>
                <td style="width: 8vw; border-right: 2px solid rgb(218,218,218)">JPY</td>
                <td style="width: 8.5vw">100</td>
                <td><?php echo $JPY; ?></td>
              </tr>
              <tr style="height: 5vh" id="USD-AUD">
                <td style="width: 8vw; border-right: 2px solid rgb(218,218,218);">CNY</td>
                <td style="width: 8.5vw; border-right: 2px solid rgb(218,218,218)">1</td>
                <td style="width: 8.5vw; border-right: 2px solid rgb(218,218,218)"><?php echo $CNY; ?></td>
                <td style="width: 8vw; border-right: 2px solid rgb(218,218,218);">MYR</td>
                <td style="width: 8.5vw; border-right: 2px solid rgb(218,218,218)">1</td>
                <td style="width: 8.5vw; border-right: 2px solid rgb(218,218,218)"><?php echo $MYR; ?></td>

              </tr>
              <tr style="height: 5vh" id="EUR-SEK">
                <td style="width: 8vw; border-right: 2px solid rgb(218,218,218);">THB</td>
                <td style="width: 8.5vw; border-right: 2px solid rgb(218,218,218)">1</td>
                <td style="width: 8.5vw; border-right: 2px solid rgb(218,218,218)"><?php echo $THB; ?></td>

              </tr>
            </table>

          </div>
        </div>
        <!-- THE MAIN COLL B -->
        <div class="col" style="padding:2.5vw;">
          <div class="lokets emphasize-dark">
            <div class="row" style="padding-left: 2.1vh">
              <div class="" style="width:35%;height:100%;padding:2.1vh !important;margin-right:-7vh;">
                <div class="kotakloket">
                  <div class="tulisanloket">
                    LOKET
                  </div>
                  <div class="angkaloket">
                    1
                  </div>
                </div>
              </div>
              <div class="nomorantrian" id="loket1">
                <?php 
                if(isset($this->session->loket['1'])){
                  echo $this->session->loket['1'];
                } else {echo "A9";}

                ?>
              </div>
            </div>
          </div>
          <div class="lokets emphasize-dark">
            <div class="row" style="padding-left: 2.1vh">
              <div class="" style="width:35%;height:100%;padding:2.1vh !important;margin-right:-7vh;">
                <div class="kotakloket">
                  <div class="tulisanloket">
                    LOKET
                  </div>
                  <div class="angkaloket">
                    2
                  </div>
                </div>
              </div>
              <div class="nomorantrian"  id="loket2">
                <?php 
                if(isset($this->session->loket['2'])){
                  echo $this->session->loket['2'];
                } else {echo "-";}

                ?>
              </div>
            </div>
          </div>
          <div class="lokets emphasize-dark">
            <div class="row" style="padding-left: 2.1vh">
              <div class="" style="width:35%;height:100%;padding:2.1vh !important;margin-right:-7vh;">
                <div class="kotakloket">
                  <div class="tulisanloket">
                    LOKET
                  </div>
                  <div class="angkaloket">
                    3
                  </div>
                </div>
              </div>
              <div class="nomorantrian"  id="loket3">
                <?php 
                if(isset($this->session->loket['3'])){
                  echo $this->session->loket['3'];
                } else {echo "-";}

                ?>
              </div>
            </div>
          </div>
          <div class="lokets emphasize-dark">
            <div class="row" style="padding-left: 2.1vh">
              <div class="" style="width:35%;height:100%;padding:2.1vh !important;margin-right:-7vh;">
                <div class="kotakloket">
                  <div class="tulisanloket">
                    LOKET
                  </div>
                  <div class="angkaloket">
                    4
                  </div>
                </div>
              </div>
              <div class="nomorantrian"  id="loket4">
                <?php 
                if(isset($this->session->loket['4'])){
                  echo $this->session->loket['4'];
                } else {echo "-";}

                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Running TEXT -->
      <div class="row" style="z-index: 899; position: relative; height: 5.5vh; overflow: hidden;
                              background: linear-gradient(to top, #be2525, #ff1919); color:#222222;">
        <marquee direction="left" scrollamount="7" style="text-align:center; font-size: 3.7vh">
          Diberitahukan kepada masyarakat bahwa hari ini adalah hari yang kau tunggu. Bertambah satu tahun usiamu bahagialah kamu. Yang kuberi bukan jam dan cincin bukan seikat bunga 
          atau puisi juga kalung hati. Semoga tuhan melindungi kamu. Semoga tercapai semua angan dan cita-citamu.
        </marquee>
      </div>
    </div>
    <div id="thewholething">
      <audio id="nomorantrianAcad" src="http://localhost/nori/assets/audio/id/nomorantrianA.mp3" type="audio/mpeg"></audio>
      <audio id="nomorantrianBcad" src="http://localhost/nori/assets/audio/id/nomorantrianB.mp3" type="audio/mpeg"></audio>
      <audio id="nomorantrianArecall" src="http://localhost/nori/assets/audio/id/nomorantrianA.mp3" type="audio/mpeg"></audio>
      <audio id="nomorantrianBrecall" src="http://localhost/nori/assets/audio/id/nomorantrianB.mp3" type="audio/mpeg"></audio>
      <audio id="nomorantrianArecallcad" src="http://localhost/nori/assets/audio/id/nomorantrianA.mp3" type="audio/mpeg"></audio>
      <audio id="nomorantrianBrecallcad" src="http://localhost/nori/assets/audio/id/nomorantrianB.mp3" type="audio/mpeg"></audio>

      <?php $audio = array('nomorantrianA', 'nomorantrianB',
                           'silahkan_menuju_loket',
                           '1','2','3','4','5','6','7','8','9','0',
                           '10','11','12','13','14','15','16','17','18','19',
                           '20','30','40','50','60','70','80','90',
                           '100','1000',						
                           'ratus',
                           'out');
      foreach ($audio as $judul){
        echo '<audio id="'.$judul.'" src="'.base_url().'assets/audio/id/'.$judul.'.mp3" type="audio/mpeg"></audio>';
      }

      $jaudio = array('jnomorantrianA', 'jnomorantrianB',
                      'jdipunaturi_pinarak_wonten_loket',
                      'j1','j2','j3','j4','j5','j6','j7','j8','j9','j0',						
                      'j10','j11','j12','j13','j14','j15','j16','j17','j18','j19',
                      'j20','j21','j22','j23','j24','j25','j26','j27','j28','j29',
                      'j30','j40','j50','j60','j70','j80','j90',
                      'j100',
                      'jatus');
      foreach ($jaudio as $judul){
        echo '<audio id="'.$judul.'" src="'.base_url().'assets/audio/jawa/'.$judul.'.mp3" type="audio/mpeg"></audio>';

      }?>
    </div>
    <script src="<?php echo base_url()?>assets/js/pegawai/layarutama2.js">

    </script>
    <script>
      function fungsiKeyPress(){
        var x = event.key;
        //
        if (x == "n" || x == "N") { addA();}
        if (x == "m" || x == "M") { addB();}
        if (x == "k" || x == "K") { insCustomA();}
        if (x == "l" || x == "L") { insCustomB();}
        if (x == "j" || x == "J") { resettozero();}
        if (x == "h" || x == "H") { stopaudio();}
        //Loket 1
        if (x == "q" || x == "Q") { nextXY(1,0);}
        if (x == "w" || x == "W") { nextXY(1,1);}
        if (x == "e" || x == "E") { nextXAuto(1);}
        if (x == "r" || x == "R") { recallX(1);}
        if (x == "t" || x == "T") { undoX(1);}
        //Loket 2
        if (x == "y" || x == "Y") { nextXY(2,0);}
        if (x == "u" || x == "U") { nextXY(2,1);}
        if (x == "i" || x == "I") { nextXAuto(2);}
        if (x == "o" || x == "O") { recallX(2);}
        if (x == "p" || x == "P") { undoX(2);}
        //Loket 3
        if (x == "a" || x == "A") { nextXY(3,0);}
        if (x == "s" || x == "S") { nextXY(3,1);}
        if (x == "d" || x == "D") { nextXAuto(3);}
        if (x == "f" || x == "F") { recallX(3);}
        if (x == "g" || x == "G") { undoX(3);}
        //Loket 4
        if (x == "z" || x == "Z") { nextXY(4,0);}
        if (x == "x" || x == "X") { nextXY(4,1);}
        if (x == "c" || x == "C") { nextXAuto(4);}
        if (x == "v" || x == "V") { recallX(4);}
        if (x == "b" || x == "B") { undoX(4);}
        //DEBUG
        //if (x == "x" || x == "X") { cekTime();}
        //if (x == '.') { nyadangKuy();}
        //Enter

      }
    </script>
  </body>
</html>