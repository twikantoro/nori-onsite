
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
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <div class="card-body">
              <!-- <div class="form-group">
                <label>Tata Letak</label>
                <div class="row">
                  <div class="col">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="tata_letak" value="4" checked="">
                      <label class="form-check-label">4 Loket</label>
                    </div>


                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="mode" value="6">
                      <label class="form-check-label">6 Loket</label>
                    </div>
                  </div>
                </div>


              </div> -->
              <div class="form-group">
                <label>Running Text</label>
                <textarea class="form-control" name="running_text" rows="3" placeholder="Enter ..."><?php echo $settings->running_text ?></textarea>
              </div>

              <div class="form-group">
                <label for="exampleInputFile">Gambar Background</label>
                <form id="bgUpload" enctype="multipart/form-data">
                  <input id="backgroundUpload" class="" type="file" name="background">
                  <a id="btnUpload" class="btn btn-primary disabled" href="#" onclick="uploadBG();">Upload</a>
                  <a style="display:none" id="uploadSuccess" class="btn btn-success disabled" href="#">Sukses!</a>
                </form>
              </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <a href="#" type="submit" class="btn btn-primary">Simpan</a>
            </div>

          </div> 
        </div>
        <!--col playlist-->
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Playlist</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <div class="card-body">
              <div class="callout callout-info">
                <h5>Bagaimana cara mengatur playlist?</h5>

                <p>Mudah! Letakkan foto atau video anda pada folder assets/playlist/ dengan nama file yang diawali dengan angka (1-10) dan diikuti dengan judul (opsional). Contoh:</p>
                <p>1. video satu</p>
                <p>2. gambar satu</p>
                <p>3. dst...</p>
                <p>Video dimainkan full durasi sedangkan foto ditampilkan selama 10 detik. Maksimal jumlah file yang terbaca adalah 9</p>
                <p>Format file yang didukung: JPG, PNG, BMP, MP4, WEBM</p>
              </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <a href="#" type="submit" class="btn btn-primary">Simpan</a>
            </div>

          </div> 
        </div>
        <!--col loket-->
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Warna Loket (advanced/CSS)</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <div class="card-body">
              <div class="form-group">
                <label>Warna teks</label>
                <input class="form-control" type="text" name="loket_text_warna" value="<?php echo $settings->loket_text_warna?>" placeholder="default: <?php echo $defaults['loket_text_warna'] ?>">
              </div>
              <div class="form-group">
                <label>Warna kotak</label>
                <input class="form-control" type="text" name="loket_kotak_warna" value="<?php echo $settings->loket_kotak_warna?>" placeholder="default: <?php echo $defaults['loket_kotak_warna'] ?>">
              </div>
              <div class="form-group">
                <label>Warna border</label>
                <input class="form-control" type="text" name="loket_border_warna" value="<?php echo $settings->loket_border_warna?>" placeholder="default: <?php echo $defaults['loket_border_warna'] ?>">
              </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <a href="#" type="submit" class="btn btn-primary">Simpan</a>
            </div>

          </div> 
        </div>
        <!--col running text-->
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Warna Running Text (advanced/CSS)</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <div class="card-body">
              <div class="form-group">
                <label>Warna teks</label>
                <input class="form-control" type="text" name="running_text_warna" value="<?php echo $settings->running_text_warna?>" placeholder="default: <?php echo $defaults['running_text_warna'] ?>">
              </div>
              <div class="form-group">
                <label>Warna background</label>
                <input class="form-control" type="text" name="running_text_background" value="<?php echo $settings->running_text_background?>" placeholder="default: <?php echo $defaults['running_text_background'] ?>">
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <a href="#" type="submit" class="btn btn-primary">Simpan</a>
            </div>

          </div> 
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <a href="#" class="btn btn-primary">Simpan Semua</a>
          </div>
        </div>
      </div>

    </div>
  </section>
</div>
<script>
  $(document).ready(function(){
    $('#backgroundUpload').change(function(e){
      $('#btnUpload').removeClass('disabled');

    })
  });

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
      },
      cache: false,
      contentType: false,
      processData: false
    });
  }
</script>