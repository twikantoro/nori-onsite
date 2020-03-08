$(document).ready(function(){
  $('#btn_simpan').click(function(){
    var submeet = '';
    $('.the_inputs').each(function(){
      submeet = submeet+'~';
      submeet = submeet.concat($(this).val());
      //alert(submeet);

    });
    site = $("#base_url").val();
    url = "admin/set_button/";
    url = site+url+submeet;
    //alert(url);
    $.getJSON(url, function(result){

    });
  });
});