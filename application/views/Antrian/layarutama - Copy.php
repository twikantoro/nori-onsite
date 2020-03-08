<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
	<head>
		<title>SiKarang</title>
		<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css') ?>"/>
		<style>
		body {
			height: 100vh;
			background: linear-gradient(#0085CA, #003399);
			background-image: url('<?php echo base_url()?>assets/images/bgantrian.jpg');
			background-size: cover;
			font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
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
		.bilogo {
			width:95%;height:20%;margin:auto;margin-bottom:1.5vw;
			padding:0px;background-image: url('<?php echo base_url()?>assets/images/bilogofull.png');
			background-size:contain;background-repeat: no-repeat;background-position:center;
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
		.emphasize-dark {
			box-shadow: 0 0 5px 2px rgba(0,0,0,.35);
			background: linear-gradient(to right, #000000, #111111, #000000), linear-gradient(to right, #8f6B29, #FDE08D, #DF9F28);
			opacity: 0.9;
			border: double 0px;
			//border-style: solid;
			//border-image: linear-gradient(to right, #8f6B29, #FDE08D, #DF9F28) 1 stretch;
			background-origin: border-box;
			background-clip: content-box, border-box;
			//width:100%;margin:auto;margin-bottom:1.5vw;padding:0.4em;overflow:hidden;
			border-radius:50px;
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
			height:22vh;
			margin:0px;
			margin-bottom:1vw;
			background-color: blue;
			margin-left:1vw !important;
			font-weight: bold;
		}
		.emphasize-dark {
			box-shadow: 0 0 5px 2px rgba(0,0,0,.35);
			background: linear-gradient(to right, #000000, #111111, #000000), linear-gradient(to right, #8f6B29, #FDE08D, #DF9F28);
			opacity: 0.9;
			border: double 0px;
			//border-style: solid;
			//border-image: linear-gradient(to right, #8f6B29, #FDE08D, #DF9F28) 1 stretch;
			background-origin: border-box;
			background-clip: content-box, border-box;
			//width:100%;margin:auto;margin-bottom:1.5vw;padding:0.4em;overflow:hidden;
			border-radius:20px;
		}
		.kotakloket {
			box-shadow: 0 0 5px 2px rgba(0,0,0,.35);
			border-radius: 15px;
			height: 16vh;
			width: 16vh;
			background: linear-gradient(to right, #8f6B29, #FDE08D);
			padding: 5px;
		}
		.tulisanloket {
			
			height: 25%;
			width: 100%;
			font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
			text-align: center;
			color: #111111;
			font-size: 3vh;
		}
		.angkaloket {
			
			width: 100%;
			font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
			text-align: center;
			color: #111111;
			margin:auto;
			font-size: 11vh;
			
			line-height: 1em;
		}
		.nomorantrian {
			font-size: 13.8vh;
			color: #e9c26b;
			
			margin:auto;
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
		</style>
	</head>
<body onkeydown="fungsiKeyPress()">
<div class="container-fluid" style="padding:0px;margin:0px;overflow:hidden;height:100vh">
  <div class="row">
	<div class="col" style="padding:1vw;">
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
			<div style="width:60vw;height:21vh;background-color:;margin-right:1vw;margin-bottom:1.5vw">
			</div>
			<div style="width:50vw;height:28.125vw !important;background-color:black;overflow:hidden;position:absolute;right:7vw">
				<video id="vid" loop volume="0" autoplay style="width:50vw;height:28.125vw !important;">
						
					</video>
			</div>
			<div class="scrollingtext">
				<marquee direction="up" scrollamount="1.6" style="text-align:center">
				Diberitahukan kepada masyarakat bahwa hari ini adalah hari yang kau tunggu. Bertambah satu tahun usiamu bahagialah kamu. Yang kuberi bukan jam dan cincin bukan seikat bunga 
				atau puisi juga kalung hati. Semoga tuhan melindungi kamu. Semoga tercapai semua angan dan cita-citamu.
				</marquee>
			</div>
	</div>
  </div>
</div>
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
	//var dur=0;
	function getDuration(judul){
		//alert(judul);
		var y = document.getElementById(judul);
		var dur;
		y.addEventListener('loadedmetadata', function() {
		dur = y.duration;	
			
		});
		//alert(dur);
		return dur;
	}/*
	function playAudio(judul,delay){
		var x = document.getElementById(judul);
		setTimeout(function(){x.play();},delay);
	}
	function playAudioController(){
		for(var i=0;i<arraudio.length-1;i++){
			if(i==0)playAudio(arraudio[0],0);
			var x = document.getElementById(arraudio[i]);
			var dursementara = x.duration;			
			dursementara = dursementara*1000;			
			dur = dur+dursementara;			
			playAudio(arraudio[i+1],dur);			
		}
	}*/
	/*
	function updateTampilan(){
		var xmlhttp = new XMLHttpRequest();
        var url = "<?php //echo base_url()?>index.php/antrian/jsonantrian";       
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
                myFunction(this.responseText);
            }
        }
		dur = 0;
	}
	function myFunction(response){
		var arr = JSON.parse(response);
		arraudio = arr.Audio;
        var i = 0;
		if(document.getElementById("noAntrian").innerHTML != arr.Dilayani){
			playAudioController();
		}
		document.getElementById("noAntrian").innerHTML = arr.Dilayani;
		document.getElementById("loket").innerHTML = "Loket ".concat(arr.Loket);
		//document.getElementById("tertinggi").innerHTML = arr.Terakhir;		
		setTimeout(updateTampilan, 250);
	}
	*/
	function fungsiKeyPress(){
		var x = event.key;
		if (x == "b" || x == "B") { 
    		alert ("You pressed the 'B' key!");
		}
		//
		if (x == "n" || x == "N") { addA();}
		if (x == "m" || x == "M") { addB();}
		if (x == "v" || x == "V") { insCustomA();}
		if (x == "b" || x == "B") { insCustomB();}
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
		if (x == "h" || x == "H") { nextXY(4,0);}
		if (x == "j" || x == "J") { nextXY(4,1);}
		if (x == "k" || x == "K") { nextXAuto(4);}
		if (x == "l" || x == "L") { recallX(4);}
		if (x == "z" || x == "Z") { undoX(4);}
		//DEBUG
		if (x == "x" || x == "X") { cekTime();}
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
		mainkan(arraudio);
	}
	function nextXAuto(x){
		var xmlhttp = new XMLHttpRequest();
       	var url = "<?php echo base_url()?>index.php/antrian/nextXAuto";
       	url = url.concat("/"+x);
       	xmlhttp.open("GET", url, true);
       	xmlhttp.send();
       	xmlhttp.onreadystatechange = function() {
       	if (this.readyState == 4 && this.status == 200) {
       	        nextXYaction(this.responseText,x);
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
		
		mainkan(arraudio);

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
		mainkan(arraudio);
	}
	function mainkan(arraudio){
		for(var i=0;i<arraudio.length;i++){
			alert(arraudio[i]);
		}
		//this.nokata=0;
		//this.panjang=arraudio.length;
		//alert(arraudio[0]);
		mainkan2(arraudio,0);
	}
	function mainkan2(arraudio,nganucoy){
		var pandjang = arraudio.length;
		//alert(pandjang);
		//var nokatha = this.nokata;
		//alert(nganucoy);
		//var haveplayed=false;
		//var havestopped=false;
		//alert(arraudio[1]);
		judul = arraudio[nganucoy];
		var x = document.getElementById(judul);
		x.play();
		durdur=x.duration;
		alert(durdur);
		
		//doer = getDuration(judul);
		/*var doesplay = setInterval(function(){
			if(x.currentTime>0){
				haveplayed=true;
				alert('it played');
				clearInterval(doesplay);
				alert(haveplayed);
			}
		},100);

		var doesstop = setInterval(function(){
			if(x.currentTime==x.duration&&this.haveplayed==true){
				this.havestopped=true;
				alert('it stopped');
				clearInterval(doesstop);
			}
		},100);*/
		var yousure = setInterval(function(){
			if(x.currentTime==durdur){
				if(nganucoy+1<pandjang){
					//alert('its ready');
					nganucoy++;
					//alert(nganucoy);
					this.mainkan2(arraudio,nganucoy);
				}
				clearInterval(this.yousure);
			}
		},50);
		

		// play that audio

		// make sure it is really playing
		// wait for it to stop
		// play the next audio
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