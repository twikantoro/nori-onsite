<div class="content-wrapper">
  <input type="hidden" id="page_name" value="dashboard">
  <input type="hidden" id="base_url" value="<?php echo base_url()?>">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard Kasir <span style="font-size:0.7em">(<?php echo date('l, j M Y'); ?>) <span id="time"></span></span></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard Kasir</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <a id="btnTambahA" href="#" onclick="tambahA();"  class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tambah antrian</span>
              <span class="info-box-number">
                A
                <small></small>
              </span>
            </div>
            <!-- /.info-box-content -->
          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <a id="btnTambahB" href="#" onclick="tambahB();"  class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tambah antrian</span>
              <span class="info-box-number">B</span>
            </div>
            <!-- /.info-box-content -->
          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <a href="#" onclick="resetAntrian();" class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-sync"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Reset antrian dari 0</span>
              <span class="info-box-number">Total <span></span></span>
            </div>
            <!-- /.info-box-content -->
          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Antrian belum terlayani (top 10)</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>                  
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Waktu Masuk</th>
                    <th>Urutan</th>
                    <th>Layani di loket</th>
                  </tr>
                </thead>
                <tbody id="unserveds">
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Antrian terlayani (top 10)</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>                  
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Waktu Dilayani</th>
                    <th>Urutan</th>
                    <th>Loket</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="serveds">
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>

      <!--ROW3: Grafik-->

    </div>
  </section>
</div>
<input type="hidden" id="loket1_status" value="1">
<input type="hidden" id="loket2_status" value="1">
<input type="hidden" id="loket3_status" value="1">
<input type="hidden" id="loket4_status" value="1">
<input type="hidden" id="loket5_status" value="1">
<input type="hidden" id="loket6_status" value="1">
<script src="<?php echo base_url()?>assets/js/kasir/dashboard.js"></script>
<script>
  $(document).keypress(function(event){
    var x = event.key
    if ( x == '<?php echo $tambah_A ?>' ) {tambah_A();}
    if ( x == '<?php echo $tambah_B ?>' ) {tambah_B();}
    if ( x == '<?php echo $loket1_layani ?>' ) {layani(1);}
    if ( x == '<?php echo $loket2_layani ?>' ) {layani(2);}
    if ( x == '<?php echo $loket3_layani ?>' ) {layani(3);}
    if ( x == '<?php echo $loket4_layani ?>' ) {layani(4);}
    if ( x == '<?php echo $loket5_layani ?>' ) {layani(5);}
    if ( x == '<?php echo $loket6_layani ?>' ) {layani(6);}
  })
  function tambah_A(){
    $('#btnTambahA').click();
  }
  function tambah_B(){
    $('#btnTambahB').click();
  }
  function layani(loket){
    if($('#loket'+loket+'_status').val()==0){
      return false;
    }
    id = $('#unserveds').find('tr').first().attr('id')
    window['layani'+loket](id)
  }
</script>