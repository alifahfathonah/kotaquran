<div class="login-box">
  <div class="login-logo">
    <b>Kota Qur'an</b> Kuningan
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Silakan Login ke Aplikasi</p>
      <?= $this->session->flashdata('message'); ?>
      <form action="<?= base_url('auth'); ?>" method="post">
        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="email" name="email"  placeholder="Masukkan nomor Handphone.." value="<?= set_value('email'); ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fas fa-phone"></i>
            </div>
          </div>
        </div>
        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <div class="col-8">
          </div>
          <!-- /.col -->
          <!-- /.col -->
        </div>
      </form>

      <!-- <p class="text-center">
        <a href="forgot-password.html">Forgot Password?</a>
      </p>-->
      <br />
      <p class="text-center">
        <a href="<?= base_url('auth/registration'); ?>" class="text-center">Registrasi</a>
      </p>
      <p class="text-center">
        <a href="https://wa.me/62895359594703?text=Saya lupa password. Tolong dipulihkan akun atas nama ">Klik jika lupa kata sandi</a>
      </p>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->