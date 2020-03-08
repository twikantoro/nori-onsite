<div class="content-wrapper">
  <input type="hidden" id="page_name" value="manajemen">
  <input type="hidden" id="base_url" value="<?php echo base_url()?>">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Manajemen User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Manajemen User</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="modal fade show" id="modal-password" style="display: none; padding-right: 17px;" aria-modal="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Reset Password</h4>
            <button type="button" class="close" onclick="closeModal();" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="reset-password" method="post">
              <div class="form-group">
                <p>Reset password untuk <b id="username"></b></p>
                <input id="hiddenUsername" type="hidden" name="username" value="">
                <input type="password" class="form-control" name="password" placeholder="Password baru...">
              </div>
            </form>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="closeModal();">Batal</button>
            <button type="button" class="btn btn-primary" onclick="submitPassword();">Simpan</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Users</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="perpage" id="perpage" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input id="search" type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Role</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="thebody"></tbody>
                </table>
                </div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="showing"></div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                <ul id="pagination" class="pagination">

                </ul></div></div></div></div>
            </div>
            <input type="hidden" id="page" value="<?php echo $page ?>"> 
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script src="<?php echo base_url()?>assets/js/admin/manajemen.js"></script>