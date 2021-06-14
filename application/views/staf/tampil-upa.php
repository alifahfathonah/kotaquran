
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
        <div class="card-header">
          <h4>Pilih UPA</h4>
          <a class="btn btn-info" href="<?= base_url('kaderisasi/tampilspu'); ?>">Back</a>
        </div>
        <div class="card-body">
          <div class="row">
            <?php foreach ($upa as $upa) : ?>
            <div class="col-sm-3">
              <a href="<?= base_url('kaderisasi/tampilanggota/') . $upa['upa_id']; ?>">
                <div class="small-box bg-primary">
                  <div class="inner">
                    <h4><?= $upa['nama_ketua']; ?></h4>
                    <p><?= $upa['nama_level'] ?></p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-bed"></i>
                  </div>
                  <span class="small-box-footer">Lihat Rekap Mutabaah</span>
                </div>
              </a>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
