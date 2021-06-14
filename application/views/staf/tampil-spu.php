
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
          <div class="box-header">
            <h4>Data Rekap Mutabaah Anggota</h4>
          </div>
          <div class="box-body">
            <table class="table col-sm-6 table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>SPU</th>
                  <th>Ketua SPU</th>
                  <th>Lihat Detail</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $i = 1;
                  foreach ($spu as $spu) :
                ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $spu['nama_spu']; ?></td>
                  <td><?= $spu['ketua_spu']; ?></td>
                  <td>
                    <a href="<?= base_url('kaderisasi/tampilupa/') . $spu['id']; ?>" class="badge badge-info">details</a>
                  </td>
                </tr>
                <?php
                  $i++;
                  endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->