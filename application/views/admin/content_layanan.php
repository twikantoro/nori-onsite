<div class="content-wrapper">
  <input type="hidden" id="page_name_mother" value="pengaturan">
  <input type="hidden" id="page_name" value="pengaturan_tampilan">
  <input type="hidden" id="base_url" value="<?php echo base_url()?>">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Pengaturan layanan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pengaturan layanan</li>
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
          <?php foreach ($layanan as $row){
  echo '<div class="card">';
  echo '<div class="card-header">
              <h5 class="card-title m-0">'.$row->nama_layanan.'</h5>
            </div>';
  echo '<div class="card-body">';
  echo '<h6 class="card-title">Deskripsi</h6>';
  echo '<p  class="card-text">'.$row->deskripsi.'</p>';
  echo '<a href="#" class="btn btn-primary">'.$row->nama_layanan.'</a>';
  echo '</div>';
  echo '</div>
      ';
} ?>








       </div> 
    </div>
    </div>
  </section>
</div>