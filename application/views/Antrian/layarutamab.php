<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
  <head>
    <title>SiKarang</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styleb.css') ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css') ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/norib.css') ?>"/>
    <script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <style>
      body {
        height: 100vh;
        background: linear-gradient(#0085CA, #003399);
        background-image: url('<?php echo base_url()?>assets/images/bgantrian.jpg');
        background-size: cover;
        font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
      }
      .bilogo {
        width:95%;height:20%;margin:auto;margin-bottom:1.5vw;
        padding:0px;background-image: url('<?php echo base_url()?>assets/images/bilogofull.png');
        background-size:contain;background-repeat: no-repeat;background-position:center;
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
          <div class="lokets emphasize-dark">
            <div class="row" style="padding-left: 2.1vh">
              <div class="" style="width:35%;height:100%;padding:1.9vh !important;margin-right:-7vh;">
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
        <div class="col" style="background-color:transparent;height:100vh;padding:1vw;">
          <div style="width:60vw;height:21vh;background-color:;margin-right:1vw;margin-bottom:1.5vw;
                      ">
            <div style="background-image: url('<?php echo base_url()?>assets/images/bilogofull.png');
                      background-size: 50vw auto; background-repeat: no-repeat;
                        width:100%;height:100%;
                        margin-left:5vw;margin-top:2vw" >
            </div>
          </div>
          <div style="width:50vw;height:28.125vw !important;background-color:black;overflow:hidden;position:absolute;right:7vw">
            <video id="vid" loop volume="0" autoplay style="width:50vw;height:28.125vw !important;">

            </video>
          </div>
        </div>
      </div>
      <div class="row raningteks">
        <marquee direction="left" scrollamount="7" style="text-align:center; font-size: 3.7vh">
          Diberitahukan kepada masyarakat bahwa hari ini adalah hari yang kau tunggu. Bertambah satu tahun usiamu bahagialah kamu. Yang kuberi bukan jam dan cincin bukan seikat bunga 
          atau puisi juga kalung hati. Semoga tuhan melindungi kamu. Semoga tercapai semua angan dan cita-citamu.
        </marquee>
      </div>
    </div>
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

<script type="text/javascript">
	window.onload = function (){
		//updateTampilan();
		var source1 = document.createElement("source");
		var attrsrc = document.createAttribute("src");
		attrsrc.value = "<?php echo base_url()?>assets/video/perjalanan_rupiah.mkv";
		source1.setAttributeNode(attrsrc);
		var elementVideo = document.getElementById("vid");
		elementVideo.appendChild(source1);
		elementVideo.volume = 0;
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
		console.log(judul);
		var x = document.getElementById(judul);
		setTimeout(function(){
			currentsoundid=this.getSoundId();
			//console.log(soundid);
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
		this.currentsoundid=soundid;
		for(var i=0;i<arraudio.length-1;i++){
			if(i==0)playAudio(arraudio[0],soundid,0);
			var x = document.getElementById(arraudio[i]);
			var dursementara = x.duration;			
			dursementara = dursementara*1000;			
			dur = dur+dursementara;			
			playAudio(arraudio[i+1],soundid,dur);			
		}
		dur=0;
	}

	function fungsiKeyPress(){
		var x = event.key;
		//
		if (x == "n" || x == "5") { addA();}
		if (x == "m" || x == "6") { addB();}
		if (x == "k" || x == "K") { insCustomA();}
		if (x == "l" || x == "L") { insCustomB();}
		//Loket 1
		if (x == "q" || x == "Q") { nextXY(1,0);}
		if (x == "w" || x == "W") { nextXY(1,1);}
		if (x == "e" || x == "1") { nextXAuto(1);}
		if (x == "r" || x == "R") { recallX(1);}
		if (x == "t" || x == "T") { undoX(1);}
		//Loket 2
		if (x == "y" || x == "Y") { nextXY(2,0);}
		if (x == "u" || x == "U") { nextXY(2,1);}
		if (x == "i" || x == "2") { nextXAuto(2);}
		if (x == "o" || x == "O") { recallX(2);}
		if (x == "p" || x == "P") { undoX(2);}
		//Loket 3
		if (x == "a" || x == "A") { nextXY(3,0);}
		if (x == "s" || x == "S") { nextXY(3,1);}
		if (x == "d" || x == "3") { nextXAuto(3);}
		if (x == "f" || x == "F") { recallX(3);}
		if (x == "g" || x == "G") { undoX(3);}
		//Loket 4
		if (x == "z" || x == "Z") { nextXY(4,0);}
		if (x == "x" || x == "X") { nextXY(4,1);}
		if (x == "c" || x == "4") { nextXAuto(4);}
		if (x == "v" || x == "V") { recallX(4);}
		if (x == "b" || x == "B") { undoX(4);}
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
        var url = "<?php echo base_url()?>index.php/antrian/addX/0";       
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
	}
	function addB(){
		var xmlhttp = new XMLHttpRequest();
        var url = "<?php echo base_url()?>index.php/antrian/addX/1";       
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
		var xmlhttp = new XMLHttpRequest();
       	var url = "<?php echo base_url()?>index.php/antrian/nextXAuto";
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
	/*for(var i=0;i<arraudio.length;i++){
			judul = arraudio[i];
			var x = document.getElementById(judul);
			x.play();
			var nganu=0;
			var nganu1=1;
			var makesureplaying setInterval(function()
				{
					this.nganu = x.currentTime;
					if(this.nganu>0){
						clearInterval(this.makesureplaying);
					}
				},100);
			var makesurestops setInterval(function()
				{
					this.nganu1 = x.currentTime;
					if(this.nganu1==0){
						clearInterval(this.makesurestops);
					}
				},100);*/

				/*sequence=0;
		play();
		function play(){
			judul = this.arraudio[this.sequence];
			var x = document.getElementById(judul);
			x.play;
			makesureplaying(x);
		}
		function makesureplaying(x){
			var thevar = setInterval(function()
			{
				if(this.x.currentTime>0){
					clearInterval(thevar);
					this.makesurestops(this.x);
				}
			},50);
		}
		function makesurestops(x){
			var thevar = setInterval(function()
			{
				if(this.x.currentTime==0){
					clearInterval(thevar);
					this.addsequence();
					this.play();
				}
			},50);	
		}
		function addsequence(){
			this.sequence++;
		}*/
</script>
</body>
</html>