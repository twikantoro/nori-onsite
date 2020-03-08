$(document).ready(function(){
  buildTable();
});
function buildTable(){
  perpage = $('#perpage').val()
  page = $('#page').val()
  url = $('#base_url').val()+'admin/fetch_user_table/'+perpage+'/'+page
  $.getJSON(url, function(result){
    html=''
    for(i=0;i<result.table.length;i++){
      html += createRow(result.table[i])
      //console.log(html)
    }
    $('#thebody').html(html)
    $('#showing').text('Menampilkan '+result.showing+', total '+result.total+' hasil')
    buildNav(result,page)
  });
}
function createRow(row){
  render = ''
  if(row.aktif==0){
    render += '<tr style="background-color:#eee">'
  } else {
    render += '<tr>'
  }
  render += '<td>'+row.id+'</td>'
  render += '<td>'+row.nama+'</td>'
  render += '<td>'+row.username+'</td>'
  if(row.role=='admin'){
    render += '<td style="background-color:gold">'+row.role+'</td>'
  } else {
    render += '<td>'+row.role+'</td>'  
  }
  render += '<td>'
  if(row.aktif==0){
    render += 'inaktif'
  } else {
    render += 'aktif'
  }
  render += '</td>'
  render += '<td>'
  if(row.aktif==0){
    render += '<a href="'+$('#base_url').val()+'admin/aktivasi/'+row.id+'" class="btn btn-success">Aktivasi</a>&nbsp'
  } else {
    render += '<a href="'+$('#base_url').val()+'admin/deaktivasi/'+row.id+'" class="btn btn-danger">Deaktivasi</a>&nbsp'
  }
  if(row.role=='kasir'){
    render += '<a href="'+$('#base_url').val()+'admin/angkat/'+row.id+'" class="btn btn-primary">Angkat sebagai admin</a>&nbsp'
  }
  render += '<button type="button" class="btn btn-info" onclick="resetPassword(\''+row.username+'\')">Reset Password...</button>'
  render += '</td>'
  render += '</tr>'
  return render
}
function buildNav(result,page){
  render = ''
  totalPage = result.total_pages
  if(page!=1){
    render +='<li class="paginate_button page-item previous" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>'
  } else {
    render +='<li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>'
  }

  pageMin = 1
  pageMax = totalPage
  pageStart = page-2;
  if(pageMin>pageStart){
    pageStart = pageMin
  }
  pageStop = pageStart+5
  if(pageStop>pageMax){
    pageStop = pageMax
  }
  for(i=pageStart;i<=pageStop;i++){
    render += '<li class="paginate_button page-item active"><a href="'+$('#base_url').val()+'admin/manajemen/'+$('#perpage').val()+'/'+i+'" aria-controls="example1" data-dt-idx="'+i+'" tabindex="0" class="page-link">'+i+'</a></li>'  
  }
  if(page==pageMax){
    render += '<li class="paginate_button page-item next disabled" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>'
  } else {
    render += '<li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>'
  }
  $('#pagination').html(render)
}
$('#search').keypress(function (e) {
  if (e.which == 13) {
    url = $('#base_url').val()+'admin/fetch_user_table/'+perpage+'/'+page+'/'+$('#search').val()
    $.getJSON(url, function(result){
      html=''
      for(i=0;i<result.table.length;i++){
        html += createRow(result.table[i])
        //console.log(html)
      }
      $('#thebody').html(html)
      $('#showing').text('Menampilkan '+result.showing+', total '+result.total+' hasil')
      buildNav(result,page)
    });
    return false;    //<---- Add this line
  }
});
function resetPassword(username){
  $('#hiddenUsername').val(username)
  $('#username').text(username)
  $('#modal-password').show()
}
function submitPassword(){
  $('#modal-password').hide()
  var fd = new FormData($("#reset-password").get(0));
  url = $('#base_url').val()+'admin/resetPassword'
  $.ajax({
    url: url,  
    type: 'POST',
    data: fd,
    success:function(result){ 
      
    },
    error: function(result){
      $('#error').html(result.responseText)
    },
    cache: false,
    contentType: false,
    processData: false
  });
}
function closeModal(){
  $('#modal-password').hide()
}