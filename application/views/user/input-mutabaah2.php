
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
                      <label for="tgl_rmd" class="col-sm-2 col-form-label"><h5><b>Hari ke:</b></h5></label>
                      <div class="col-sm-8">
                        <select name="tgl_rmd" id="tgl_rmd" class="form-control" required>
                          <option value="7">1 - 7 Ramadhan</option>
                          <option value="14">8 - 14 Ramadhan</option>
                          <option value="21">15 - 21 Ramadhan</option>
                          <option value="28">22 - 28 Ramadhan</option>
                        </select>
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
                            <th>Pelaksanaan / Pekan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Tilawah Al Qur'an 2 Juz / hari</td>
                            <td>14 juz</td>
                            <td>
                              <select name="tilawah" id="tilawah" class="form-control" required>
                                <option value="0">Kurang dari 1 juz</option>
                                <?php for ($i = 1; $i <= 13; $i++) : ?>
                                <option value="<?= $i; ?>"><?= $i . ' juz'; ?></option>
                                <?php endfor; ?>
                                <option value="14">14 juz atau lebih</option>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Membaca Surat Yasin</td>
                            <td>7 Kali</td>
                            <td>
                              <select name="yasin" id="yasin" class="form-control" required>
                                <option value="0">Tidak melaksanakan</option>
                                <?php for ($i = 1; $i <= 7; $i++) : ?>
                                <option value="<?= $i; ?>"><?= $i . ' kali'; ?></option>
                                <?php endfor; ?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Membaca Surat Ad Dukhon</td>
                            <td>7 Kali</td>
                            <td>
                              <select name="dukhon" id="dukhon" class="form-control" required>
                                <option value="0">Tidak melaksanakan</option>
                                <?php for ($i = 1; $i <= 7; $i++) : ?>
                                <option value="<?= $i; ?>"><?= $i . ' kali'; ?></option>
                                <?php endfor; ?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>Membaca Surat Al Waqiah</td>
                            <td>7 Kali</td>
                            <td>
                              <select name="waqiah" id="waqiah" class="form-control" required>
                                <option value="0">Tidak melaksanakan</option>
                                <?php for ($i = 1; $i <= 7; $i++) : ?>
                                <option value="<?= $i; ?>"><?= $i . ' kali'; ?></option>
                                <?php endfor; ?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>5</td>
                            <td>Membaca Surat Al Mulk</td>
                            <td>7 Kali</td>
                            <td>
                              <select name="mulk" id="mulk" class="form-control" required>
                                <option value="0">Tidak melaksanakan</option>
                                <?php for ($i = 1; $i <= 7; $i++) : ?>
                                <option value="<?= $i; ?>"><?= $i . ' kali'; ?></option>
                                <?php endfor; ?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>6</td>
                            <td>Membaca Surat Al Kahfi</td>
                            <td>1 Kali</td>
                            <td>
                              <select name="kahfi" id="kahfi" class="form-control" required>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>7</td>
                            <td>Membaca Surat Ali Imron</td>
                            <td>1 Kali</td>
                            <td>
                              <select name="ali_imron" id="ali_imron" class="form-control" required>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>8</td>
                            <td>Dzikir pagi Al Ma'tsuraat</td>
                            <td>7 Kali</td>
                            <td>
                              <select name="dzikir_pagi" id="dzikir_pagi" class="form-control" required>
                                <option value="0">Tidak melaksanakan</option>
                                <?php for ($i = 1; $i <= 7; $i++) : ?>
                                <option value="<?= $i; ?>"><?= $i . ' kali'; ?></option>
                                <?php endfor; ?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>9</td>
                            <td>Dzikir petang Al Ma'tsuraat</td>
                            <td>7 Kali</td>
                            <td>
                              <select name="dzikir_petang" id="dzikir_petang" class="form-control" required>
                                <option value="0">Tidak melaksanakan</option>
                                <?php for ($i = 1; $i <= 7; $i++) : ?>
                                <option value="<?= $i; ?>"><?= $i . ' kali'; ?></option>
                                <?php endfor; ?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>10</td>
                            <td>Menghafal 1-3 ayat / hari</td>
                            <td>21 ayat</td>
                            <td>
                              <select name="hafal_ayat" id="hafal_ayat" class="form-control" required>
                                <option value="0">Tidak melaksanakan</option>
                                <option value="14">1 - 3 ayat</option>
                                <option value="29">4 - 6 ayat</option>
                                <option value="43">7 - 9 ayat</option>
                                <option value="57">10 - 12 ayat</option>
                                <option value="71">13 - 15 ayat</option>
                                <option value="86">16 - 18 ayat</option>
                                <option value="100">19 - 21 ayat</option>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>11</td>
                            <td>Membaca istighfar 100x / hari</td>
                            <td>700 Kali</td>
                            <td>
                              <select name="istighfar" id="istighfar" class="form-control" required>
                                <option value="0">Tidak melaksanakan</option>
                                <?php for ($i = 1; $i <= 7; $i++) : ?>
                                <option value="<?= $i; ?>"><?= $i . '00 kali'; ?></option>
                                <?php endfor; ?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>12</td>
                            <td>Membaca shalawat 100x / hari</td>
                            <td>700 Kali</td>
                            <td>
                              <select name="shalawat" id="shalawat" class="form-control" required>
                                <option value="0">Tidak melaksanakan</option>
                                <?php for ($i = 1; $i <= 7; $i++) : ?>
                                <option value="<?= $i; ?>"><?= $i . '00 kali'; ?></option>
                                <?php endfor; ?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>13</td>
                            <td>Membaca tahlil 100x / hari</td>
                            <td>700 Kali</td>
                            <td>
                              <select name="tahlil" id="tahlil" class="form-control" required>
                                <option value="0">Tidak melaksanakan</option>
                                <?php for ($i = 1; $i <= 7; $i++) : ?>
                                <option value="<?= $i; ?>"><?= $i . '00 kali'; ?></option>
                                <?php endfor; ?>
                              </select>
                            </td>
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
                            <td>14</td>
                            <td>Membaca doa-doa harian</td>
                            <td>7 kali</td>
                            <td>
                              <select name="doa_harian" id="doa_harian" class="form-control" required>
                                <option value="0">Tidak melaksanakan</option>
                                <?php for ($i = 1; $i <= 7; $i++) : ?>
                                <option value="<?= $i; ?>"><?= $i . ' kali'; ?></option>
                                <?php endfor; ?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>15</td>
                            <td>Membaca doa-doa sesuai situasi dan kondisi</td>
                            <td>7 kali</td>
                            <td>
                              <select name="doa_sikon" id="doa_sikon" class="form-control" required>
                                <option value="0">Tidak melaksanakan</option>
                                <?php for ($i = 1; $i <= 7; $i++) : ?>
                                <option value="<?= $i; ?>"><?= $i . ' kali'; ?></option>
                                <?php endfor; ?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>16</td>
                            <td>Membaca doa untuk kebaikan partai, pimpinan, dan anggota</td>
                            <td>7 kali</td>
                            <td>
                              <select name="doa_partai" id="doa_partai" class="form-control" required>
                                <option value="0">Tidak melaksanakan</option>
                                <?php for ($i = 1; $i <= 7; $i++) : ?>
                                <option value="<?= $i; ?>"><?= $i . ' kali'; ?></option>
                                <?php endfor; ?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>17</td>
                            <td>Membaca doa untuk kebaikan bangsa dan negara </td>
                            <td>7 kali</td>
                            <td>
                              <select name="doa_bangsa" id="doa_bangsa" class="form-control" required>
                                <option value="0">Tidak melaksanakan</option>
                                <?php for ($i = 1; $i <= 7; $i++) : ?>
                                <option value="<?= $i; ?>"><?= $i . ' kali'; ?></option>
                                <?php endfor; ?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>18</td>
                            <td>Membaca doa penguat soliditas partai</td>
                            <td>7 kali</td>
                            <td>
                              <select name="doa_soliditas" id="doa_soliditas" class="form-control" required>
                                <option value="0">Tidak melaksanakan</option>
                                <?php for ($i = 1; $i <= 7; $i++) : ?>
                                <option value="<?= $i; ?>"><?= $i . ' kali'; ?></option>
                                <?php endfor; ?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>19</td>
                            <td>Shalat berjamaah / tepat waktu bagi akhwat</td>
                            <td>35 Kali</td>
                            <td>
                              <select name="berjamaah" id="berjamaah" class="form-control" required>
                                <option value="5">Kurang dari 21</option>
                                <option value="6">21 - 25 kali</option>
                                <option value="8">26 - 30 kali</option>
                                <option value="10">31 - 35 kali</option>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>20</td>
                            <td>Tarawih berjamaah</td>
                            <td>7 Kali</td>
                            <td>
                              <select name="tarawih" id="tarawih" class="form-control" required>
                                <option value="0">Tidak melaksanakan</option>
                                <?php for ($i = 1; $i <= 7; $i++) : ?>
                                <option value="<?= $i; ?>"><?= $i . ' kali'; ?></option>
                                <?php endfor; ?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>21</td>
                            <td>Shalat tasbih</td>
                            <td>1 kali</td>
                            <td>
                              <select name="shalat_tasbih" id="shalat_tasbih" class="form-control" required>
                                <option value="1">Terlaksana</option>
                                <option value="0">Tidak </option>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>22</td>
                            <td>Shalat istikhoroh</td>
                            <td>1 kali</td>
                            <td>
                              <select name="shalat_istikhoroh" id="shalat_istikhoroh" class="form-control" required>
                                <option value="1">Terlaksana</option>
                                <option value="0">Tidak </option>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>23</td>
                            <td>Shalat hajat</td>
                            <td>1 kali</td>
                            <td>
                              <select name="shalat_hajat" id="shalat_hajat" class="form-control" required>
                                <option value="1">Terlaksana</option>
                                <option value="0">Tidak </option>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>24</td>
                            <td>Melaksanakan evaluasi diri setiap menjelang tidur</td>
                            <td>7 Kali</td>
                            <td>
                              <select name="evaluasi_diri" id="evaluasi_diri" class="form-control" required>
                                <option value="0">Tidak melaksanakan</option>
                                <?php for ($i = 1; $i <= 7; $i++) : ?>
                                <option value="<?= $i; ?>"><?= $i . ' kali'; ?></option>
                                <?php endfor; ?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>25</td>
                            <td>Melaksanakan i'tikaf</td>
                            <td>7 Kali</td>
                            <td>
                              <select name="itikaf" id="itikaf" class="form-control" required>
                                <option value="0">Tidak melaksanakan</option>
                                <?php for ($i = 1; $i <= 7; $i++) : ?>
                                <option value="<?= $i; ?>"><?= $i . ' kali'; ?></option>
                                <?php endfor; ?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>26</td>
                            <td>Ziarah kubur</td>
                            <td>1 kali</td>
                            <td>
                              <select name="ziarah_qubur" id="ziarah_qubur" class="form-control" required>
                                <option value="1">Terlaksana</option>
                                <option value="0">Tidak </option>
                              </select>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <?php if ($user['gender'] == 0) : ?>
                <div class="form-group clearfix">
                  <div class="icheck-primary d-inline">
                    <input class="icheck-primary d-inline" type="checkbox" value="1" name="haid_nifas" id="checkboxPrimary1">
                    <label class="form-check-label" for="checkboxPrimary1">
                      <strong>Sedang haidh / nifas</strong>
                    </label>
                  </div>
                </div>
                <?php endif; ?>
              </div>
              <div class="box-footer">
                <input type="hidden" name="email" value="<?= $user['email']; ?>">
                <input type="hidden" name="upa_id" value="<?= $user['upa_id']; ?>">
                <button class="btn btn-success" type="submit" name="tamu-add">Submit</button>
                <a class="btn btn-warning" href="<?= base_url('user/mutabaah_rmd'); ?>">Batal</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
