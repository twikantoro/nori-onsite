<div class="content-wrapper">
  <input type="hidden" id="page_name" value="dashboard">
  <input type="hidden" id="base_url" value="<?php echo base_url()?>">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
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
        <!--LOKET 1-->
        <div class="col-lg-3 col-6">
          <div id="loket1_box" class="small-box bg-disabled">
            <div class="inner">
              <h3 id="loket1_urutan">150</h3>

              <p>Loket 1</p>
            </div>
            <div class="icon">
              <i class="ion ion-monitor"></i>
            </div>
            <a href="#" id="loket1_button" class="small-box-footer"><span id="loket1_tulisan">Hidupkan</span> <i class="fas fa-power-off"></i></a>
          </div>
        </div>
        <!--LOKET 2-->
        <div class="col-lg-3 col-6">
          <div id="loket2_box" class="small-box bg-disabled">
            <div class="inner">
              <h3 id="loket2_urutan">150</h3>

              <p>Loket 2</p>
            </div>
            <div class="icon">
              <i class="ion ion-monitor"></i>
            </div>
            <a href="#" id="loket2_button" class="small-box-footer"><span id="loket2_tulisan">Hidupkan</span> <i class="fas fa-power-off"></i></a>
          </div>
        </div>
        <!--LOKET 3-->
        <div class="col-lg-3 col-6">
          <div id="loket3_box" class="small-box bg-disabled">
            <div class="inner">
              <h3 id="loket3_urutan">150</h3>

              <p>Loket 3</p>
            </div>
            <div class="icon">
              <i class="ion ion-monitor"></i>
            </div>
            <a href="#" id="loket3_button" class="small-box-footer"><span id="loket3_tulisan">Hidupkan</span> <i class="fas fa-power-off"></i></a>
          </div>
        </div>
        <!--LOKET 4-->
        <div class="col-lg-3 col-6">
          <div id="loket4_box" class="small-box bg-disabled">
            <div class="inner">
              <h3 id="loket4_urutan">150</h3>

              <p>Loket 4</p>
            </div>
            <div class="icon">
              <i class="ion ion-monitor"></i>
            </div>
            <a href="#" id="loket4_button" class="small-box-footer"><span id="loket4_tulisan">Hidupkan</span> <i class="fas fa-power-off"></i></a>
          </div>
        </div>
        <!--LOKET 5-->
        <div class="col-lg-3 col-6">
          <div id="loket5_box" class="small-box bg-disabled">
            <div class="inner">
              <h3 id="loket5_urutan">150</h3>

              <p>Loket 5</p>
            </div>
            <div class="icon">
              <i class="ion ion-monitor"></i>
            </div>
            <a href="#" id="loket5_button" class="small-box-footer"><span id="loket4_tulisan">Hidupkan</span> <i class="fas fa-power-off"></i></a>
          </div>
        </div>
        <!--LOKET 6-->
        <div class="col-lg-3 col-6">
          <div id="loket6_box" class="small-box bg-disabled">
            <div class="inner">
              <h3 id="loket6_urutan">150</h3>

              <p>Loket 6</p>
            </div>
            <div class="icon">
              <i class="ion ion-monitor"></i>
            </div>
            <a href="#" id="loket6_button" class="small-box-footer"><span id="loket4_tulisan">Hidupkan</span> <i class="fas fa-power-off"></i></a>
          </div>
        </div>
      </div>

      <!--ROW3: Grafik-->
      <div style="display:none" class="row">
        <div class="col-lg-7 connectedSortable ui-sortable">
          <div class="card" style="position: relative; left: 0px; top: 0px;">
              <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                  <i class="fas fa-chart-line mr-1"></i>
                  Jumlah pengantri harian
                </h3>
                
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                      <canvas id="revenue-chart-canvas" height="269" style="height: 300px; display: block; width: 664px;" width="597" class="chartjs-render-monitor"></canvas>                         
                   </div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="sales-chart-canvas" height="269" style="height: 300px; display: block; width: 664px;" width="597" class="chartjs-render-monitor"></canvas>                         
                  </div>  
                </div>
              </div><!-- /.card-body -->
            </div>
        </div>
      </div><!-- /grafik-->
    </div>
  </section>
</div>
<script src="<?php echo base_url()?>assets/js/admin/dashboard.js"></script>