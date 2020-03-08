$(document).ready(function(){
  setInterval(function(){
    cekBedaUnserved();
    cekBedaServed();
    timeRefresh();
    cekKeaktifan();
  },1000);
});
function timeRefresh(){
  d = new Date();
  if(d.getSeconds()<10){
    seconds = '0'+d.getSeconds();
  } else {seconds = d.getSeconds();}
  if(d.getMinutes()<10){
    minutes = '0'+d.getMinutes();
  } else {minutes = d.getMinutes()};
  if(d.getHours()<10){
    hours = '0'+d.getHours();
  } else {hours = d.getHours()};
  $('#time').text(hours+':'+minutes+':'+seconds);
}
function cekBedaUnserved(){
  url = $('#base_url').val()+'antrian/get_firstnlast_unserved';
  ////console.log(url);
  $.get( url, function( data ) {
    obj = JSON.parse(data);
    newUnservedFirst = obj.unservedFirst;
    newUnservedLast = obj.unservedLast;
    ////console.log($('#unserved').val());
    if(newUnservedFirst!=$('#unservedFirst').val()||newUnservedLast!=$('#unservedLast').val()){
      buildUnserved();
      $('#unservedFirst').val(newUnservedFirst);
      $('#unservedLast').val(newUnservedLast);
    }
    ////console.log($('#unserved').val());
  });
}
function buildUnserved(){
  html = '';
  url = $('#base_url').val()+'antrian/get_many_unserved/10';
  $.get( url, function( data ) {
    rows = JSON.parse(data);
    var i = 0;
    for(i=0;i<rows.length;i++){
      html = html.concat(createRowUnserved(rows[i],i+1));
    }
    ////console.log(html);
    $('#unserveds').html(html);
  });
}
function createRowUnserved(row,num){
  if(row.grup_antrian=='B'){
    returns = '<tr id="'+row.id_antrian+'" style="background-color:#eee">';
  } else {
    returns = '<tr id="'+row.id_antrian+'">';
  }
  returns +=
    '<td>'+num+'</td>'+
    '<td>'+row.waktu_masuk.substr(11,5)+'</td>'+
    '<td>'+row.grup_antrian+row.urutan+'</td>'+
    '<td>'  
  for(i=1;i<=6;i++){
    if($('#loket'+i+'_status').val()!=1){
      returns += '<a style="padding-top:0px;padding-bottom:0px;margin-left:1em" class="btn disabled btn-danger loket'+i+'" href="#" onclick="layani'+i+'('+row.id_antrian+');">'+i+'</a>'  
    } else {
      returns += '<a style="padding-top:0px;padding-bottom:0px;margin-left:1em" class="btn btn-info loket'+i+'" href="#" onclick="layani'+i+'('+row.id_antrian+');">'+i+'</a>' 
    }
  }
  returns += '</td>'+'</tr>';
  return returns;
}
function layani1(id){
  removeRow(id);
  url = $('#base_url').val()+'antrian/layani/1/'+id;
  //console.log(url);
  $.get( url, function( data ) {});
}
function layani2(id){
  removeRow(id);
  url = $('#base_url').val()+'antrian/layani/2/'+id;
  //console.log(url);
  $.get( url, function( data ) {});
}
function layani3(id){
  removeRow(id);
  url = $('#base_url').val()+'antrian/layani/3/'+id;
  //console.log(url);
  $.get( url, function( data ) {});
}
function layani4(id){
  removeRow(id);
  url = $('#base_url').val()+'antrian/layani/4/'+id;
  //console.log(url);
  $.get( url, function( data ) {});
}
function layani5(id){
  removeRow(id);
  url = $('#base_url').val()+'antrian/layani/5/'+id;
  //console.log(url);
  $.get( url, function( data ) {});
}
function layani6(id){
  removeRow(id);
  url = $('#base_url').val()+'antrian/layani/6/'+id;
  //console.log(url);
  $.get( url, function( data ) {});
}
function cekBedaServed(){
  url = $('#base_url').val()+'antrian/get_firstnlast_served';
  ////console.log(url);
  $.get( url, function( data ) {
    obj = JSON.parse(data);
    newServedFirst = obj.servedFirst;
    newServedLast = obj.servedLast;
    ////console.log($('#unserved').val());
    if(newServedFirst!=$('#servedFirst').val()||newServedLast!=$('#servedLast').val()){
      buildServed();
      $('#servedFirst').val(newServedFirst);
      $('#servedLast').val(newServedLast);
    }
    ////console.log($('#unserved').val());
  });
}
function buildServed(){
  htmlServed = '';
  url = $('#base_url').val()+'antrian/get_many_served/10';
  $.get( url, function( data ) {
    rows = JSON.parse(data);
    var i = 0;
    for(i=0;i<rows.length;i++){
      htmlServed = htmlServed.concat(createRowServed(rows[i],i+1));
    }
    ////console.log(html);
    $('#serveds').html(htmlServed);
  });
}
function createRowServed(row,num){
  if(row.grup_antrian=='B'){
    returns = '<tr id="'+row.id_antrian+'" style="background-color:#eee">';
  } else {
    returns = '<tr id="'+row.id_antrian+'">';
  }
  returns +=
    '<td>'+num+'</td>'+
    '<td>'+row.waktu_dilayani.substr(11,5)+'</td>'+
    '<td>'+row.grup_antrian+row.urutan+'</td>'+
    '<td>'+row.loket+'</td>'+
    '<td><a class="text-danger" href="#" onclick="undo('+row.id_antrian+');"><i class="fas fa-undo"></i></a>'+
    '<a href="#" class="text-success" style="margin-left: 1em" onclick="play('+row.id_antrian+');"><i class="fas fa-play-circle"></i></a></td>'+
    '</tr>';
  return returns;
}
function undo(id)
{
  removeRow(id);
  url = $('#base_url').val()+'antrian/undo/'+id;
  //console.log(url);
  $.get( url, function( data ) {});
}
function removeRow(id)
{
  $('#'+id).fadeOut();
}
function tambahA()
{
  url = $('#base_url').val()+'antrian/addX/A';
  $.get( url, function( data ) {});
}
function tambahB()
{
  url = $('#base_url').val()+'antrian/addX/B';
  $.get( url, function( data ) {});
}
function resetAntrian()
{
  url = $('#base_url').val()+'antrian/resetAntrian';
  $.get( url, function( data ) {});
}
function cekKeaktifan()
{
  url = $('#base_url').val()+'pegawai/json_loket_statuses';
  $.getJSON(url, function(result){
    for(i=1;i<=6;i++){
      if(result['loket'+i+'_status']!=$('#loket'+i+'_status').val()){
        $('#loket'+i+'_status').val(result['loket'+i+'_status'])

      }
      if(result['loket'+i+'_status']!=1){
        disable_loket(i)
      } else {enable_loket(i)}
    }
  })
}
function disable_loket(loket)
{
  $('#unserveds').find('.loket'+loket).addClass('disabled btn-danger').removeClass('btn-info')
  //console.log('disabled loket '+loket)
}
function enable_loket(loket)
{
  $('#unserveds').find('.loket'+loket).removeClass('disabled').addClass('btn-info');
  //console.log('enabled loket '+loket)
}