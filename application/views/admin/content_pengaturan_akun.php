<div class="content-wrapper">
  <input type="hidden" id="page_name_mother" value="pengaturan">
  <input type="hidden" id="page_name" value="pengaturan_akun">
  <input type="hidden" id="base_url" value="<?php echo base_url()?>">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Pengaturan akun</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pengaturan akun</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Pengaturan akun</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form id="form_pengaturan_akun" method="post">
                <!--NAMA-->
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap" value="<?php echo $nama?>">
                </div>
                <!--Username-->
                <div class="form-group">
                  <label>Username</label>
                  <input class="form-control" type="text" name="username" placeholder="Username" value="<?php echo $username?>">
                </div>
              </form>
              <span id="btn_ubah_password">
                <button  class="btn btn-info" type="button" onclick="showUbahPassword();">Ubah password...</button></span>
              <!--UBAH PASSWORD -->
              <form id="form_pengaturan_akun_password" method="post">
                <div id="ubah_password" style="display:none">
                  <label>Ubah password</label>
                  <!--Password-->
                  <div class="form-group">
                    <input class="form-control" type="password" name="password_lama" placeholder="Password lama">
                  </div>
                  <!--Ubah password-->
                  <div class="form-group">
                    <input class="form-control" type="password" name="password_baru" placeholder="Password baru">
                  </div>
                  <!--konfirmasi-->
                  <div class="form-group">
                    <input class="form-control" type="password" name="password_baru_konfirmasi" placeholder="Konfirmasi password baru">
                  </div>
                </div>
              </form>

              <div  style="display:none" id="alert_akun" class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <span id="alert_akun_teks">Password tidak matching</span>
              </div>
              <div id="error"></div>
            </div>

            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <button type="button" onclick="submitAkun();" id="btnAkun" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script>
  $(document).ready(function(){


  })
  function showUbahPassword(){
    $('#ubah_password').show();
    $('#btn_ubah_password').hide();
  }
  function submitAkun(){
    $('#alert_akun').removeClass('alert-success').addClass('alert-danger')
    $('#btnAkun').text('Menyimpan...')
    url = '<?php echo base_url('admin/submitAkun') ?>'
    var fd = new FormData($("#form_pengaturan_akun").get(0));
    $.ajax({
      url: url,  
      type: 'POST',
      data: fd,
      success:function(result){ 
        res = JSON.parse(result)
        //$('#error').html(result)
        console.log(result);
        console.log(typeof result)
        console.log(res)
        console.log(typeof res)
        $('#btnAkun').text('Simpan')
        if(res.success==true){
          if($('#btn_ubah_password').is(':hidden')){
            submitPassword()
          } else {
            $('#alert_akun').removeClass('alert-danger').addClass('alert-success')
            $('#alert_akun_teks').text('Berhasil')
            $('#alert_akun').show()  
          }
        } else {
          $('#alert_akun_teks').text(res.message)
          $('#alert_akun').show()
        }
      },
      error: function(result){
        $('#error').html(result.responseText)
      },
      cache: false,
      contentType: false,
      processData: false
    });
  }
  function submitPassword(){
    var fd = new FormData($("#form_pengaturan_akun_password").get(0));
    url = '<?php echo base_url('admin/submitPassword') ?>'
    $.ajax({
      url: url,  
      type: 'POST',
      data: fd,
      success:function(result){ 
        res = JSON.parse(result)
        //$('#error').html(result)
        console.log(result);
        console.log(typeof result)
        console.log(res)
        console.log(typeof res)
        $('#btnAkun').text('Simpan')
        if(res.success==true){
          $('#alert_akun').removeClass('alert-danger').addClass('alert-success')
          $('#alert_akun_teks').text('Berhasil')
          $('#alert_akun').show()
        } else {
          $('#alert_akun_teks').text(res.message)
          $('#alert_akun').show()
        }
      },
      error: function(result){
        $('#error').html(result.responseText)
      },
      cache: false,
      contentType: false,
      processData: false
    });
  }
</script>