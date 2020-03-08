$(document).ready(function() {
  //retrive data from cookie
  function getCookieValue(a) {
    var b = document.cookie.match('(^|[^,]+)\\s*' + a + '\\s*=\\s*([^,]+)');
    return b ? b.pop() : '';
  }
  //alert(document.cookie);
  urutan = getCookieValue('urutan');
  expiry_timestamp = getCookieValue('expires');
  //  expiry_date = new Date();
  //  expiry_date = Date.parse(expiry_string);
  today_date = new Date();
  //today_date.setDate();
  today_date.setHours(0,0,0,0);
  today_timestamp = today_date.getTime()/1000;

  //alert(expiry_timestamp);
  //alert(today_timestamp);

  if(expiry_timestamp<today_timestamp){
    expired_cond = true;
    //alert('expired');
  } else {
    expired_cond = false;
  }

  //alert(expired_cond);

  if(urutan!=''&&expired_cond==false){
    $("#div_tunggu").show();
    loadFromCookies();
  } else $("#div_daftar").show();

  setInterval(function() {   
    site = $("#base_url").val();
    url = "tamu/api_periodical/";
    url = site.concat(url);
    //alert(url);
    $.getJSON(url, function(result){
      terpanggil = result["terpanggil"];
      $("#terpanggil").text(terpanggil);
      total = result["total"];
      $("#total").text(total);
    });
  },1000);

  //Load from coookies
  function loadFromCookies(){
    urutan = getCookieValue('urutan');
    $("#urutan").text(urutan);
    pin_kode = getCookieValue('kode');
    $("#pin_kode_show").text(pin_kode);  
  }
  //Masukin no HP, daftar
  $("#btndaftar").click(function(){
    site = $("#base_url").val();
    url = "tamu/api_daftar/";
    url = site.concat(url);
    no_hp = $("#no_hp").val();

    no_hp = parseInt(no_hp);
    if(no_hp>999){
      url = url.concat(no_hp);
      //alert(url);
      $.getJSON(url, function(result){
        var today = new Date();
        var tomorrow = new Date();
        //tomorrow.setDate(today.getDate()+1);
        //expires = tomorrow.toUTCString();
        var unix = Math.round(+new Date()/1000);
        kode = result["kode"];
        urutan = result["urutan"];
        //alert(kode);
        kuki = "no_hp=" + no_hp + ", kode=" + kode + ", expires=" + unix + ", urutan=" + urutan + ",";
        //alert(kuki);
        //alert('daftar sukses1');
        document.cookie = kuki;

        $("#div_daftar").hide();
        $("#div_tunggu").fadeIn();
        //alert('daftar sukses2');
        loadFromCookies();
      })    
    } else alert('Masukkan nomor hp yang benar');
  });

  //Udah daftar katanya
  $("#a_dah_daftar").click(function(){
    $("#div_daftar").hide();
    $("#div_login").fadeIn();
  });
  $("#a_daftar_lagi").click(function(){
    $("#div_login").hide();
    $("#div_daftar").fadeIn();
  });
  $("#a_daftar_lagi_2").click(function(){
    $("#div_tunggu").hide();
    $("#div_daftar").fadeIn();
  });

  //Button Login
  $("#btnlogin").click(function(){
    no_hp = $("#no_hp_login").val();
    pin_kode = $("#pin_kode").val();
    site = $("#base_url").val();
    url = "tamu/api_login/";
    url = site.concat(url);
    url = url.concat(no_hp);
    url = url.concat(pin_kode);
    $.getJSON(url, function(result){
      kondisi = result["kondisi"];
      urutan = result["urutan"];
      if(kondisi=='bener'){
        $("#div_login").hide();
        $("#div_tunggu").fadeIn();
      }
    })  
  });
});