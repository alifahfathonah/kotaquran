
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">Beranda</a></li>
              <li class="breadcrumb-item active"><?= $title; ?></li>
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-body">
			<div class="col-lg-6">
				<?= $this->session->flashdata('message'); ?>
				<form method="post" action="<?= base_url('user/changepassword'); ?>">
					<div class="form-group">
						<label for="current_password">Kata sandi sekarang</label>
						<input type="password" class="form-control" id="current_password" name="current_password">
						<?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="form-group">
						<label for="new_password1">Kata sandi baru</label>
						<input type="password" class="form-control" id="new_password1" name="new_password1">
						<?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="form-group">
						<label for="new_password2">Ulangi kata sandi baru</label>
						<input type="password" class="form-control" id="new_password2" name="new_password2">
						<?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="form-group">
            <a class="btn btn-warning" href="<?= base_url('user'); ?>">Kembali</a>&nbsp;
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>

			</div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

