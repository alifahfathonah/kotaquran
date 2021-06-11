
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
            <?= $this->session->flashdata('message'); ?>
            <h5><?= $upa['nama_ketua'] . " (Periode <b>" . $bulan . "</b>)"; ?></h5>
            <b>Lihat periode lain:</b>
          </div>
          <div class="box-body">
              <form method="post" action="<?= base_url('kaderisasi/tampilanggota/') . $upa['upa_id']; ?>">
                <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <div class="input-group">
                          <input type="text" class="form-control float-right" id="reservation" name="range">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="far fa-calendar-alt"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <button class="btn btn-info" type="submit" name="tamu-add">Tampilkan</button>
                    </div>
                </div>
              </form>
            <table class="table col-sm-6 table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Anggota</th>
                  <th>Capaian</th>
                  <th>Lihat Detail</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $i= 1;
                  foreach ($mutabaah as $mtb) : 
                ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $mtb['name']; ?></td>
                  <td><?= number_format(($mtb['jumlah']/(4*1593)*100), 2).'%'; ?></td>
                  <td><a href="<?= base_url('kaderisasi/mutabaah/') . $mtb['id']; ?>" class="badge badge-success">detail</a></td>
                </tr>
                <?php 
                  $i++;
                  endforeach;
                ?>
              </tbody>
            </table>
          </div>
          <div class="box-footer">
            <!-- <form method="post" action="<?= base_url('rekapitulasi/download'); ?>">
              <input type="hidden" name="kamar_id" value="<?= $upa['upa_id']; ?>">
              <input type="hidden" name="awal" value="<?= $awal; ?>">
              <input type="hidden" name="akhir" value="<?= $akhir; ?>">
              <a class="btn btn-warning" href="<?= base_url('kaderisasi/tampilupa/') . $upa['spu_id']; ?>">Back</a>&nbsp;
              <button class="btn btn-info" type="submit" name="tamu-add">Download</button>
            </form> -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

