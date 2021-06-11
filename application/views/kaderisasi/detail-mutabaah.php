
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
          <div class="box">
            <div class="box-header">
              <h5><?= $anggota['name']; ?></h5>
              <p class="mb-0"><b>Pembimbing : <?= $anggota['nama_ketua']; ?></b></p>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Jenis Kegiatan</th>
                          <th>Target</th>
                          <th>Pelaksanaan / Pekan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Tanggal pelaksanaan UPA</td>
                          <td>Tanggal UPA</td>
                          <td>
                            <?= tanggal_indo(date('Y-m-d', $mutabaah['tgl_upa'])); ?>
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Kehadiran UPA</td>
                          <td>Hadir</td>
                          <td><?= $mutabaah['liqo'] == 0 ? 'Tidak Hadir' : 'Hadir'; ?></td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Shalat berjamaah / tepat waktu bagi akhwat</td>
                          <td>35 kali</td>
                          <td>
                            <?php
                              switch ($mutabaah['berjamaah']) {
                                case '5':
                                  echo "Kurang dari 21 kali";
                                  break;
                                case '6':
                                  echo "21 - 25 kali";
                                  break;
                                case '8':
                                  echo "26 - 30 kali";
                                  break;
                                default:
                                  echo "31 - 35 kali";
                                  break;
                              }
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Tilawah Al Qur'an 1 Juz / hari</td>
                          <td>140 halaman</td>
                          <td>
                            <?php 
                              if ($mutabaah['tilawah'] == 0) {
                                echo "Tidak melaksanakan";
                              } elseif ($mutabaah['tilawah'] == 140) {
                                echo $mutabaah['tilawah'] . " atau lebih";
                              } else {
                                echo $mutabaah['tilawah'] . " halaman";
                              }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>5</td>
                          <td>Dzikir pagi Al Ma'tsuraat</td>
                          <td>7 kali</td>
                          <td><?= $mutabaah['dzikir_pagi'] == 0 ? 'Tidak melaksanakan' : $mutabaah['dzikir_pagi'] . ' kali'; ?></td>
                        </tr>
                        <tr>
                          <td>6</td>
                          <td>Dzikir petang Al Ma'tsuraat</td>
                          <td>7 kali</td>
                          <td><?= $mutabaah['dzikir_petang'] == 0 ? 'Tidak melaksanakan' : $mutabaah['dzikir_petang'] . ' kali'; ?></td>
                        </tr>
                        <tr>
                          <td>7</td>
                          <td>Dzikir Tasbih, Tahmid, Takbir, Tahlil 100x / hari</td>
                          <td>700 kali</td>
                          <td><?= $mutabaah['dzikir_lain'] == 0 ? 'Tidak melaksanakan' : $mutabaah['dzikir_lain'] . ' kali'; ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Jenis Kegiatan</th>
                          <th>Target</th>
                          <th>Pelaksanaan / Pekan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>8</td>
                          <td>Membaca sholawat 100x / hari</td>
                          <td>700 kali</td>
                          <td><?= $mutabaah['shalawat'] == 0 ? 'Tidak melaksanakan' : $mutabaah['shalawat'] . ' kali'; ?></td>
                        </tr>
                        <tr>
                          <td>9</td>
                          <td>Qiyamullail</td>
                          <td>7 kali</td>
                          <td><?= $mutabaah['qiyamullail'] == 0 ? 'Tidak melaksanakan' : $mutabaah['qiyamullail'] . ' kali'; ?></td>
                        </tr>
                        <tr>
                          <td>10</td>
                          <td>Shalat Dhuha</td>
                          <td>7 kali</td>
                          <td><?= $mutabaah['dhuha'] == 0 ? 'Tidak melaksanakan' : $mutabaah['dhuha'] . ' kali'; ?></td>
                        </tr>
                        <tr>
                          <td>11</td>
                          <td>Membantu/melaksanakan pekerjaan rumah</td>
                          <td>7 kali</td>
                          <td><?= $mutabaah['bantu_prt'] == 0 ? 'Tidak melaksanakan' : $mutabaah['bantu_prt'] . ' kali'; ?></td>
                        </tr>
                        <tr>
                          <td>12</td>
                          <td>Infaq/sedekah</td>
                          <td>Ya</td>
                          <td><?= $mutabaah['infaq'] == 0 ? 'Tidak' : 'Ya'; ?></td>
                        </tr>
                        <tr>
                          <td>13</td>
                          <td>Shaum sunnah</td>
                          <td>2 kali</td>
                          <td>
                            <?php 
                              if ($mutabaah['shaum_sunnah'] == 0) {
                                echo "Tidak melaksanakan";
                              } elseif ($mutabaah['shaum_sunnah'] == 2) {
                                echo $mutabaah['shaum_sunnah'] . " kali atau lebih";
                              } else {
                                echo $mutabaah['shaum_sunnah'] . " kali";
                              }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>14</td>
                          <td>Olah raga</td>
                          <td>4 kali</td>
                          <td>
                            <?php 
                              if ($mutabaah['olah_raga'] == 0) {
                                echo "Tidak melaksanakan";
                              } elseif ($mutabaah['olah_raga'] == 4) {
                                echo $mutabaah['olah_raga'] . " kali atau lebih";
                              } else {
                                echo $mutabaah['olah_raga'] . " kali";
                              }
                            ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <?php if ($mutabaah['haid_nifas'] == 1) : ?>
                <i>Pekan ini sedang berhalangan (haid/nifas)</i>
              <?php endif; ?>
            </div>
            <div class="box-footer mt-2">
              <a class="btn btn-warning" href="<?= base_url('kaderisasi/mutabaah/').$anggota['id']; ?>">Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
