<? php echo '
<div class="content-wrapper" style="min-height: 584px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <!-- <small>Version 2.0</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div id="murup-putih" class="col-md-3 col-sm-6 col-xs-12">
          <a id="thelink" onmouseover="darken()" onmouseout="restore()" class="info-box" href="#" style="opacity: 0; position: absolute; z-index: 2; width: 254px; overflow: hidden; background-color: black !important;"></a>
          <div class="info-box" id="murup-abu" style="position: relative; z-index: 1">
            <span id="murup-donker" href="#" class="info-box-icon bg-aqua"><i class="ion ion-ios-monitor-outline"></i></span>

            <div class="info-box-content">
              
              <span class="info-box-text">Layar Utama</span>
              <span class="info-box-number">READY</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Jumlah Penukar Harian</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <p class="text-center">
                    <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" style="height: 209px; width: 1266px;" width="1266" height="209"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
      

          
    </section>
    <!-- /.content -->
  </div>
  ';