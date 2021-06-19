
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
            <div class="row">
              <div class="col-sm-12">
                <a class="btn btn-info ml-2 mb-3" href="<?= base_url('staf/tambahupa/'); ?>">Tambah UPA</a>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <form action="<?= base_url('staf/kelas'); ?>" method="post">
                  <div class="form-group col-sm-6 row">
                    <div class="col-sm-5">
                      <select name="prog_id" id="prog_id" class="form-control select2">
                        <option value="">Pilih Program</option>
                        <?php foreach ($program as $prog) : ?>
                        <option value="<?= $prog['prog_id']; ?>"><?= $prog['kode_program'].' - '.$prog['nama_program']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="col-sm-5">
                      <select name="jenis_kelamin" id="jenis_kelamin" class="form-control select2">
                        <option value="1">Ikhwan</option>
                        <option value="0">Akhwat</option>
                      </select>
                    </div>
                    <div class="col-sm-2">
                      <button class="btn btn-info mb-3" type="submit">Lihat</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="box-body">
            <table id="userdata" class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Rumah Qur'an</th>
                  <th>Program</th>
                  <th>Kelompok</th>
                  <th>Pengajar</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $i= 1;
                  foreach ($kelas as $kls) : 
                ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $kls['nama_rq']; ?></td>
                  <td><?= $kls['nama_program']; ?></td>
                  <td><?= $kls['jenis_kelamin'] == 1 ? 'Ikhwan' : 'Akhwat'; ?></td>
                  <td><?= $kls['pengajar']; ?></td>
                  <td>
                    <a href="<?= base_url('staf/editupa/') . $kls['kelas_id']; ?>" class="badge badge-success">edit</a>
                    <a href="javascript:hapusData(<?= $kls['kelas_id']; ?>)" class="badge badge-danger">delete</a>
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#userdata').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script language="JavaScript" type="text/javascript">
  function hapusData(id){
    if (confirm("Apakah anda yakin akan menghapus data ini?")){
        window.location.href = 'hapusupa/' + id;
    }
  }
</script>

