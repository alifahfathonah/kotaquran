
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
		<?= form_open_multipart('user/edit');?>
	        <div class="card-body">
	        	<div class="row">
					<div class="col-lg-6">
						<div class="form-group row">
							<label for="email" class="col-sm-4 col-form-label">No. Handphone</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="nik" class="col-sm-4 col-form-label">NIK</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="nik" name="nik" value="<?= $detail['nik']; ?>">
								<?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="name" class="col-sm-4 col-form-label">Nama Lengkap</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
								<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="nickname" class="col-sm-4 col-form-label">Nama Panggilan</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="nickname" name="nickname" value="<?= $detail['nickname']; ?>">
								<?= form_error('nickname', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="gender" class="col-sm-4 col-form-label">Jenis Kelamin</label>
							<div class="col-sm-8">
								<select name="gender" id="gender" class="form-control select">
									<option value="<?= $user['gender']; ?>"><?= $user['gender'] == 1 ? 'Ikhwan' : 'Akhwat'; ?></option>
									<option value="1">Ikhwan</option>
									<option value="0">Akhwat</option>
								</select>
								<?= form_error('gender', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="tempat_lahir" class="col-sm-4 col-form-label">Tempat & tanggal lahir</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $detail['tempat_lahir']; ?>" placeholder="Tempat lahir" required>
								<?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="col-sm-4">
								<div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tgl_lahir" data-date-format="yyyy-mm-dd" value="<?= date('Y-m-d', $detail['tgl_lahir']); ?>" required />
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                              </div>
							</div>
						</div>
						<div class="form-group row">
							<label for="name" class="col-sm-4 col-form-label">Alamat Lengkap</label>
							<div class="col-sm-8">
								<select class="form-control mb-2" name="provinsi" id="provinsi" required>
									<option value="<?= $prov['id']; ?>"><?= $prov['name']; ?></option>
									<?php foreach ($wilayah as $wil) : ?>
									<option value="<?= $wil['id']; ?>"><?= $wil['name']; ?></option>
									<?php endforeach; ?>
								</select>
								<select class="form-control mb-2" name="kabupaten" id="kabupaten" required>
									<option value="<?= $kab['id']; ?>"><?= $kab['name']; ?></option>
								</select>
								<select class="form-control mb-2" name="kecamatan" id="kecamatan" required>
									<option value="<?= $kec['id']; ?>"><?= $kec['name']; ?></option>
								</select>
								<select class="form-control mb-2" name="desa" id="desa" required>
									<option value="<?= $desa['id']; ?>"><?= $desa['name']; ?></option>
								</select>
								<input type="text" class="form-control" id="alamat" name="alamat" value="<?= $user['alamat']; ?>">
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group row">
							<label for="suku" class="col-sm-4 col-form-label">Suku</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="suku" name="suku" value="<?= $detail['suku']; ?>">
								<?= form_error('suku', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="hobi" class="col-sm-4 col-form-label">Hobi</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="hobi" name="hobi" value="<?= $detail['hobi']; ?>">
								<?= form_error('hobi', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="sifat_menonjol" class="col-sm-4 col-form-label">Sifat yang menonjol</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="sifat_menonjol" name="sifat_menonjol" value="<?= $detail['sifat_menonjol']; ?>">
								<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="visi" class="col-sm-4 col-form-label">Visi hidup</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="visi" name="visi" value="<?= $detail['visi']; ?>">
								<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="kendaraan" class="col-sm-4 col-form-label">Kendaraan yang dimiliki</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="kendaraan" name="kendaraan" value="<?= $detail['kendaraan']; ?>">
								<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="pekerjaan" class="col-sm-4 col-form-label">Pekerjaan</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= $detail['pekerjaan']; ?>">
								<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="tempat_kerja" class="col-sm-4 col-form-label">Lembaga/tempat bekerja</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="tempat_kerja" name="tempat_kerja" value="<?= $detail['tempat_kerja']; ?>">
								<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="alamat_kerja" class="col-sm-4 col-form-label">Alamat tempat kerja</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="alamat_kerja" name="alamat_kerja" value="<?= $detail['alamat_kerja']; ?>">
								<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="penghasilan" class="col-sm-4 col-form-label">Penghasilan per bulan</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="penghasilan" name="penghasilan" value="<?= $detail['penghasilan']; ?>">
								<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-4"><b>Foto</b></div>
							<!-- <label for="image" class="col-sm-4 col-form-label">Foto</label> -->
							<div class="col-sm-8">
								<div class="row">
									<div class="col-sm-3">
										<img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
									</div>
									<div class="col-sm-9">
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="image" name="image">
											<label class="custom-file-label" for="image">Choose file</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
	        </div>
	        <div class="card-footer">
	        	<div class="form-group row">
					<div class="col-sm-9">
						<a class="btn btn-warning" href="<?= base_url('user'); ?>">Kembali</a>&nbsp;
						<button type="submit" class="btn btn-primary">Simpan</button>
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

