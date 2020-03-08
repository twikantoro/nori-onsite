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
    //DIV TUNGGU

    urutan = getCookieValue('urutan');
    kode = getCookieValue('kode');

    $("#urutan").text(urutan);
    $("#pin_kode_show").text(kode);

  }

  //alert(expired_cond);

  if(expired_cond==false){
    //alert('false');
    $("#div_tunggu").show();
  } else $("#div_daftar").show();

  setInterval(function() {   
    site = $("#base_url").val();
    url = "tamu/api_periodical/";
    url = site.concat(url);
    //alert(url);
    $.getJSON(url, function(result){
      //animate
      curr = $("terpanggil").text();
      next = result["terpanggil"];
      if(curr!=next){
        hiyanimate();
      }
      //-animate
      terpanggil = result["terpanggil"];
      $("#terpanggil").text(terpanggil);
      total = result["total"];
      $("#total").text(total);
      time_served = result["time_served"];
      //alert(time_served);
      urutan = getCookieValue('urutan');
      time_served = time_served + 300*(urutan-terpanggil);
      time_served_timestamp = new Date(time_served*1000);
      //alert(time_served_timestamp);
      jam = time_served_timestamp.getHours();
      menit = time_served_timestamp.getMinutes();
      //tambah nol
      if(jam<10){
        jam = '0'.concat(jam);
      }
      if(menit<10){
        menit = '0'.concat(menit);
      }
      waktu_dipanggil = jam + ":" + menit;
      $("#waktu_dipanggil").text(waktu_dipanggil);
      //Kalo sama, anda sedang dipanggil
      if(urutan==terpanggil){
        $("#p_menunggu").hide();
        $("#p_terlambat").hide();
        $("#p_dipanggil").show();
      }
      //Kalo lebih tinggi, anda terlambat
      if(urutan<terpanggil){
        terlaluTinggi();
      }
    });
  },1000);

  //Terlalu Tinggi
  function terlaluTinggi(){
    status = getCookieValue('status');

    $("#box_menunggu").removeClass( "bg-gradient-warning" );
    $("#box_menunggu").addClass("bg-outline-warning");
    $("#p_menunggu").hide();
    $("#p_dipanggil").hide();
    $("#p_terlambat").show();
    $("#a_daftar_lagi_2").hide();
    $("#a_sudah_di_lokasi").show();
    $("#btn_terlambat").show();
    $("#p_tunggu").hide();
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
        //alert('berhasil input');
        if(result['kondisi']=='new'){
          //alert('berhasil terbaca as new')
          //alert('terdaftar cuk');
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

          document.cookie = kuki;

          $("#div_daftar").hide();
          $("#div_tunggu").fadeIn();

          //DIV TUNGGU
          $("#urutan").text(urutan);
          $("#pin_kode_show").text(kode);
          $("#waktu_dipanggil").text('07:77');
        } else {
          $("#a_dah_daftar").hide();
          $("#warning_terdaftar").show();
        }

      }); 
    } else alert('Masukkan nomor hp yang benar');
  });

  //Udah daftar katanya
  $("#a_dah_daftar").click(function(){
    $("#div_daftar").hide();
    $("#div_login").fadeIn();
  });
  $("#a_daftar_lagi").click(function(){
    posisiDaftar();
  });
  $("#a_daftar_lagi_2").click(function(){
    posisiDaftar();
  });

  //Button Login
  $("#btnlogin").click(function(){
    no_hp = $("#no_hp_login").val();
    pin_kode = $("#pin_kode").val();
    if(no_hp!=''&&pin_kode!=''){
      site = $("#base_url").val();
      url = "tamu/api_login/";
      url = site.concat(url);
      url = url.concat(no_hp);
      url = url.concat('/');
      url = url.concat(pin_kode);
      $.getJSON(url, function(result){
        kondisi = result["kondisi"];
        urutan = result["urutan"];
        if(kondisi=='bener'){
          $("#div_login").hide();
          $("#div_tunggu").fadeIn();
        } else {
          $("#feedback").fadeIn();
        }
      }) 
    } else {
      alert('Silahkan input dengan benar')
    }
  });

  //Login & Daftar Link
  $("#login_link").click(function(){
    $("#a_dah_daftar").show();
    $("#div_daftar").hide();
    $("#div_login").fadeIn();
  });
  $("#daftar_link").click(function(){
    $("#a_dah_daftar").show();
    $("#div_daftar").hide();

    $.getJSON(url, function(result){

    });
  });

  //Button Tolong Dipanggil
//  $("#a_sudah_di_lokasi").click(function(){
//    site = $("#base_url").val();
//    url = "tamu/api_recall/";
//    url = site.concat(url);
//    url = url.concat(getCookieValue('urutan'));
//    url = url.concat('/');
//    url = url.concat(getCookieValue('kode'));
//    $.getJSON(url, function(result){
//      posisiRecall();
//    });
//  });
  //Button Daftar Lagi
  $("#btn_daftar_lagi").click(function(){
    posisiDaftar();
  });

  function posisiDaftar(){
    $(".elemen").hide();
    expiry_timestamp = getCookieValue('expires');
    today_date = new Date();
    today_date.setHours(0,0,0,0);
    today_timestamp = today_date.getTime()/1000;
    if(expiry_timestamp>today_timestamp){
      $("#btn_batal_daftar").show(); 
    }
    $("#div_daftar").fadeIn();
  }

  //ONCHANGE terpanggil
  function hiyanimate(){
    $("#box_info").css("opacity", "0");
    //console.log('telah pudahr');
    $("#box_info").animate({opacity: "1"},1000);
    //console.log('telah kembali');
  }

  function posisiTelat(){
    $('#btn_terlambat').hide();
  }
  
  $("#btn_batal_daftar").click(function(){
    $('.elemen').hide();
    $('#div_tunggu').fadeIn();
  });
  
  $('#btn_batal_login').click(function(){
    $('.elemen').hide();
    $('#div_daftar').fadeIn();
  });
  
  $('#a_beres').click(function(){
    $('.elemen').hide();
    document.cookie = '';
    $('#div_daftar').fadeIn();
  });
  
  $('#a_sudah_di_lokasi').click(function(){
    //Back
    
    //Kosmetik
    $('#a_sudah_di_lokasi').hide();
    $('#p_terlambat').hide();
    $('#p_terlambat').fadeIn();
  });
  

});