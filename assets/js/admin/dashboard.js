$(document).ready(function() {
  //STARTUP
  site = $("#base_url").val();
  url = "admin/dashboard_startup_status";
  url = site.concat(url);
  $.getJSON(url, function(result){
    if(result["loket1_status"]=='1'){
      turned_on(1);
    }
    if(result["loket2_status"]=='1'){
      turned_on(2);
    }
    if(result["loket3_status"]=='1'){
      turned_on(3);
    }
    if(result["loket4_status"]=='1'){
      turned_on(4);
    }
    if(result["loket5_status"]=='1'){
      turned_on(5);
    }
    if(result["loket6_status"]=='1'){
      turned_on(6);
    }
  });
  setInterval(function(){
    setUrutanInLokets();
  },1000);
  site = $("#base_url").val();
  url = "admin/dashboard_startup_urutan";
  url = site.concat(url);
  $.getJSON(url, function(result){
    $('#loket1_urutan').text(result["loket1_urutan"]);
    $('#loket2_urutan').text(result["loket2_urutan"]);
    $('#loket3_urutan').text(result["loket3_urutan"]);
    $('#loket4_urutan').text(result["loket4_urutan"]);
    $('#loket5_urutan').text(result["loket5_urutan"]);
    $('#loket6_urutan').text(result["loket6_urutan"]);
  });
  function setUrutanInLokets(){
    url = site+'antrian/getUrutanInLokets';
    console.log(url);
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
  $('#loket1_button').click(function(){
    site = $("#base_url").val();
    url = "admin/activate_loket/1";
    url = site.concat(url);
    $.getJSON(url, function(result){
      if(result['kondisi']=='turned_on'){
        turned_on(1);
      } else if(result['kondisi']=='turned_off'){
        turned_off(1);
      }
    });
  });
  $('#loket2_button').click(function(){
    site = $("#base_url").val();
    url = "admin/activate_loket/2";
    url = site.concat(url);
    $.getJSON(url, function(result){
      if(result['kondisi']=='turned_on'){
        turned_on(2);
      } else if(result['kondisi']=='turned_off'){
        turned_off(2);
      }
    });
  });
  $('#loket3_button').click(function(){
    site = $("#base_url").val();
    url = "admin/activate_loket/3";
    url = site.concat(url);
    $.getJSON(url, function(result){
      if(result['kondisi']=='turned_on'){
        turned_on(3);
      } else if(result['kondisi']=='turned_off'){
        turned_off(3);
      }
    });
  });
  $('#loket4_button').click(function(){
    site = $("#base_url").val();
    url = "admin/activate_loket/4";
    url = site.concat(url);
    $.getJSON(url, function(result){
      if(result['kondisi']=='turned_on'){
        turned_on(4);
      } else if(result['kondisi']=='turned_off'){
        turned_off(4);
      }
    });
  });
  $('#loket5_button').click(function(){
    site = $("#base_url").val();
    url = "admin/activate_loket/5";
    url = site.concat(url);
    $.getJSON(url, function(result){
      if(result['kondisi']=='turned_on'){
        turned_on(5);
      } else if(result['kondisi']=='turned_off'){
        turned_off(5);
      }
    });
  });
  $('#loket6_button').click(function(){
    site = $("#base_url").val();
    url = "admin/activate_loket/6";
    url = site.concat(url);
    $.getJSON(url, function(result){
      if(result['kondisi']=='turned_on'){
        turned_on(6);
      } else if(result['kondisi']=='turned_off'){
        turned_off(6);
      }
    });
  });

  function turned_on(loket){
    boxname = '#loket'+loket+'_box';
    tulisanname = '#loket'+loket+'_tulisan';
    $(boxname).removeClass('bg-disabled');
    $(boxname).addClass('bg-info');
    $(tulisanname).text('Matikan');
  }

  function turned_off(loket){
    boxname = '#loket'+loket+'_box';
    tulisanname = '#loket'+loket+'_tulisan';
    $(boxname).removeClass('bg-info');
    $(boxname).addClass('bg-disabled');
    $(tulisanname).text('Hidupkan');
  }




});