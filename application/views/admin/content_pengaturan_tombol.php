<div class="content-wrapper">
  <input type="hidden" id="page_name_mother" value="pengaturan">
  <input type="hidden" id="page_name" value="pengaturan_tombol">
  <input type="hidden" id="base_url" value="<?php echo base_url()?>">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Pengaturan tombol</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pengaturan tombol</li>
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
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Pengaturan tombol<span style="color:#28a745;display:none"> - tersimpan!</span></h3>
              <div class="card-tools">
                <ul class="pagination pagination-sm float-right">
                  <li class="page-item"><a class="page-link bg-primary" id="btn_simpan" href="#">Simpan</a></li>
                  
                </ul>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            
            <table class="table table-bordered">
              <thead>                  
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Aksi</th>

                  <th style="width: 40px">Tombol</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach ($array_tombol as $key => $value){
  echo "<tr>";
  echo "<td>".$i++."</td>";
  echo "<td>".$key."</td>";
  echo "<td  style='text-align:center;font-size:1.2em'><input class='form-control the_inputs' onClick='this.select();' style='width:50px; text-align: center;' type='text' id='".$key."' value='".$value."' ></td>";
  echo "</tr>";
}?>

              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">

          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
</div>
<script src="<?php echo base_url()?>assets/js/admin/pengaturan_tombol.js"></script>