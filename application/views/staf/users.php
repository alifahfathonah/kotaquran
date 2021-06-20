
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
		    <div class="col-lg">

		  		<?= $this->session->flashdata('message'); ?>

		  		<table id="example1" class="table table-hover">
  				  <thead>
  				    <tr>
  				      <th scope="col">#</th>
  				      <th scope="col">Nama</th>
  				      <th scope="col">Alamat Asal</th>
                <th scope="col">Rumah Qur'an</th>
                <th scope="col">Kelas - Guru</th>
  				      <th scope="col">Status</th>
  				      <th scope="col">Action</th>
  				    </tr>
  				  </thead>
  				  <tbody>
  				  	<?php
  				  		$i = 1;
  				  		foreach ($users as $users) :
  				  	?>
  				    <tr>
  				      <th scope="row"><?= $i; ?></th>
  				      <td><?= $users['name']; ?></td>
  				      <td><?= $users['regency'] . ", " . $users['province']; ?></td>
                <td><?= $users['nama_rq']; ?></td>
                <td><?= $users['program'] . " - " . $users['pengajar']; ?></td>
  				      <td><?= $users['active'] == 1 ? 'Aktif' : 'Tidak aktif'; ?></td>
  				      <td>
                    <a href="<?= base_url('staf/viewuser/') . $users['user_id']; ?>" class="badge badge-info">detail</a>
  				      		<a href="manageuser/<?= $users['user_id']; ?>" class="badge badge-success">edit</a>
  				      		<a href="javascript:hapusData(<?= $users['user_id']; ?>)" class="badge badge-danger">delete</a>
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
		  	window.location.href = 'deleteuser/' + id;
		}
	}
</script>
