
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
			  	<?= $this->session->flashdata('message'); ?>
				<div class="card">
					<div class="card-header">
					Form Edit Role
					</div>
					<div class="card-body">

						<form action="<?= base_url('admin/editrole'); ?>/<?= $role['id']; ?>" method="post">
							<div class="modal-body">
								<div class="form-group">
									<input type="text" class="form-control" id="role" name="role" placeholder="" value="<?= $role['role']; ?>">
								</div>
							</div>
							<a href="<?= base_url('admin/role'); ?>" class="btn btn-secondary">Cancel</a>
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


