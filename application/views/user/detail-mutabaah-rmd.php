
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
          <div class="box">
            <form action="<?= base_url('user/inputmutabaah_rmd'); ?>" method="post">
              <div class="box-header col-sm-6">
                <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                  <?= validation_errors(); ?>
                </div>
                <?php endif; ?>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group row">
                      <label for="tgl_rmd" class="col-sm-3 col-form-label"><h5><b>Pekan ke: <?= $mutabaah['tgl_rmd']/7; ?></b></h5></label>
                      <div class="col-sm-8">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <table class="table table-striped table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Jenis Kegiatan</th>
                            <th>Target</th>
                            <th>Pelaksanaan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Tilawah Al Qur'an 2 Juz / hari</td>
                            <td>14 juz</td>
                            <td>
                              <?php 
                                if ($mutabaah['tilawah'] == 0) {
                                  echo "Tidak terlaksana";
                                } elseif ($mutabaah['tilawah'] == 14) {
                                  echo $mutabaah['tilawah'] . " juz atau lebih";
                                } else {
                                  echo $mutabaah['tilawah'] . " juz";
                                }
                               ?>
                            </td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Membaca Surat Yasin</td>
                            <td>7 Kali</td>
                            <td><?= $mutabaah['yasin'] == 0 ? "Tidak terlaksana" : $mutabaah['yasin'] . " Kali" ?></td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Membaca Surat Ad Dukhon</td>
                            <td>7 Kali</td>
                            <td><?= $mutabaah['dukhon'] == 0 ? "Tidak terlaksana" : $mutabaah['dukhon'] . " Kali" ?></td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>Membaca Surat Al Waqiah</td>
                            <td>7 Kali</td>
                            <td><?= $mutabaah['waqiah'] == 0 ? "Tidak terlaksana" : $mutabaah['waqiah'] . " Kali" ?></td>
                          </tr>
                          <tr>
                            <td>5</td>
                            <td>Membaca Surat Al Mulk</td>
                            <td>7 Kali</td>
                            <td><?= $mutabaah['mulk'] == 0 ? "Tidak terlaksana" : $mutabaah['mulk'] . " Kali" ?></td>
                          </tr>
                          <tr>
                            <td>6</td>
                            <td>Membaca Surat Al Kahfi</td>
                            <td>1 Kali</td>
                            <td><?= $mutabaah['kahfi'] == 0 ? 'Tidak' : 'Ya'; ?></td>
                          </tr>
                          <tr>
                            <td>7</td>
                            <td>Membaca Surat Ali Imron</td>
                            <td>1 Kali</td>
                            <td><?= $mutabaah['ali_imron'] == 0 ? 'Tidak' : 'Ya'; ?></td>
                          </tr>
                          <tr>
                            <td>8</td>
                            <td>Dzikir pagi Al Ma'tsuraat</td>
                            <td>7 Kali</td>
                            <td><?= $mutabaah['dzikir_pagi'] == 0 ? "Tidak terlaksana" : $mutabaah['dzikir_pagi'] . " Kali" ?></td>
                          </tr>
                          <tr>
                            <td>9</td>
                            <td>Dzikir petang Al Ma'tsuraat</td>
                            <td>7 Kali</td>
                            <td><?= $mutabaah['dzikir_petang'] == 0 ? "Tidak terlaksana" : $mutabaah['dzikir_petang'] . " Kali" ?></td>
                          </tr>
                          <tr>
                            <td>10</td>
                            <td>Menghafal 1-3 ayat / hari</td>
                            <td>21 ayat</td>
                            <td>
                              <?php
                                switch ($mutabaah['hafal_ayat']) {
                                  case '0':
                                    echo "Tidak terlaksana";
                                    break;
                                  case '14':
                                    echo "1 - 3 ayat";
                                    break;
                                  case '29':
                                    echo "4 - 6 ayat";
                                    break;
                                  case '43':
                                    echo "7 - 9 ayat";
                                    break;
                                  case '57':
                                    echo "10 - 12 ayat";
                                    break;
                                  case '71':
                                    echo "13 - 15 ayat";
                                    break;
                                  case '86':
                                    echo "16 - 18 ayat";
                                    break;
                                  default:
                                    echo "19 - 21 ayat";
                                    break;
                                }
                              ?>
                            </td>
                          </tr>
                          <tr>
                            <td>11</td>
                            <td>Membaca istighfar 100x / hari</td>
                            <td>700 Kali</td>
                            <td><?= $mutabaah['istighfar'] == 0 ? "Tidak terlaksana" : $mutabaah['istighfar'] . " Kali" ?></td>
                          </tr>
                          <tr>
                            <td>12</td>
                            <td>Membaca shalawat 100x / hari</td>
                            <td>700 Kali</td>
                            <td><?= $mutabaah['shalawat'] == 0 ? "Tidak terlaksana" : $mutabaah['shalawat'] . " Kali" ?></td>
                          </tr>
                          <tr>
                            <td>13</td>
                            <td>Membaca tahlil 100x / hari</td>
                            <td>700 Kali</td>
                            <td><?= $mutabaah['tahlil'] == 0 ? "Tidak terlaksana" : $mutabaah['tahlil'] . " Kali" ?></td>
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
                            <th>Pelaksanaan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>14</td>
                            <td>Membaca doa-doa harian</td>
                            <td>7 kali</td>
                            <td><?= $mutabaah['doa_harian'] == 0 ? "Tidak terlaksana" : $mutabaah['doa_harian'] . " Kali" ?></td>
                          </tr>
                          <tr>
                            <td>15</td>
                            <td>Membaca doa-doa sesuai situasi dan kondisi</td>
                            <td>7 kali</td>
                            <td><?= $mutabaah['doa_sikon'] == 0 ? "Tidak terlaksana" : $mutabaah['doa_sikon'] . " Kali" ?></td>
                          </tr>
                          <tr>
                            <td>16</td>
                            <td>Membaca doa untuk kebaikan partai, pimpinan, dan anggota</td>
                            <td>7 kali</td>
                            <td><?= $mutabaah['doa_partai'] == 0 ? "Tidak terlaksana" : $mutabaah['doa_partai'] . " Kali" ?></td>
                          </tr>
                          <tr>
                            <td>17</td>
                            <td>Membaca doa untuk kebaikan bangsa dan negara </td>
                            <td>7 kali</td>
                            <td><?= $mutabaah['doa_bangsa'] == 0 ? "Tidak terlaksana" : $mutabaah['doa_bangsa'] . " Kali" ?></td>
                          </tr>
                          <tr>
                            <td>18</td>
                            <td>Membaca doa penguat soliditas partai</td>
                            <td>7 kali</td>
                            <td><?= $mutabaah['doa_soliditas'] == 0 ? "Tidak terlaksana" : $mutabaah['doa_soliditas'] . " Kali" ?></td>
                          </tr>
                          <tr>
                            <td>19</td>
                            <td>Shalat berjamaah / tepat waktu bagi akhwat</td>
                            <td>35 Kali</td>
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
                            <td>20</td>
                            <td>Tarawih berjamaah</td>
                            <td>7 Kali</td>
                            <td><?= $mutabaah['tarawih'] == 0 ? "Tidak terlaksana" : $mutabaah['tarawih'] . " Kali" ?></td>
                          </tr>
                          <tr>
                            <td>21</td>
                            <td>Shalat tasbih</td>
                            <td>1 kali</td>
                            <td><?= $mutabaah['shalat_tasbih'] == 0 ? 'Tidak' : 'Ya'; ?></td>
                          </tr>
                          <tr>
                            <td>22</td>
                            <td>Shalat istikhoroh</td>
                            <td>1 kali</td>
                            <td><?= $mutabaah['shalat_istikhoroh'] == 0 ? 'Tidak' : 'Ya'; ?></td>
                          </tr>
                          <tr>
                            <td>23</td>
                            <td>Shalat hajat</td>
                            <td>1 kali</td>
                            <td><?= $mutabaah['shalat_hajat'] == 0 ? 'Tidak' : 'Ya'; ?></td>
                          </tr>
                          <tr>
                            <td>24</td>
                            <td>terlaksana evaluasi diri setiap menjelang tidur</td>
                            <td>7 Kali</td>
                            <td><?= $mutabaah['evaluasi_diri'] == 0 ? "Tidak terlaksana" : $mutabaah['evaluasi_diri'] . " Kali" ?></td>
                          </tr>
                          <tr>
                            <td>25</td>
                            <td>terlaksana i'tikaf</td>
                            <td>7 Kali</td>
                            <td><?= $mutabaah['itikaf'] == 0 ? "Tidak terlaksana" : $mutabaah['itikaf'] . " Kali" ?></td>
                          </tr>
                          <tr>
                            <td>26</td>
                            <td>Ziarah kubur</td>
                            <td>1 kali</td>
                            <td><?= $mutabaah['ziarah_qubur'] == 0 ? 'Tidak' : 'Ya'; ?></td>
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
              <div class="box-footer">
                <a class="btn btn-warning" href="<?= base_url('user/mutabaah_rmd'); ?>">Kembali</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
