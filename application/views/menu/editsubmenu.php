
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
					Form Edit Submenu
					</div>
					<div class="card-body">
						
						<form action="<?= base_url('menu/editsubmenu'); ?>/<?= $subMenu['id']; ?>" method="post">
					      <div class="modal-body">
					        <div class="form-group row">
								<label for="email" class="col-sm-2 col-form-label">Title</label>
								<div class="col-sm-10">
							    	<input type="text" class="form-control" id="title" name="title" placeholder="" value="<?= $subMenu['title']; ?>">
							    </div>
						  	</div>
						  	<div class="form-group row">
								<label for="email" class="col-sm-2 col-form-label">Menu</label>
								<div class="col-sm-10">
									<select name="menu_id" id="menu_id" class="form-control">
										<option value="<?= $subMenu['menu_id']; ?>"><?= $subMenu['menu']; ?></option>
										<?php foreach ($menu as $m) : ?>
											<option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						  	<div class="form-group row">
								<label for="email" class="col-sm-2 col-form-label">Url</label>
								<div class="col-sm-10">
							    	<input type="text" class="form-control" id="url" name="url" placeholder="" value="<?= $subMenu['url']; ?>">
							    </div>
						  	</div>
						  	<div class="form-group row">
								<label for="email" class="col-sm-2 col-form-label">Icon</label>
								<div class="col-sm-10">
							    	<input type="text" class="form-control" id="icon" name="icon" placeholder="" value="<?= $subMenu['icon']; ?>">
							    </div>
						  	</div>
						  	<div class="form-group row">
								<label for="email" class="col-sm-2 col-form-label">Sequence</label>
								<div class="col-sm-10">
							    	<input type="text" class="form-control" id="submenu_sequence" name="submenu_sequence" placeholder="" value="<?= $subMenu['submenu_sequence']; ?>">
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
						<a href="<?= base_url('menu/submenu'); ?>" class="btn btn-secondary">Cancel</a>
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

