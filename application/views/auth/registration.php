

<div class="register-box">
  <div class="register-logo">
    <b>Kota Qur'an</b> Kuningan
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Silakan isi form berikut untuk registrasi</p>

      <form action="<?= base_url('auth/registration'); ?>" method="post">
        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="name" name="name" placeholder="Nama lengkap" value="<?= set_value('name'); ?>" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <select class="form-control" name="j_kelamin" required>
            <option value="">--Jenis Kelamin--</option>
            <option value="1">Laki-laki</option>
            <option value="0">Perempuan</option>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="email" name="email" placeholder="No handphone (WA)" value="<?= set_value('email'); ?>" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <select class="form-control" name="provinsi" id="provinsi" required>
            <option value="">--Pilih Provinsi--</option>
            <?php foreach ($wilayah as $wil) : ?>
              <option value="<?= $wil['id']; ?>"><?= $wil['name']; ?></option>
            <?php endforeach; ?>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <select class="form-control" name="kabupaten" id="kabupaten" required></select>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <select class="form-control" name="kecamatan" id="kecamatan" required></select>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <select class="form-control" name="desa" id="desa" required></select>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Dusun/Komplek, RT dan RW" value="<?= set_value('alamat'); ?>" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password1" name="password1" placeholder="Masukkan kata sandi baru">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password2" name="password2" placeholder="Ulangi kata sandi">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <br />
      <p class="text-center">
        <a href="<?= base_url('auth'); ?>" class="text-center">Saya sudah mempunyai akun</a>
      </p>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>

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
    
</script>
