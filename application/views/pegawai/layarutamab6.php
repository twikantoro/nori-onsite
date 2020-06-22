<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
  <head>
    <title>Layar Publik - SiNori</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styleb.css') ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css') ?>"/>

    <script src="<?php echo base_url('vendor/almasaeed2010/adminlte/plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('vendor/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.min.js') ?>"></script>
    <style>
      body {
        height: 100vh;
        background: linear-gradient(#0085CA, #003399);
        background-image: url('<?php echo base_url()?>uploads/<?php echo $background ?>');
        background-size: cover;
        font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
      }
      .bilogo {
        width:95%;height:20%;margin:auto;margin-bottom:1.5vw;
        padding:0px;background-image: url('<?php echo base_url()?>assets/images/bilogofull.png');
        background-size:contain;background-repeat: no-repeat;background-position:center;
      }


      .kontener {
        position: relative;
      }
      .runningtext {
        height:3em;
        width:100%;
        background: rgba(0,0,0,0.6);
        color:white;
        position: absolute;
        bottom:0px;
        overflow:hidden;
      }
      .textrunningtext {
        font-size:2em;
        padding-left:10px;
        float: left;
      }
      .kontenerrunningtext {
        width:300vw;
      }

      .kontenervideo2{
        //<!--background-image: url('');-->
        background-size:contain;background-repeat: no-repeat;background-position:center;
        height:33.75vw;width:60vw;
        border:none;
        background-color: black;
        margin: 0px;
      }
      .kontenervideo2 img{
        height:33.75vw;width:60vw;
      }
      .kontenervideo2 video{
        height:33.75vw;width:60vw;
      }

      hr { 
        display: block;
        margin-top: 0.5em;
        margin-bottom: 0.5em;
        margin-left: auto;
        margin-right: auto;
        border-style: inset;
        border-width: 1px;
        width: 80%;
        color: white;
      } 
      .baris {
        width:100%;
      }
      .kol-kiri {
        height: 100vh;
        width: 40vw;
        margin: 0px;
        padding: 1em;
        background-color: blue;
      }
      .kol-kanan {
        height: 100vh;
        //width: 60vw;
        margin: 0px;
        padding: 1em;
        padding-left: 0px;
        background-color: yellow;
      }
      .kiri {
        height:100vh;
        background-color: blue;
      }
      .kanan {
        height:100vh;
        background-color: yellow;
        padding: 10px;
        padding-left: 0px;
      }
      .lokets {
        height:15vh;
        margin:0px;
        margin-bottom:0vw;
        background-color: blue;
        margin-left:1vw !important;
        font-weight: bold;
        font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
      }
      .emphasize-dark {
        box-shadow: 0 0 5px 2px rgba(0,0,0,.35);
        background: <?php echo $loket_border_warna ?>;
        opacity: 0.9;
        border: double 0px;
        //border-style: solid;
        //border-image: linear-gradient(to right, #8f6B29, #FDE08D, #DF9F28) 1 stretch;
        background-origin: border-box;
        background-clip: content-box, border-box;
        //width:100%;margin:auto;margin-bottom:0.2vw;padding:0.35em;overflow:hidden;
        border-radius:20px;
      }
      .kotakloket {
        box-shadow: 0 0 5px 2px rgba(0,0,0,.35);
        border-radius: 15px;
        height: 10.7vh;
        width: 10.7vh;
        background: <?php echo $loket_kotak_warna ?>;
        padding: 5px;
      }
      .tulisanloket {

        height: 25%;
        width: 100%;
        font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        text-align: center;
        color: #111111;
        font-size: 2.1vh;
      }
      .angkaloket {

        width: 100%;
        font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        text-align: center;
        color: #111111;
        margin:auto;
        font-size: 8vh;

        line-height: 1em;
      }
      .nomorantrian {
        font-size: 11.8vh;
        color: <?php echo $loket_text_warna ?>;
        margin:auto;
        margin-top:-1.5vh;
      }
      .scrollingtext {
        width:60vw;height:4.7em !important;
        background-color:#111111;margin-right:1vw;
        position:absolute;bottom:1.5vw;font-size:2em;
        text-align: justify !important;overflow:hidden !important;
        font-weight: 600; padding-left:0.5em; padding-right:0.5em; padding-top:0.3em;
        opacity: 0.9; color: #FFFEEE; border-radius: 1vw; line-height: 1.4em;
        /* -moz-text-align-last: center; text-align-last: center; */
        font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif !important;
      }
      .modal1 {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1050;
        display: block;
        overflow: hidden;
        outline: 0;
      }
      .raningteks {
        background: <?php echo $running_text_background ?>;
        background: black;
        z-index: 899; position: relative; height: 5.5vh; overflow: hidden;
        color: <?php echo $running_text_warna ?>;
      }
      .invisible {
        display: none;
      }

    </style>
  </head>
  <body onkeydown="fungsiKeyPress()">
    <!-- Modal -->

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
      <div class="row" style="z-index: 899; position: relative; height:94.5vh">
        <div class="col" style="padding:1vw;">
          <div id="borderloket1" class="lokets emphasize-dark">
            <div class="row" style="padding-left: 2.1vh">
              <div class="" style="width:35%;height:100%;padding:1.5vh !important;margin-right:-7vh;">
                <div id="kotakloket1" class="kotakloket">
                  <div class="tulisanloket">
                    LOKET
                  </div>
                  <div class="angkaloket">
                    1
                  </div>
                </div>
              </div>
              <div class="nomorantrian" id="loket1_urutan">
                <?php 
  if(isset($this->session->loket['1'])){
    echo $this->session->loket['1'];
  } else {echo "-";}

                ?>
              </div>
            </div>
          </div>
          <div id="borderloket2" class="lokets emphasize-dark">
            <div class="row" style="padding-left: 2.1vh">
              <div class="" style="width:35%;height:100%;padding:1.5vh !important;margin-right:-7vh;">
                <div id="kotakloket2"  class="kotakloket">
                  <div class="tulisanloket">
                    LOKET
                  </div>
                  <div class="angkaloket">
                    2
                  </div>
                </div>
              </div>
              <div class="nomorantrian"  id="loket2_urutan">
                <?php 
                if(isset($this->session->loket['2'])){
                  echo $this->session->loket['2'];
                } else {echo "-";}

                ?>
              </div>
            </div>
          </div>
          <div id="borderloket3" class="lokets emphasize-dark">
            <div class="row" style="padding-left: 2.1vh">
              <div class="" style="width:35%;height:100%;padding:1.5vh !important;margin-right:-7vh;">
                <div id="kotakloket3"  class="kotakloket">
                  <div class="tulisanloket">
                    LOKET
                  </div>
                  <div class="angkaloket">
                    3
                  </div>
                </div>
              </div>
              <div class="nomorantrian"  id="loket3_urutan">
                <?php 
                if(isset($this->session->loket['3'])){
                  echo $this->session->loket['3'];
                } else {echo "-";}

                ?>
              </div>
            </div>
          </div>
          <div id="borderloket4" class="lokets emphasize-dark">
            <div class="row" style="padding-left: 2.1vh">
              <div class="" style="width:35%;height:100%;padding:1.5vh !important;margin-right:-7vh;">
                <div id="kotakloket4"  class="kotakloket">
                  <div class="tulisanloket">
                    LOKET
                  </div>
                  <div class="angkaloket">
                    4
                  </div>
                </div>
              </div>
              <div class="nomorantrian"  id="loket4_urutan">
                <?php 
                if(isset($this->session->loket['4'])){
                  echo $this->session->loket['4'];
                } else {echo "-";}

                ?>
              </div>
            </div>
          </div>
          <div id="borderloket5" class="lokets emphasize-dark">
            <div class="row" style="padding-left: 2.1vh">
              <div class="" style="width:35%;height:100%;padding:1.5vh !important;margin-right:-7vh;">
                <div id="kotakloket5"  class="kotakloket">
                  <div class="tulisanloket">
                    LOKET
                  </div>
                  <div class="angkaloket">
                    5
                  </div>
                </div>
              </div>
              <div class="nomorantrian"  id="loket5_urutan">
                <?php 
                if(isset($this->session->loket['5'])){
                  echo $this->session->loket['5'];
                } else {echo "-";}

                ?>
              </div>
            </div>
          </div>
          <div id="borderloket6" class="lokets emphasize-dark">
            <div class="row" style="padding-left: 2.1vh">
              <div class="" style="width:35%;height:100%;padding:1.5vh !important;margin-right:-7vh;">
                <div id="kotakloket6"  class="kotakloket">
                  <div class="tulisanloket">
                    LOKET
                  </div>
                  <div class="angkaloket">
                    6
                  </div>
                </div>
              </div>
              <div class="nomorantrian"  id="loket6_urutan">
                <?php 
                if(isset($this->session->loket['6'])){
                  echo $this->session->loket['6'];
                } else {echo "-";}

                ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col" style="background-color:transparent;height:100vh;padding:1vw;">
          <div style="width:60vw;height:21vh;background-color:;margin-right:1vw;margin-bottom:1.5vw;
                      ">
            <div style="background-image: url('<?php echo base_url()?>assets/images/bilogofull.png');
                        background-size: 50vw auto; background-repeat: no-repeat;
                        width:100%;height:100%;
                        margin-left:5vw;margin-top:2vw" >
            </div>
          </div>
          <div id="media" style="width:50vw;height:28.125vw !important;background-color:black;overflow:hidden;position:absolute;right:7vw">
            <video id="video" style="width:50vw;height:28.125vw !important;display:none">

            </video>
            <img id="image">
            
          </div>
        </div>
      </div>
      <div class="row raningteks">
        <marquee direction="left" scrollamount="7" style="text-align:center; font-size: 3.7vh"><?php 
  echo $running_text;
          ?></marquee>
      </div>
    </div>
    <div class="invisible" id="loket1_status"></div>
    <div class="invisible" id="loket2_status"></div>
    <div class="invisible" id="loket3_status"></div>
    <div class="invisible" id="loket4_status"></div>
    <div class="invisible" id="loket5_status"></div>
    <div class="invisible" id="loket6_status"></div>
    <input type="hidden" id="loket1_statuss" value="1">
    <input type="hidden" id="loket2_statuss" value="1">
    <input type="hidden" id="loket3_statuss" value="1">
    <input type="hidden" id="loket4_statuss" value="1">
    <input type="hidden" id="loket5_statuss" value="1">
    <input type="hidden" id="loket6_statuss" value="1">
    <audio id="nomorantrianAcad" src="<?php echo base_url()?>/assets/audio/id/nomorantrianA.mp3" type="audio/mpeg"></audio>
    <audio id="nomorantrianBcad" src="<?php echo base_url()?>/assets/audio/id/nomorantrianB.mp3" type="audio/mpeg"></audio>
    <audio id="nomorantrianArecall" src="<?php echo base_url()?>/assets/audio/id/nomorantrianA.mp3" type="audio/mpeg"></audio>
    <audio id="nomorantrianBrecall" src="<?php echo base_url()?>/assets/audio/id/nomorantrianB.mp3" type="audio/mpeg"></audio>
    <audio id="nomorantrianArecallcad" src="<?php echo base_url()?>/assets/audio/id/nomorantrianA.mp3" type="audio/mpeg"></audio>
    <audio id="nomorantrianBrecallcad" src="<?php echo base_url()?>/assets/audio/id/nomorantrianB.mp3" type="audio/mpeg"></audio>

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
    <script src="<?php echo base_url()?>vendor/almasaeed2010/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript">
      window.onload = function (){
        //updateTampilan();
        setInterval(function(){
          setUrutanInLokets();
          cekKeaktifan();
        },1000);
        playNextMedia();
        $('#video').get(0).volume=0
      }
      $('#out').on('ended',function(){
            //$('#video').get(0).volume=1
            console.log('video disuarakan lagi')
          })  
      mediaNumber = 0;
      function playNextMedia(){
        url = '<?php echo base_url() ?>pegawai/json_playlist';
        $.getJSON(url, function(result){
          //console.log(result)
          //console.log(result.length)
          if(mediaNumber==result.length){
            resetMediaNumber()
          }
          title = result[mediaNumber].nama;
          //console.log(title)
          var pattPic= /^.*\.(bmp|jpeg|png|jpg)$/i;
          var pattVid= /^.*\.(mp4|mkv|webm)$/i;
          if(title.match(pattPic)){
            type = 'img';
          } else {
            if(title.match(pattVid)){
              type = 'vid';
            } else {
              type = 'bad';
            }
          }
          var ext = title.substr(title.lastIndexOf(".") + 1);
          var dur = result[mediaNumber].durasi
          //console.log(type)
          if(type=='vid'){
            playVideo(title,ext);
            incMediaNumber();
          } else if(type=='img'){
            playImage(title,ext,dur);
            incMediaNumber();
          }
        });
      }
      function incMediaNumber(){
        this.mediaNumber++;
      }
      function resetMediaNumber(){
        this.mediaNumber = 0;
      }
      function playVideo(title,ext){
        console.log('playing video: '+title)
        $('#video').add('<source src="<?php echo base_url()?>uploads/media/'+title+'" type="video/'+ext+'">').attr('autoplay','true').appendTo('#video')
        //vid = $('#video').get(0)
        //vid.volume = '100%'
        $('#video').get(0).currentTime = 0
        $('#video').get(0).load()
        //vid.play()
        //vidbackup = $('#video').find('source').get(0)
        //vidbackup.volume = '100%'
        $('#video').fadeIn()
        $('#video').on('ended', function(){
          $('#video').empty()
          $('#video').hide()
          playNextMedia()
        })
      }
      function playImage(title,ext,dur){
        //console.log('playing image: '+title+'.'+ext)
        $('#image').attr('src','<?php echo base_url()?>uploads/media/'+title)
        if($('#image').get(0).naturalWidth<=$('#image').get(0).naturalHeight){
          /*$('#image').css('height','28.125vw')
          $('#image').css('width','auto')
          $('#image').css('margin-left','')*/
          $('#image').css('width','50vw')
          $('#image').css('height','auto')
        } else {
          $('#image').css('width','50vw')
          $('#image').css('height','auto')
        }
        $('#image').fadeIn()
        setTimeout(function(){
          $('#image').hide()
          playNextMedia()
        },dur*1000)
      }
      //var kalimat= new Array();
      var nokata=0;
      var panjang=0;
      //setTimeout(updateTampilan,3000); gausah
      var dur=0;
      var currentsoundid = 0;
      var pakeCadangan = false;
      var inputA = document.getElementById("customAinput");
      inputA.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
          event.preventDefault();
          document.getElementById("customAbutton").click();
        }
      });
      var inputB = document.getElementById("customBinput");
      inputB.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
          event.preventDefault();
          document.getElementById("customBbutton").click();
        }
      });
      function nyadangKuy(){
        x = this.pakeCadangan;
        if(x==false){
          this.pakeCadangan=true;
        } else this.pakeCadangan=false;
        return x;
      }
      function getSoundId(){
        return this.currentsoundid;
      }
      function playAudio(judul,soundid,delay){
        //console.log(judul);
        var x = document.getElementById(judul);
        setTimeout(function(){
          currentsoundid=this.getSoundId();
          ////console.log(soundid);
          if(this.currentsoundid==soundid){
            x.play();
          }
          var nganu = setInterval(function(){
            if(this.currentsoundid!=soundid){
              x.pause();
              x.currentTime=0;
              clearInterval(nganu);
            }
          },50);
        },delay);
      }
      function playAudioController(arraudio,soundid){
        //alert("anu"+soundid);
        $('#video').get(0).volume=0
        this.currentsoundid=soundid;
        for(var i=0;i<arraudio.length-1;i++){
          if(i==0)playAudio(arraudio[0],soundid,0);
          var x = document.getElementById(arraudio[i]);
          var dursementara = x.duration;			
          dursementara = dursementara*1000;			
          dur = dur+dursementara;			
          playAudio(arraudio[i+1],soundid,dur);		
          //console.log(i,arraudio.length)	
        }
        dur=0;
      }

      function fungsiKeyPress(){
        var x = event.key;
        //
        if (x == "<?php echo $tambah_A ?>") { addA();}
        if (x == "<?php echo $tambah_B ?>") { addB();}
        //        if (x == "k" || x == "K") { insCustomA();}
        //        if (x == "l" || x == "L") { insCustomB();}
        //Loket 1
        //        if (x == "q" || x == "Q") { nextXY(1,0);}
        //        if (x == "w" || x == "W") { nextXY(1,1);}
        if (x == "<?php echo $loket1_layani ?>") { nextXAuto(1);}
        //        if (x == "r" || x == "R") { recallX(1);}
        //        if (x == "t" || x == "T") { undoX(1);}
        //Loket 2
        //        if (x == "y" || x == "Y") { nextXY(2,0);}
        //        if (x == "u" || x == "U") { nextXY(2,1);}
        if (x == "<?php echo $loket2_layani ?>") { nextXAuto(2);}
        //        if (x == "o" || x == "O") { recallX(2);}
        //        if (x == "p" || x == "P") { undoX(2);}
        //Loket 3
        //        if (x == "a" || x == "A") { nextXY(3,0);}
        //        if (x == "s" || x == "S") { nextXY(3,1);}
        if (x == "<?php echo $loket3_layani ?>") { nextXAuto(3);}
        //        if (x == "f" || x == "F") { recallX(3);}
        //        if (x == "g" || x == "G") { undoX(3);}
        //Loket 4
        //        if (x == "z" || x == "Z") { nextXY(4,0);}
        //        if (x == "x" || x == "X") { nextXY(4,1);}
        if (x == "<?php echo $loket4_layani ?>") { nextXAuto(4);}
        if (x == "<?php echo $loket5_layani ?>") { nextXAuto(5);}
        if (x == "<?php echo $loket6_layani ?>") { nextXAuto(6);}
        //        if (x == "v" || x == "V") { recallX(4);}
        //        if (x == "b" || x == "B") { undoX(4);}
        //DEBUG
        //if (x == "x" || x == "X") { cekTime();}
        //if (x == '.') { nyadangKuy();}
        //Enter

      }
      function tutupmodalA(){
        document.getElementById("customAmodal").style.display="none";
        document.getElementById("customAinput").value='';
      }
      function tutupmodalB(){
        document.getElementById("customBmodal").style.display="none";
        document.getElementById("customBinput").value='';
      }
      function insCustomA(){
        document.getElementById("customAmodal").style.display="block";
        setTimeout(function(){
          document.getElementById("customAinput").focus();
        },50);
      }
      function insCustomB(){
        document.getElementById("customBmodal").style.display="block";
        setTimeout(function(){
          document.getElementById("customBinput").focus();
        },50);

      }
      function customAset(){
        document.getElementById("customAmodal").style.display="none";
        var customnumber = document.getElementById("customAinput").value;
        var xmlhttp = new XMLHttpRequest();
        var url = "<?php echo base_url()?>index.php/antrian/customY/0";
        url = url.concat("/"+customnumber);
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
      }
      function customBset(){
        document.getElementById("customBmodal").style.display="none";
        var customnumber = document.getElementById("customBinput").value;
        var xmlhttp = new XMLHttpRequest();
        var url = "<?php echo base_url()?>index.php/antrian/customY/1";
        url = url.concat("/"+customnumber);
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
      }
      function stopaudio(){
        clearTimeout(this.temot);
      }
      function cekTime(){
        var x = document.getElementById('nomorantrianA');
        alert(x.duration);
      }
      function addA(){
        var xmlhttp = new XMLHttpRequest();
        var url = "<?php echo base_url()?>index.php/antrian/addX/A";       
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
      }
      function addB(){
        var xmlhttp = new XMLHttpRequest();
        var url = "<?php echo base_url()?>index.php/antrian/addX/B";       
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
      }
      function nextXY(x,y){
        var xmlhttp = new XMLHttpRequest();
        var url = "<?php echo base_url()?>index.php/antrian/nextXY";
        url = url.concat("/"+x);
        url = url.concat("/"+y);
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            nextXYaction(this.responseText,x,y);
          }
        }
      }
      function nextXYaction(response,x,y){
        var arr = JSON.parse(response);
        var urutan = arr.visual.jenis;
        urutan = urutan.concat(arr.visual.nomor);
        var loket = 'loket'+x;
        document.getElementById(loket).innerHTML = urutan;
        var arraudio = arr.audio;
        var soundid = arr.soundid.theid;
        playAudioController(arraudio,soundid);
      }
      function nextXAuto(x){
        if($('#loket'+x+'_statuss').val()==0){
          return false;
        }
        var xmlhttp = new XMLHttpRequest();
        var url = "<?php echo base_url();?>antrian/nextXAuto";
        url = url.concat("/"+x);
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            nextXAutoaction(this.responseText,x);
          }
        }
      }
      function nextXAutoaction(response,x){
        var arr = JSON.parse(response);
        var urutan = arr.visual.jenis;
        urutan = urutan.concat(arr.visual.nomor);
        var loket = 'loket'+x;
        document.getElementById(loket).innerHTML = urutan;
        var arraudio = arr.audio;
        var soundid = arr.soundid.theid;
        playAudioController(arraudio,soundid);

      }
      function undoX(x){
        var xmlhttp = new XMLHttpRequest();
        var url = "<?php echo base_url()?>index.php/antrian/undoX";
        url = url.concat("/"+x);
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            undoXaction(this.responseText,x);
          }
        }
      }
      function undoXaction(response,x){
        var arr = JSON.parse(response);
        var urutan = arr.visual.jenis;
        urutan = urutan.concat(arr.visual.nomor);
        var loket = 'loket'+x;
        document.getElementById(loket).innerHTML = urutan;
      }
      function recallX(x){
        var xmlhttp = new XMLHttpRequest();
        var url = "<?php echo base_url()?>index.php/antrian/recallX";
        url = url.concat("/"+x);
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            recallXaction(this.responseText,x);
          }
        } 
      }
      function recallXaction(response,x){
        var arr = JSON.parse(response);
        var arraudio = arr.audio;
        var soundid = arr.soundid.theid;
        playAudioController(arraudio,soundid);
      }

      function addnokata(){
        this.nokata++;
      }
      function sedangBermain(judul){

      }
      function next1B(){

      }
      function setUrutanInLokets(){
        url = '<?php echo base_url() ?>antrian/getUrutanInLokets';
        //console.log(url);
        $.getJSON(url, function(result){
          if($('#loket1_urutan').text()!=result["loket1_urutan"])
          {
            $('#loket1_urutan').text(result["loket1_urutan"]);    
          }
          if($('#loket2_urutan').text()!=result["loket2_urutan"])
          {
            $('#loket2_urutan').text(result["loket2_urutan"]);    
          }
          if($('#loket3_urutan').text()!=result["loket3_urutan"])
          {
            $('#loket3_urutan').text(result["loket3_urutan"]);    
          }
          if($('#loket4_urutan').text()!=result["loket4_urutan"])
          {
            $('#loket4_urutan').text(result["loket4_urutan"]);    
          }
          if($('#loket5_urutan').text()!=result["loket5_urutan"])
          {
            $('#loket5_urutan').text(result["loket5_urutan"]);    
          }
          if($('#loket6_urutan').text()!=result["loket6_urutan"])
          {
            $('#loket6_urutan').text(result["loket6_urutan"]);    
          }
        });
      }
      setTimeout(function(){
        $("body").on('DOMSubtreeModified', "#loket1_urutan", function() {
          url = '<?php echo base_url()?>antrian/getAudio/1/'
          urutan = $('#loket1_urutan').text()
          url = url+urutan
          $.getJSON(url, function(result){
            playAudioController(result.audio,result.soundid)
          });
        });
        $("body").on('DOMSubtreeModified', "#loket2_urutan", function() {
          url = '<?php echo base_url()?>antrian/getAudio/2/'
          urutan = $('#loket2_urutan').text()
          url = url+urutan
          $.getJSON(url, function(result){
            playAudioController(result.audio,result.soundid)
          });
        });
        $("body").on('DOMSubtreeModified', "#loket3_urutan", function() {
          url = '<?php echo base_url()?>antrian/getAudio/3/'
          urutan = $('#loket3_urutan').text()
          url = url+urutan
          $.getJSON(url, function(result){
            playAudioController(result.audio,result.soundid)
          });
        });
        $("body").on('DOMSubtreeModified', "#loket4_urutan", function() {
          url = '<?php echo base_url()?>antrian/getAudio/4/'
          urutan = $('#loket4_urutan').text()
          url = url+urutan
          $.getJSON(url, function(result){
            playAudioController(result.audio,result.soundid)
          });
        });
        $("body").on('DOMSubtreeModified', "#loket5_urutan", function() {
          url = '<?php echo base_url()?>antrian/getAudio/5/'
          urutan = $('#loket5_urutan').text()
          url = url+urutan
          $.getJSON(url, function(result){
            playAudioController(result.audio,result.soundid)
          });
        });
        $("body").on('DOMSubtreeModified', "#loket6_urutan", function() {
          url = '<?php echo base_url()?>antrian/getAudio/6/'
          urutan = $('#loket6_urutan').text()
          url = url+urutan
          $.getJSON(url, function(result){
            playAudioController(result.audio,result.soundid)
          });
        });
      },3000)
      function cekKeaktifan() {
        url = '<?php echo base_url() ?>pegawai/json_loket_statuses';
        $.getJSON(url, function(result){
          if(result['loket1_status']!=$('#loket1_status').text()){
            changeLoketStatus(1,result['loket1_status'])
          }
          if(result['loket2_status']!=$('#loket2_status').text()){
            changeLoketStatus(2,result['loket2_status'])
          }
          if(result['loket3_status']!=$('#loket3_status').text()){
            changeLoketStatus(3,result['loket3_status'])
          }
          if(result['loket4_status']!=$('#loket4_status').text()){
            changeLoketStatus(4,result['loket4_status'])
          }
          if(result['loket5_status']!=$('#loket5_status').text()){
            changeLoketStatus(5,result['loket5_status'])
          }
          if(result['loket6_status']!=$('#loket6_status').text()){
            changeLoketStatus(6,result['loket6_status'])
          }
        });
      }
      $('body').on('DOMSubtreeModified', "#loket1_status", function() {
        if($("#loket1_status").text()!='1'){
          turnOffLoket(1)
        } else {turnOnLoket(1)}
      })
      $('body').on('DOMSubtreeModified', "#loket2_status", function() {
        if($("#loket2_status").text()!='1'){
          turnOffLoket(2)
        } else {turnOnLoket(2)}
      })
      $('body').on('DOMSubtreeModified', "#loket3_status", function() {
        if($("#loket3_status").text()!='1'){
          turnOffLoket(3)
        } else {turnOnLoket(3)}
      })
      $('body').on('DOMSubtreeModified', "#loket4_status", function() {
        if($("#loket4_status").text()!='1'){
          turnOffLoket(4)
        } else {turnOnLoket(4)}
      })
      $('body').on('DOMSubtreeModified', "#loket5_status", function() {
        if($("#loket5_status").text()!='1'){
          turnOffLoket(5)
        } else {turnOnLoket(5)}
      })
      $('body').on('DOMSubtreeModified', "#loket6_status", function() {
        if($("#loket6_status").text()!='1'){
          turnOffLoket(6)
        } else {turnOnLoket(6)}
      })
      function changeLoketStatus(loket,status){
        if(status!=1){
          turnOffLoket(loket)
        } else {turnOnLoket(loket)}
      }
      function turnOffLoket(loket){
        $('#borderloket'+loket).css('background','black');
        $('#kotakloket'+loket).css('background','linear-gradient(to right, #291F0C, #968654)');
        $('#loket'+loket+'_urutan').css('opacity','0');
        $('#loket'+loket+'_statuss').val(0)
      }
      function turnOnLoket(loket){
        url = '<?php echo base_url() ?>pegawai/json_settings';
        $.getJSON(url, function(result){
          $('#borderloket'+loket).removeAttr('style');
          $('#kotakloket'+loket).css('background',result.loket_kotak_warna);
          $('#loket'+loket+'_urutan').removeAttr('style');
        });
        $('#loket'+loket+'_statuss').val(1)
      }
    </script>
  </body>
</html>