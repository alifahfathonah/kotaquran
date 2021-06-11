
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
	  <div class="row">
        <div class="col-lg-6">
          <?= $this->session->flashdata('message'); ?>
        </div>
      </div>
    </section>
	<!-- <h3 class="form-control"><strong></strong></h3> -->
    <!-- Main content -->
    <section class="content">
      <div class="card">
		<?= form_open_multipart('user/edit');?>
	        <div class="card-body">
	        	<div class="row">
					<div class="col-lg-6">
						<div class="form-group row">
							<div class="col-sm-4">
								<img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
							</div>
							<div class="col-sm-8">
								<h3 class="form-control"><strong><?= strtoupper($user['name']); ?></strong></h3>
								<h3 class="form-control"><strong><?= strtoupper($detail['nickname']); ?></strong></h3>
								<h3 class="form-control"><strong><?= strtoupper($detail['tempat_lahir']) . ", " . strtoupper(tanggal_indo(date('Y-m-d', $detail['tgl_lahir']))); ?></strong></h3>
								<h3 class="form-control"><strong><?= $detail['nik']; ?></strong></h3>
								<h3 class="form-control"><strong><?= $user['email']; ?></strong></h3>
							</div>
						</div>
						<div class="form-group row">
							<label for="gender" class="col-sm-4 col-form-label">Jenis Kelamin</label>
							<div class="col-sm-8">
								<h3 class="form-control"><strong><?= $user['gender'] == 1 ? 'IKHWAN' : 'AKHWAT'; ?></strong></h3>
							</div>
						</div>
						<div class="form-group row">
							<label for="suku" class="col-sm-4 col-form-label">Suku</label>
							<div class="col-sm-8">
								<h3 class="form-control"><strong><?= strtoupper($detail['suku']); ?></strong></h3>
							</div>
						</div>
						<div class="form-group row">
							<label for="name" class="col-sm-4 col-form-label">Alamat Lengkap</label>
							<div class="col-sm-8">
								<textarea name="visi" id="visi" class="form-control font-weight-bold" rows="5"><?= strtoupper($user['alamat']).', DESA '.strtoupper($desa['name']).', KECAMATAN '.strtoupper($kec['name']).', '.strtoupper($kab['name']).', PROVINSI '.strtoupper($prov['name']); ?></textarea>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group row">
							<label for="hobi" class="col-sm-4 col-form-label">Hobi</label>
							<div class="col-sm-8">
								<h3 class="form-control"><strong><?= strtoupper($detail['hobi']); ?></strong></h3>
							</div>
						</div>
						<div class="form-group row">
							<label for="sifat_menonjol" class="col-sm-4 col-form-label">Sifat yang menonjol</label>
							<div class="col-sm-8">
								<h3 class="form-control"><strong><?= strtoupper($detail['sifat_menonjol']); ?></strong></h3>
							</div>
						</div>
						<div class="form-group row">
							<label for="visi" class="col-sm-4 col-form-label">Visi hidup</label>
							<div class="col-sm-8">
							<textarea name="visi" id="visi" class="form-control font-weight-bold" rows="3"><?= strtoupper($detail['visi']); ?></textarea>
								<!-- <h3 class="form-control"><strong><?= strtoupper($detail['visi']); ?></strong></h3> -->
							</div>
						</div>
						<div class="form-group row">
							<label for="kendaraan" class="col-sm-4 col-form-label">Kendaraan yang dimiliki</label>
							<div class="col-sm-8">
								<h3 class="form-control"><strong><?= strtoupper($detail['kendaraan']); ?></strong></h3>
							</div>
						</div>
						<div class="form-group row">
							<label for="pekerjaan" class="col-sm-4 col-form-label">Pekerjaan</label>
							<div class="col-sm-8">
								<h3 class="form-control"><strong><?= strtoupper($detail['pekerjaan']); ?></strong></h3>
							</div>
						</div>
						<div class="form-group row">
							<label for="tempat_kerja" class="col-sm-4 col-form-label">Lembaga/tempat bekerja</label>
							<div class="col-sm-8">
								<h3 class="form-control"><strong><?= strtoupper($detail['tempat_kerja']); ?></strong></h3>
							</div>
						</div>
						<div class="form-group row">
							<label for="alamat_kerja" class="col-sm-4 col-form-label">Alamat tempat kerja</label>
							<div class="col-sm-8">
								<h3 class="form-control"><strong><?= strtoupper($detail['alamat_kerja']); ?></strong></h3>
							</div>
						</div>
						<div class="form-group row">
							<label for="penghasilan" class="col-sm-4 col-form-label">Penghasilan per bulan</label>
							<div class="col-sm-8">
								<h3 class="form-control"><strong><?= rupiah($detail['penghasilan']); ?></strong></h3>
							</div>
						</div>
					</div>
				</div>
	        </div>
	        <div class="card-footer">
	        	<div class="form-group row">
					<div class="col-sm-9">
						<small>Last Modified: <?= tanggal_indo(date('Y-m-d',$detail['date_modified'])); ?></small>
					</div>
				</div>
	        </div>
		</form>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script>
    $("#provinsi").change(function(){

        // variabel dari nilai combo box kendaraan
        var id_provinsi = $("#provinsi").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url : "<?php echo base_url();?>/auth/get_kab",
            method : "POST",
            data : {id_provinsi:id_provinsi},
            async : false,
            dataType : 'json',
            success: function(data){
                var html = "<option value=''>--Pilih Kabupaten--</option>";
                var i;

                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].id+'>'+data[i].name+'</option>';
                }
                $('#kabupaten').html(html);

            }
        });
    });

    $("#kabupaten").change(function(){

        // variabel dari nilai combo box kendaraan
        var id_kabupaten = $("#kabupaten").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url : "<?php echo base_url();?>/auth/get_kec",
            method : "POST",
            data : {id_kabupaten:id_kabupaten},
            async : false,
            dataType : 'json',
            success: function(data){
                var html = "<option value=''>--Pilih Kecamatan--</option>";
                var i;

                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].id+'>'+data[i].name+'</option>';
                }
                $('#kecamatan').html(html);

            }
        });
    });
    $("#kecamatan").change(function(){

        // variabel dari nilai combo box kendaraan
        var id_kecamatan = $("#kecamatan").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url : "<?php echo base_url();?>/auth/get_desa",
            method : "POST",
            data : {id_kecamatan:id_kecamatan},
            async : false,
            dataType : 'json',
            success: function(data){
                var html = "<option value=''>--Pilih Desa--</option>";
                var i;

                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].id+'>'+data[i].name+'</option>';
                }
                $('#desa').html(html);

            }
        });
    });
    $("#j_kelamin").change(function(){

        // variabel dari nilai combo box kendaraan
        var jenis_kelamin = $("#j_kelamin").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url : "<?php echo base_url();?>/auth/get_ketua",
            method : "POST",
            data : {jenis_kelamin:jenis_kelamin},
            async : false,
            dataType : 'json',
            success: function(data){
                var html = "<option value=''>--Pilih Murobbi/ah--</option>";
                var i;

                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].upa_id+'>'+data[i].nama_ketua+'</option>';
                }
                $('#nama_ketua').html(html);

            }
        });
    });
</script>

