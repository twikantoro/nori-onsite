
<div class="content-wrapper">
  <input type="hidden" id="page_name_mother" value="pengaturan">
  <input type="hidden" id="page_name" value="pengaturan_tampilan">
  <input type="hidden" id="base_url" value="<?php echo base_url()?>">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Pengaturan tampilan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pengaturan tampilan</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">

      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
              <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Umum</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Media</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Warna (advanced)</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                  <form id="formGeneral" enctype="application/x-www-form-urlencoded">
                    <div class="form-group">
                      <label>Tata Letak</label>
                      <div class="row">
                        <div class="col">
                          <div class="form-check">
                            <input id="cek4" class="form-check-input" type="radio" name="tata_letak" value="4">
                            <label class="form-check-label">4 Loket</label>
                          </div>


                          <div class="form-check">
                            <input id="cek6" class="form-check-input" type="radio" name="tata_letak" value="6">
                            <label class="form-check-label">6 Loket</label>
                          </div>
                        </div>
                      </div>


                    </div>
                    <div class="form-group">
                      <label>Running Text</label>
                      <textarea class="form-control" name="running_text" rows="3" placeholder="Enter ..."><?php echo $settings->running_text ?></textarea>
                    </div>
                  </form>
                  <div class="form-group">
                    <label for="exampleInputFile">Gambar Background</label>
                    <br />
                    <img id="img_background" style="max-height:200px;max-width:200px" src="<?php echo base_url().'uploads/'.$settings->background; ?>">
                    <p id="p_background"><?php echo $settings->background ?></p>
                    <form id="bgUpload" enctype="multipart/form-data">
                      <input id="backgroundUpload" class="" type="file" name="background" >
                      <a style="display:none" id="btnUpload" class="btn btn-primary" href="#" onclick="uploadBG();">Upload</a>
                      <a style="display:none" id="uploadSuccess" class="btn btn-success disabled" href="#">Sukses!</a>
                    </form>
                  </div>

                  <button id="btnGeneral" type="button" onclick="submitGeneral();" class="btn btn-primary">Simpan</button>


                </div>
                <!-- TAB PLAYLIST -->
                <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                  <table style="vertical-align:middle" class="table table-bordered">
                    <thead>                  
                      <tr>
                        <!-- <th style="width: 10px">#</th> -->
                        <th>Nama file</th>
                        <th style="text-align:center">Preview</th>
                        <th style="text-align:center">Status</th>
                        <th style="text-align:center">Jenis</th>
                        <th style="text-align:center">Durasi</th>
                        <th style="text-align:center;min-width:150px">Action</th>
                      </tr>
                    </thead>
                    <tbody id="mediaTableBody">

                    </tbody>
                  </table>
                  <div id="error"></div>
                  <button type="button" onclick="addRow();" class="btn btn-info"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Tambah</button>
                  <br /><br />
                  <button id="btnMedia" type="button" onclick="submitMedia();" class="btn btn-primary">Simpan</button>
                </div>
                <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                  <form id="formWarna" enctype="application/x-www-form-urlencoded">
                    <div class="alert alert-info alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-info"></i> Perhatian!</h5>
                      Biarkan kosong untuk nilai default.
                    </div>
                    <div class="form-group">
                      <label>Warna teks urutan pada loket</label>
                      <input class="form-control" type="text" name="loket_text_warna" value="<?php echo $settings->loket_text_warna?>" placeholder="default: <?php echo $defaults['loket_text_warna'] ?>">
                    </div>
                    <div class="form-group">
                      <label>Warna kotak pada loket</label>
                      <input class="form-control" type="text" name="loket_kotak_warna" value="<?php echo $settings->loket_kotak_warna?>" placeholder="default: <?php echo $defaults['loket_kotak_warna'] ?>">
                    </div>
                    <div class="form-group">
                      <label>Warna border pada loket</label>
                      <input class="form-control" type="text" name="loket_border_warna" value="<?php echo $settings->loket_border_warna?>" placeholder="default: <?php echo $defaults['loket_border_warna'] ?>">
                    </div>
                    <div class="form-group">
                      <label>Warna teks running-text</label>
                      <input class="form-control" type="text" name="running_text_warna" value="<?php echo $settings->running_text_warna?>" placeholder="default: <?php echo $defaults['running_text_warna'] ?>">
                    </div>
                    <div class="form-group">
                      <label>Warna background running-text</label>
                      <input class="form-control" type="text" name="running_text_background" value="<?php echo $settings->running_text_background?>" placeholder="default: <?php echo $defaults['running_text_background'] ?>">
                    </div>
                    <button id="btnWarna" type="button" onclick="submitWarna();" class="btn btn-primary">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>

    </div>
  </section>
</div>
<form id="urutans">
  <input type="hidden" name="shit" value="" id="urutansInput">
</form>
<script>
  $(document).ready(function(){

    $('#backgroundUpload').change(function(e){
      $('#btnUpload').show();
    })
    getMedias()
    //    addRow()
  });
  var rowsum=1
  var highestMedia=0

  function addRow()
  {
    row = renderMediaRowEmpty()
    console.log(row)
    $(row).appendTo('#mediaTableBody')
    fillAction(getRowSum(),null)
    incRowSum()
  }
  function uploadBG()
  {
    var fd = new FormData($("#bgUpload").get(0));
    $.ajax({
      url: '<?php echo base_url("admin/backgroundUpload")?>',  
      type: 'POST',
      data: fd,
      success:function(result){
        $('#btnUpload').hide();
        $('#uploadSuccess').show();
        refreshUploadedBackground()
      },
      cache: false,
      contentType: false,
      processData: false
    });
  }

  function refreshUploadedBackground(){
    url = '<?php echo base_url('admin/json_settings') ?>'
    $.getJSON(url, function(result){
      $('#img_background').attr('src','<?php echo base_url() ?>uploads/'+result.background)
      $('#p_background').html(result.background)
    })
  }

  function submitGeneral()
  {
    $('#btnGeneral').text('Menyimpan...')
    var fd = new FormData($("#formGeneral").get(0));
    $.ajax({
      url: '<?php echo base_url("admin/formGeneral")?>',  
      type: 'POST',
      data: fd,
      success:function(result){
        res = JSON.parse(result);
        if(res.success){
          $('#btnGeneral').removeClass('btn-primary').text('Tersimpan!')
          $('#btnGeneral').addClass('btn-success disabled')
        }
      },
      cache: false,
      contentType: false,
      processData: false
    });
  }

  $('#formGeneral').click(function(){
    $('#btnGeneral').removeClass('btn-success disabled').text('Simpan')
    $('#btnGeneral').addClass('btn-primary')
  })

  function submitWarna()
  {
    $('#btnWarna').text('Menyimpan...')
    var fd = new FormData($("#formWarna").get(0));
    $.ajax({
      url: '<?php echo base_url("admin/formWarna")?>',  
      type: 'POST',
      data: fd,
      success:function(result){
        res = JSON.parse(result);
        if(res.success){
          $('#btnWarna').removeClass('btn-primary').text('Tersimpan!')
          $('#btnWarna').addClass('btn-success disabled')
        }
      },
      cache: false,
      contentType: false,
      processData: false
    });
  }

  $('#formWarna').click(function(){
    $('#btnWarna').removeClass('btn-success disabled').text('Simpan')
    $('#btnWarna').addClass('btn-primary')
  })

  if(<?php echo $settings->tata_letak?>!=6){
    $('#cek4').attr('checked',true)
  } else {
    $('#cek6').attr('checked',true)
  }

  function renderMediaRowEmpty()
  {
    rowsum = getRowSum();
    incHighestMedia()
    num = getHighestMedia()
    returns = '<tr class="rowx" id="row'+num+'">'
    //returns += '<td>'+rowsum+'</td>'
    returns += '<td id="nama'+num+'"><form enctype="multipart/form-data" id="form'+num+'"><input type="file" name="media" onchange="fileIsReady('+num+');"></td>'
    returns += '<td id="preview'+num+'"></td>'
    returns += '<td style="text-align:center"><span id="tandaTanya'+num+'">??</span><a id="btnUpload'+num+'" style="display:none" href="javascript:void(0)" onclick="uploadMedia('+num+')" class="btn btn-primary">Upload</a></form>'
    returns += '</td>'
    returns += '<td style="text-align:center" id="jenis'+num+'">??</td>'
    returns += '<td style="text-align:center" id="durasi'+num+'">??</td>'
    returns += '<td style="text-align:center;font-size:1.5em" id="action'+num+'">??</td>'
    returns += '<tr>'
    return returns
  }

  function fillAction(num,above,below)
  {
    fill = ''
    if(above==null){
      fill += '<a href="javascript:void(0)" onclick="prioritize('+num+',0)"><i class="fas text-primary fa-arrow-circle-up"></i></a>&nbsp'  
    } else {
      fill += '<a href="javascript:void(0)" onclick="prioritize('+num+','+above+')"><i class="fas text-primary fa-arrow-circle-up"></i></a>&nbsp'  
    }
    if(below==null){
      fill += '<a href="javascript:void(0)" onclick="deprioritize('+num+',0)"><i class="fas text-primary fa-arrow-circle-down"></i></a>&nbsp'
    } else {
      fill += '<a href="javascript:void(0)" onclick="deprioritize('+num+','+below+')"><i class="fas text-primary fa-arrow-circle-down"></i></a>&nbsp'  
    }

    fill += '<a href="javascript:void(0)" onclick="remove('+num+')"><i class="fas text-danger fa-trash"></i></a>&nbsp'
    $('#action'+num).html(fill)
  }

  /*
  jika gagal buka php.ini
  upload_max_filesize = 1000M;
post_max_size = 1000M;
  */
  function uploadMedia(num){
    $('#btnUpload'+num).text('Uploading...').addClass('disabled')
    var fd = new FormData($('#form'+num).get(0));
    //console.log(fd)
    url = '<?php echo base_url("admin/formMedia")?>/'+num
    $.ajax({
      url: url,
      type: 'POST',
      data: fd,
      success:function(result){
        console.log(result)
        res = JSON.parse(result);
        if(res.success){
          $('#btnUpload'+num).removeClass('btn-primary').html('<i class="fas fa-check"></i>')
          $('#btnUpload'+num).addClass('btn-success')
          $('#jenis'+num).text(res.data.upload_data.file_type)
          if(res.data.upload_data.file_type.substring(0,1)=='i'){
            $('#preview'+num).html('<img style="max-width:150px;max-height:150px;" src="<?php echo base_url()?>uploads/media/'+res.data.upload_data.file_name+'">')
            $('#durasi'+num).html('<input class="form-control" type="number" style="width:4em" value="10" name="duration'+num+'">')
          } else {
            $('#preview'+num).html('<video style="max-width:150px;max-height:150px;"><source src="<?php echo base_url()?>uploads/media/'+res.nama+'" type="video/mp4"></video>')
            $('#durasi'+num).text(res.durasi+' detik')
          }

          //doneUploading(num)
        } else {
          console.log(result)
        }
      },
      error:function(e){
        $('#error').html(e.responseText)
      },
      cache: false,
      contentType: false,
      processData: false
    });
  }

  function setDuration(num,duration){
    url = '<?php echo base_url("admin/setMediaDuration")?>/'+num+'/'+duration;
    $.getJSON(url,function(){})
  }

  function doneUploading(num){
    url = '<?php echo base_url('admin/get_media_name/')?>'+num
    $.getJSON(url,function(result){
      $('#nama'+num).html(result.nama_file)
    })
  }

  function fileIsReady(num){
    console.log('file '+num+' is ready')
    $('#btnUpload'+num).show()
    $('#btnUpload'+num).html('Upload').removeClass('disabled btn-success').addClass('btn-primary')
    $('#tandaTanya'+num).hide()
  }

  function getMedias(){
    url = '<?php echo base_url('admin/json_medias/')?>'
    $.getJSON(url,function(result){
      for(i=0;i<result.length;i++){
        if(getHighestMedia()<result[i].id){
          setHighestMedia(result[i].id)
        }
        createMediaRow(result[i])
        if(typeof result[i-1]=='undefined'){ //min
          fillAction(result[i].id,null,result[i+1].id)
        } else {
          if(i<result.length-1) { //1-(max-1)
            fillAction(result[i].id,result[i-1].id,result[i+1].id)    
          } else { //max
            fillAction(result[i].id,result[i-1].id,null)
          }
        }
        incRowSum()
      }
    })
  }

  function createMediaRow(row)
  {
    num = row.id
    returns = '<tr class="rowx" id="row'+num+'">'
    //returns += '<td id="urutan'+num+'">'+row.urutan+'</td>'
    returns += '<td id="nama'+num+'">'+row.nama+'</td>'
    returns += '<td id="preview'+num+'">'
    if(row.jenis.substring(0,1)=='i'){
      returns += '<img style="max-width:150px;max-height:150px;" src="<?php echo base_url()?>uploads/media/'+row.nama+'">'
    } else {
      returns += 'Preview khusus untuk gambar'  
    }
    returns += '</td>'
    returns += '<td style="text-align:center"><a id="btnUpload'+num+'" href="javascript:void(0)" onclick="uploadMedia('+num+')" class="btn btn-success disabled"><i class="fas fa-check"></i></a>'
    returns += '</td>'
    returns += '<td style="text-align:center" id="jenis'+num+'">'+row.jenis+'</td>'
    returns += '<td style="text-align:center" id="durasi'+num+'">'
    if(row.jenis.substring(0,1)=='i'){
      returns += '<input class="form-control" type="number" style="width:4em" value="'+row.durasi+'" name="duration'+num+'">'
    } else {
      returns += ''
    }
    returns += '</td>'
    returns += '<td style="text-align:center;font-size:1.5em" id="action'+num+'">??</td>'
    returns += '<tr>'
    $(returns).appendTo('#mediaTableBody')
  }

  function prioritize(num,above){
    if(above==0){
      return false
    }
    urutanAtas = $('#urutan'+above).text()
    urutanBawah = $('#urutan'+num).text()
    row = $('#row'+num).get(0)
    //console.log(row)
    $('#row'+num).remove()
    $(row).insertBefore($('#row'+above))
    $('#urutan'+num).text(urutanAtas)
    $('#urutan'+above).text(urutanBawah)
    updateUrutan()
  }

  function deprioritize(num,below){
    if(below==0){
      return false
    }
    urutanAtas = $('#urutan'+num).text()
    urutanBawah = $('#urutan'+below).text()
    row = $('#row'+num).get(0)
    $('#row'+num).remove()
    $(row).insertAfter($('#row'+below))
    $('#urutan'+below).text(urutanAtas)
    $('#urutan'+num).text(urutanBawah)
    updateUrutan()
  }

  function updateUrutan(){
    mediaChanged()
    //url = '<?php echo base_url('admin/updateUrutan')?>'
    rows = $('.rowx')
    urutans = new Array()
    for(i=0;i<rows.length;i++){
      urutans[i] = $(rows[i]).attr('id').substr(3)
    }
    console.log(urutans)
    for(i=0;i<urutans.length;i++){
      //$('#action'+urutans[i]).find('input')
      if(i==0){ //min
        fillAction(urutans[i],null,urutans[i+1])  
      } else {
        if(i<urutans.length-1){ //1-(max-1)
          fillAction(urutans[i],urutans[i-1],urutans[i+1])    
        } else {
          fillAction(urutans[i],urutans[i-1],null)    
        }
      }
    }
    //console.log(urutans)
    //console.log(JSON.stringify(urutans))
    /*$('#urutansInput').val(JSON.stringify(urutans))
    var fd = new FormData($("#urutans").get(0))
    $.ajax({
      url: url,  
      type: 'POST',
      data: fd,
      success:function(result){
        //$('#error').html(result.responseText)
        //refreshAction()
      },
      error:function(result){
        $('#error').html(result.responseText)
      },
      cache: false,
      contentType: false,
      processData: false
    });*/
  }

  function remove(num){
    $('#row'+num).fadeOut(100).delay(100).remove()
    url = '<?php echo base_url('admin/removeMedia/') ?>'+num
    $.getJSON(url,function(result){
      $('#error').html(result.responseText)
    })
    updateUrutan()
    mediaChanged()
  }

  function getRowSum(){
    return this.rowsum
  }

  function incRowSum(){
    this.rowsum++
  }

  function decRowSum(){
    this.rowsum--
  }

  function setHighestMedia(num){
    this.highestMedia = num
  }

  function getHighestMedia(){
    return this.highestMedia
  }

  function incHighestMedia(){
    this.highestMedia++
  }

  function submitMedia(){
    $('#btnMedia').text('Menyimpan...')
    urutans = new Array()
    for(i=0;i<rows.length;i++){
      urutans[i] = $(rows[i]).attr('id').substr(3)
    }
    $('#urutansInput').val(JSON.stringify(urutans))
    var fd = new FormData($("#urutans").get(0));
    $.ajax({
      url: '<?php echo base_url("admin/submitMedia")?>',  
      type: 'POST',
      data: fd,
      success:function(result){
        $('#btnMedia').removeClass('btn-primary').addClass('disabled btn-success').text('Tersimpan!')
      },
      cache: false,
      contentType: false,
      processData: false
    });
  }

  function mediaChanged(){
    $('#btnMedia').addClass('btn-primary').removeClass('disabled btn-success').text('Simpan')
  }

</script>