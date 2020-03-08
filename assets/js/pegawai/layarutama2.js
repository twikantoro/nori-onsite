
$( document ).ready(function (){
  setTimeout(function(){
    document.getElementById("loadingpopup").style.display = "none";
  },1000);
  //updateTampilan();
  var source1 = document.createElement("source");
  var attrsrc = document.createAttribute("src");
  site = $("#base_url").val();
  attrsrc.value = site.concat("assets/video/perjalanan_rupiah.mkv");
  source1.setAttributeNode(attrsrc);
  var elementVideo = document.getElementById("vid");
  //elementVideo.appendChild(source1);
  //elementVideo.volume = 0;

  /*GERAKIN*/
  var slide1 = document.getElementById("kontenkurs1");
  slidethakurs(-2);
});
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
  site = $("#base_url").val();
  var url = site+"index.php/antrian/customY/0";
  url = url.concat("/"+customnumber);
  xmlhttp.open("GET", url, true);
  xmlhttp.send();
}
function customBset(){
  document.getElementById("customBmodal").style.display="none";
  var customnumber = document.getElementById("customBinput").value;
  var xmlhttp = new XMLHttpRequest();
  site = $("#base_url").val();
  var url = site+"index.php/antrian/customY/1";
  url = url.concat("/"+customnumber);
  xmlhttp.open("GET", url, true);
  xmlhttp.send();
}
function resettozero(){
  var xmlhttp = new XMLHttpRequest();
  site = $("#base_url").val();
  var url = site+"index.php/antrian/resettozero";
  xmlhttp.open("GET", url, true);
  xmlhttp.send();
  document.getElementById('loket1').innerHTML = '-';
  document.getElementById('loket2').innerHTML = '-';
  document.getElementById('loket3').innerHTML = '-';
  document.getElementById('loket4').innerHTML = '-';
}
function stopaudio(){
  this.currentsoundid = 0;
}
function cekTime(){
  var x = document.getElementById('nomorantrianA');
  alert(x.duration);
}
function addA(){
  var xmlhttp = new XMLHttpRequest();
  site = $("#base_url").val();
  var url = site+"index.php/antrian/addX/0";       
  xmlhttp.open("GET", url, true);
  xmlhttp.send();
}
function addB(){
  var xmlhttp = new XMLHttpRequest();
  site = $("#base_url").val();
  var url = site+"index.php/antrian/addX/1";       
  xmlhttp.open("GET", url, true);
  xmlhttp.send();
}
function nextXY(x,y){
  var xmlhttp = new XMLHttpRequest();
  site = $("#base_url").val();
  var url = site+"index.php/antrian/nextXY";
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
  site = $("#base_url").val();
  var url = site+"index.php/antrian/nextXAuto";
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
  site = $("#base_url").val();
  var url = site+"index.php/antrian/undoX";
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
  site = $("#base_url").val();
  var url = site+"index.php/antrian/recallX";
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
function slidethakurs(i){
  var shit = document.getElementById('kontenkurs1');
  shit.style.animationName = 'phase'+i;
  shit.style.animationPlayState = 'running';
  var newmargin = -5*i;
  newmargin = ''+newmargin;
  newmargin = newmargin.concat('vh');
  //console.log(newmargin);
  shit.style.marginTop = newmargin;
  i++;
  if(i<8){
    setTimeout(function(){slidethakurs(i);},5000);
  } else {
    setTimeout(function(){slidethakurs(-2);},5000);
  }
}
function findKeyframesRule(rule)
{
  // gather all stylesheets into an array
  var ss = document.styleSheets;

  // loop through the stylesheets
  for (var i = 0; i < ss.length; ++i) {

    // loop through all the rules
    for (var j = 0; j < ss[i].cssRules.length; ++j) {

      // find the -webkit-keyframe rule whose name matches our passed over parameter and return that rule
      if ((ss[i].cssRules[j].type == window.CSSRule.WEBKIT_KEYFRAMES_RULE || ss[i].cssRules[j].type == window.CSSRule.KEYFRAMES_RULE) && ss[i].cssRules[j].name == rule)
        return ss[i].cssRules[j];
    }
  }

  // rule not found
  return null;
}
function change(anim)
{
  // find our -webkit-keyframe rule
  var keyframes = findKeyframesRule(anim);

  if (keyframes !== null) {
    // remove the existing 0% and 100% rules
    keyframes.deleteRule("0%");
    keyframes.deleteRule("100%");

    // create new 0% and 100% rules with random numbers
    keyframes.appendRule("0% { -moz-transform: rotate("+randomFromTo(-360,360)+"deg); -webkit-transform: rotate("+randomFromTo(-360,360)+"deg); }");
    keyframes.appendRule("100% { -moz-transform: rotate("+randomFromTo(-360,360)+"deg); -webkit-transform: rotate("+randomFromTo(-360,360)+"deg); }");
    console.log(keyframes);
    // assign the animation to our element (which will cause the animation to run)
    /*document.getElementById('box').style.WebkitAnimationName = anim;
        document.getElementById('box').style.MozAnimationName = anim;*/
  }

}


