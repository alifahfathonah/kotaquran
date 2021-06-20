
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
        	<div class="col-lg-7">
          		<?php if (validation_errors()) : ?>
          			<div class="alert alert-danger" role="alert">
          				<?= validation_errors(); ?>
          			</div>
          		<?php endif; ?>
          		<div class="card">
					<div class="card-header">
					Kelola Kelas
					</div>
					<div class="card-body">
						
						<form action="<?= base_url('staf/tambahkelas/'); ?>" method="post">
					      <div class="modal-body">
						  	<div class="form-group row">
								<label for="rq_id" class="col-sm-4 col-form-label">Nama RQ</label>
								<div class="col-sm-8">
									<select name="rq_id" id="rq_id" class="form-control select2">
										<?php foreach ($rq AS $rq) : ?>
											<option value="<?= $rq['id']; ?>"><?= $rq['nama_rq']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="prog_id" class="col-sm-4 col-form-label">Program Belajar</label>
								<div class="col-sm-8">
									<select name="prog_id" id="prog_id" class="form-control select2">
										<?php foreach ($program AS $prog) : ?>
											<option value="<?= $prog['prog_id']; ?>"><?= $prog['nama_program']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="jenis_kelamin" class="col-sm-4 col-form-label">Kelompok (Ikhwan/Akhwat)</label>
								<div class="col-sm-8">
									<select name="jenis_kelamin" id="jenis_kelamin" class="form-control select2">
										<option value="1">Ikhwan</option>
										<option value="0">Akhwat</option>
									</select>
								</div>
							</div>
						  	<div class="form-group row">
								<label for="pengajar" class="col-sm-4 col-form-label">Pengajar</label>
								<div class="col-sm-8">
							    	<input type="text" class="form-control" id="pengajar" name="pengajar" placeholder="Misal: Ahmad" required>
							    </div>
						  	</div>
					      </div>
						<a href="<?= base_url('staf/kelas'); ?>" class="btn btn-secondary">Cancel</a>
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

