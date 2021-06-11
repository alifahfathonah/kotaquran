
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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
          		<?php if (validation_errors()) : ?>
          			<div class="alert alert-danger" role="alert">
          				<?= validation_errors(); ?>
          			</div>
          		<?php endif; ?>
          		<div class="card">
					<div class="card-header">
					Kelola Level
					</div>
					<div class="card-body">
						
						<form action="<?= base_url('kaderisasi/editlevel')."/".$level['id']; ?>" method="post">
					      <div class="modal-body">
						  	<div class="form-group row">
								<label for="kode_level" class="col-sm-4 col-form-label">Kode level</label>
								<div class="col-sm-8">
							    	<input type="text" class="form-control" id="kode_level" name="kode_level" value="<?= $level['kode_level']; ?>" required>
							    </div>
						  	</div>
							<div class="form-group row">
								<label for="nama_level" class="col-sm-4 col-form-label">Ketua level</label>
								<div class="col-sm-8">
							    	<input type="text" class="form-control" id="nama_level" name="nama_level" value="<?= $level['nama_level']; ?>" required>
							    </div>
						  	</div>
					      </div>
						<a href="<?= base_url('kaderisasi/level'); ?>" class="btn btn-secondary">Cancel</a>
						<button type="submit" class="btn btn-primary">Save</button>
						</form>
						
					</div>
				</div>
          	</div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

