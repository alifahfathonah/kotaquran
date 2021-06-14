
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
                <a class="btn btn-info ml-2 mb-3" href="<?= base_url('kaderisasi/tambahupa/'); ?>">Tambah UPA</a>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <form action="<?= base_url('kaderisasi/upa'); ?>" method="post">
                  <div class="form-group col-sm-6 row">
                    <div class="col-sm-5">
                      <select name="level_id" id="level_id" class="form-control select2">
                        <option value="">Pilih Level</option>
                        <?php foreach ($level as $lev) : ?>
                        <option value="<?= $lev['id']; ?>"><?= $lev['kode_level'].' - '.$lev['nama_level']; ?></option>
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
                  <th>Ketua UPA</th>
                  <th>Nama Grup</th>
                  <th>Level</th>
                  <th>SPU</th>
                  <th>Kelompok</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $i= 1;
                  foreach ($upa as $u) : 
                ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $u['nama_ketua']; ?></td>
                  <td><?= $u['nama_upa']; ?></td>
                  <td><?= $u['nama_level']; ?></td>
                  <td><?= $u['nama_spu']; ?></td>
                  <td><?= $u['jenis_kelamin'] == 1 ? 'Ikhwan' : 'Akhwat'; ?></td>
                  <td>
                    <a href="<?= base_url('kaderisasi/editupa/') . $u['upa_id']; ?>" class="badge badge-success">edit</a>
                    <a href="javascript:hapusData(<?= $u['upa_id']; ?>)" class="badge badge-danger">delete</a>
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

