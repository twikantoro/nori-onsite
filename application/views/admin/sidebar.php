<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo base_url()?>" class="brand-link">
    <img src="<?php echo base_url()?>assets/images/bilogoputih.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">Si Nomor Antrian</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo base_url()?>vendor/almasaeed2010/adminlte/dist/img/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Admin</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a id="nav_dashboard" href="<?php echo base_url('admin/index')?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a id="nav_layar_publik" href="<?php echo base_url('pegawai')?>" class="nav-link">
            <i class="nav-icon fas fa-desktop"></i>
            <p>
              Layar Publik
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a id="nav_manajemen" href="<?php echo base_url('admin/manajemen')?>" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Manajemen User
            </p>
          </a>
        </li>
        <li id="nav_pengaturan_li" class="nav-item has-treeview">
          <a id="nav_pengaturan" href="#" class="nav-link">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              Pengaturan
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a id="nav_pengaturan_tombol" href="<?php echo base_url('admin/pengaturan_tombol')?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tombol</p>
              </a>
            </li>
            <li class="nav-item">
              <a id="nav_pengaturan_tampilan" href="<?php echo base_url('admin/pengaturan_tampilan')?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tampilan</p>
              </a>
            </li>
            <li class="nav-item">
              <a id="nav_pengaturan_akun" href="<?php echo base_url('admin/pengaturan_akun')?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Akun</p>
              </a>
            </li>
          </ul>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>