
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
					Edit Anggota
					</div>
					<div class="card-body">
						
						<form action="<?= base_url('kaderisasi/manageuser'); ?>/<?= $users['id'] ?>" method="post">
					      <div class="modal-body">
					        <div class="form-group row">
								<label for="email" class="col-sm-4 col-form-label">No. Handphone</label>
								<div class="col-sm-8">
							    	<input type="text" class="form-control" id="email" name="email" placeholder="" value="<?= $users['email']; ?>" readonly>
							    </div>
						  	</div>
						  	<div class="form-group row">
								<label for="email" class="col-sm-4 col-form-label">Nama</label>
								<div class="col-sm-8">
							    	<input type="text" class="form-control" id="name" name="name" placeholder="" value="<?= $users['name']; ?>" readonly>
							    </div>
						  	</div>
						  	<div class="form-group row">
								<label for="email" class="col-sm-4 col-form-label">Pembimbing UPA</label>
								<div class="col-sm-8">
									<select name="upa_id" id="upa_id" class="form-control">
										<option value="<?= $users['upa_id']; ?>"><?= $users['nama_ketua']; ?></option>
										<?php foreach ($upa as $u) : ?>
											<option value="<?= $u['upa_id']; ?>"><?= $u['nama_ketua']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-group">
						  		<div class="form-check">
									<input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
									<label class="form-check-label" for="is_active">
										Active?
									</label>
								</div>
						  	</div>
					      </div>
						<a href="<?= base_url('kaderisasi/users'); ?>" class="btn btn-secondary">Cancel</a>
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

