
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
        <div class="col-lg-8">
          <?= $this->session->flashdata('message'); ?>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-body">
          <!-- Default box -->
          <div class="col-lg-8">
            <h4>DATA PERSONAL</h4>
            <div class="form-group row">
              <div class="col-sm-2"><img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail"></div>
              <div class="col-sm-10">
                <div class="row mb-3">
                  <h5 class="card-title col-sm-4"><b>Nama Lengkap</b></h5>
                  <div class="col-sm-8">
                    <h5 class="card-title"><?= $user['name']; ?></h5>
                  </div>
                </div>
                <div class="row mb-3">
                  <h5 class="card-title col-sm-4"><b>Nama Panggilan</b></h5>
                  <div class="col-sm-8">
                    <h5 class="card-title"><?= $detail['nickname']; ?></h5>
                  </div>
                </div>
                <div class="row mb-3">
                  <h5 class="card-title col-sm-4"><b>Nomor Induk Kependudukan (NIK)</b></h5>
                  <div class="col-sm-8">
                    <h5 class="card-title">
                      <?php if ($detail['nik'] == NULL) : ?>
                        <h5 class="card-title">Belum diisi</h5>
                      <?php else : ?>
                        <h5 class="card-title"><?= $detail['nik']; ?></h5>
                      <?php endif; ?>
                    </h5>
                  </div>
                </div>
                <div class="row mb-3">
                  <h5 class="card-title col-sm-4"><b>Jenis Kelamin</b></h5>
                  <div class="col-sm-8">
                    <h5 class="card-title"><?= $user['gender'] == 1 ? 'Laki-laki' : 'Perempuan'; ?></h5>
                  </div>
                </div>
                <div class="row mb-3">
                  <h5 class="card-title col-sm-4"><b>Tempat & tanggal lahir</b></h5>
                  <div class="col-sm-8">
                    <?php if ($detail['tempat_lahir'] == NULL) : ?>
                      <h5 class="card-title">Belum diisi</h5>
                    <?php else : ?>
                      <h5 class="card-title"><?= $detail['tempat_lahir'] . ', ' . tanggal_indo(date('Y-m-d', $detail['tgl_lahir'])); ?></h5>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <h5 class="card-title col-sm-4"><b>No. Handphone (WA)</b></h5>
              <div class="col-sm-8">
                <h5 class="card-title"><?= $user['email']; ?></h5>
              </div>
            </div>
            <div class="row mb-2">
              <h5 class="card-title col-sm-4"><b>Alamat Lengkap</b></h5>
              <div class="col-sm-8">
                <h5 class="card-title"><?= $user['alamat'].', Desa '.$desa['name'].', Kec. '.$kec['name'].', '.$kab['name'].', '.$prov['name']; ?></h5>
              </div>
            </div>
            <div class="row mb-2">
              <h5 class="card-title col-sm-4"><b>Suku</b></h5>
              <div class="col-sm-8">
                <?php if ($detail['suku'] == NULL) : ?>
                  <h5 class="card-title">Belum diisi</h5>
                <?php else : ?>
                  <h5 class="card-title"><?= $detail['suku']; ?></h5>
                <?php endif; ?>
              </div>
            </div>
            <div class="row mb-2">
              <h5 class="card-title col-sm-4"><b>Hobi</b></h5>
              <div class="col-sm-8">
                <?php if ($detail['hobi'] == NULL) : ?>
                  <h5 class="card-title">Belum diisi</h5>
                <?php else : ?>
                  <h5 class="card-title"><?= $detail['hobi']; ?></h5>
                <?php endif; ?>
              </div>
            </div>
            <div class="row mb-2">
              <h5 class="card-title col-sm-4"><b>Sifat diri yang menonjol</b></h5>
              <div class="col-sm-8">
                <?php if ($detail['sifat_menonjol'] == NULL) : ?>
                  <h5 class="card-title">Belum diisi</h5>
                <?php else : ?>
                  <h5 class="card-title"><?= $detail['sifat_menonjol']; ?></h5>
                <?php endif; ?>
              </div>
            </div>
            <div class="row mb-2">
              <h5 class="card-title col-sm-4"><b>Visi hidup</b></h5>
              <div class="col-sm-8">
                <?php if ($detail['visi'] == NULL) : ?>
                  <h5 class="card-title">Belum diisi</h5>
                <?php else : ?>
                  <h5 class="card-title"><?= $detail['visi']; ?></h5>
                <?php endif; ?>
              </div>
            </div>
            <div class="row mb-2">
              <h5 class="card-title col-sm-4"><b>Kendaraan yang dimiliki</b></h5>
              <div class="col-sm-8">
                <?php if ($detail['kendaraan'] == NULL) : ?>
                  <h5 class="card-title">Belum diisi</h5>
                <?php else : ?>
                  <h5 class="card-title"><?= $detail['kendaraan']; ?></h5>
                <?php endif; ?>
              </div>
            </div>
            <div class="row mb-2">
              <h5 class="card-title col-sm-4"><b>Pekerjaan</b></h5>
              <div class="col-sm-8">
                <?php if ($detail['pekerjaan'] == NULL) : ?>
                  <h5 class="card-title">Belum diisi</h5>
                <?php else : ?>
                  <h5 class="card-title"><?= $detail['pekerjaan']; ?></h5>
                <?php endif; ?>
              </div>
            </div>
            <div class="row mb-2">
              <h5 class="card-title col-sm-4"><b>Lembaga/tempat bekerja</b></h5>
              <div class="col-sm-8">
                <?php if ($detail['tempat_kerja'] == NULL) : ?>
                  <h5 class="card-title">Belum diisi</h5>
                <?php else : ?>
                  <h5 class="card-title"><?= $detail['tempat_kerja']; ?></h5>
                <?php endif; ?>
              </div>
            </div>
            <div class="row mb-2">
              <h5 class="card-title col-sm-4"><b>Alamat kantor/tempat bekerja</b></h5>
              <div class="col-sm-8">
                <?php if ($detail['alamat_kerja'] == NULL) : ?>
                  <h5 class="card-title">Belum diisi</h5>
                <?php else : ?>
                  <h5 class="card-title"><?= $detail['alamat_kerja']; ?></h5>
                <?php endif; ?>
              </div>
            </div>
            <div class="row mb-2">
              <h5 class="card-title col-sm-4"><b>Penghasilan per bulan</b></h5>
              <div class="col-sm-8">
                <?php if ($detail['penghasilan'] == NULL) : ?>
                  <h5 class="card-title">Belum diisi</h5>
                <?php else : ?>
                  <h5 class="card-title"><?= rupiah($detail['penghasilan']); ?></h5>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <small class="text-muted">Terakhir diperbaharui : <?= date('d F Y H:i', $user['date_modified']) . ' WIB'; ?></small>
          <!-- /.card -->
        </div>
        <div class="card-footer">
          <a class="btn btn-warning" href="<?= base_url('user'); ?>">Kembali</a>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



