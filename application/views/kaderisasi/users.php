
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
				      <th scope="col">Level</th>
				      <th scope="col">Grup</th>
				      <th scope="col">Pembimbing UPA</th>
              <th scope="col">SPU</th>
				      <th scope="col">Edit UPA</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php
				  		$i = 1;
				  		foreach ($users as $user) :
				  	?>
				    <tr>
				      <th scope="row"><?= $i; ?></th>
				      <td><?= strtoupper($user['name']); ?></td>
				      <td><?= $user['nama_level']; ?></td>
				      <td><?= $user['nama_upa']; ?></td>
				      <td><?= $user['nama_ketua']; ?></td>
				      <td><?= $user['nama_spu'];?></td>
				      <td>
				      		<a href="manageuser/<?= $user['user_id']; ?>" class="badge badge-success">edit</a>
				      		<!-- <a href="javascript:hapusData(<?= $user['user_id']; ?>)" class="badge badge-danger">delete</a> -->
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



