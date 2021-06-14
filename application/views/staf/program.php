
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
            <a class="btn btn-info mb-3" href="<?= base_url('staf/tambahprogram/'); ?>">Tambah Program</a>
          </div>
          <div class="box-body">
            <table class="table table-striped table-hover table-responsive">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kode Program</th>
                  <th>Nama Program</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $i = 1;
                  foreach ($program AS $prog) :
                ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $prog['kode_program']; ?></td>
                  <td><?= $prog['nama_program']; ?></td>
                  <td>
                    <a href="<?= base_url('staf/editprogram/') . $prog['prog_id']; ?>" class="badge badge-success">Update</a>
                    <a href="javascript:hapusData(<?= $prog['prog_id']; ?>)" class="badge badge-danger">delete</a>
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

<script language="JavaScript" type="text/javascript">
  function hapusData(id){
    if (confirm("Apakah anda yakin akan menghapus data ini?")){
        window.location.href = 'hapusprogram/' + id;
    }
  }
</script>
