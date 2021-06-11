
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
        <div class="card-body">
          <div class="box-header">
            <?= $this->session->flashdata('message'); ?>
            <h5><?= $anggota['name']; ?></h5>
            <p class="mb-0"><b>Pembimbing : <?= $anggota['nama_ketua']; ?></b></p>
            <a class="btn btn-info mt-3 mb-3" href="<?= base_url('user/inputmutabaah_rmd'); ?>">Input Data</a>
          </div>
          <div class="box-body">
            <table class="table table-striped table-hover table-responsive">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tanggal Ramadhan</th>
                  <th>Tanggal Input Data</th>
                  <th>Capaian</th>
                  <th>Ketarangan</th>
                  <th>Lihat</th>
                  <th>Hapus</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $i= 1;
                  foreach ($mutabaah as $mtb) : 
                ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td>
                    <?php
                      switch ($mtb['tgl_rmd']) {
                        case '28':
                          echo 'Hari ke 22 - 28';
                          break;
                        case '21':
                          echo 'Hari ke 15 - 21';
                          break;
                        case '14':
                          echo 'Hari ke 8 - 14';
                          break;
                        default:
                          echo 'Hari ke 1 - 7';
                          break;
                      }
                      ?>
                  </td>
                  <td><?= tanggal_indo(date('Y-m-d', $mtb['tanggal'])); ?></td>
                  <td><?=  number_format(($mtb['jumlah']/2328)*100, 2).'%'; ?></td>
                  <td><?= $mtb['haid_nifas'] == 1 ? 'Sedang berhalangan (haid/nifas)' : '-'; ?></td>
                  <td>
                    <a href="<?= base_url('user/detailmutabaah_rmd/') . $mtb['mtb_id']; ?>" class="badge badge-success">detail</a>
                  </td>
                  <td>
                    <a href="javascript:hapusData(<?= $mtb['mtb_id']; ?>)" class="badge badge-danger">hapus</a>
                  </td>
                </tr>
                <?php 
                  $i++;
                  endforeach;
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="card-footer">
          <a class="btn btn-warning" href="<?= base_url('user'); ?>">Kembali</a>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script language="JavaScript" type="text/javascript">
  function hapusData(id){
    if (confirm("Apakah anda yakin akan menghapus data ini?")){
        window.location.href = 'hapusmutabaah_rmd/' + id;
    }
  }
</script>

