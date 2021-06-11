
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
            <form action="<?= base_url('user/inputmutabaah'); ?>" method="post">
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
                              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tgl_upa" data-date-format="yyyy-mm-dd" required />
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Kehadiran UPA</td>
                            <td>Hadir</td>
                            <td>
                              <select name="liqo" id="liqo" class="form-control" required>
                                <option value="1">Hadir</option>
                                <option value="0">Tidak Hadir</option>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>3</td>
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
                            <td>4</td>
                            <td>Tilawah Al Qur'an 1 Juz / hari</td>
                            <td>140 halaman</td>
                            <td>
                              <select name="tilawah" id="tilawah" class="form-control" required>
                                <option value="0">Kurang dari 10 halaman</option>
                                <?php for ($i = 1; $i <= 13; $i++) : ?>
                                <option value="<?= $i; ?>"><?= $i . '0 halaman'; ?></option>
                                <?php endfor; ?>
                                <option value="14">140 halaman atau lebih</option>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>5</td>
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
                            <td>6</td>
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
                            <td>7</td>
                            <td>Dzikir Tasbih, Tahmid, Takbir, Tahlil 100x / hari</td>
                            <td>700 Kali</td>
                            <td>
                              <select name="dzikir_lain" id="dzikir_lain" class="form-control" required>
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
                            <td>8</td>
                            <td>Membaca sholawat 100x / hari</td>
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
                            <td>9</td>
                            <td>Qiyamullail</td>
                            <td>7 Kali</td>
                            <td>
                              <select name="qiyamullail" id="qiyamullail" class="form-control" required>
                                <option value="0">Tidak melaksanakan</option>
                                <?php for ($i = 1; $i <= 7; $i++) : ?>
                                <option value="<?= $i; ?>"><?= $i . ' kali'; ?></option>
                                <?php endfor; ?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>10</td>
                            <td>Shalat Dhuha</td>
                            <td>7 Kali</td>
                            <td>
                              <select name="dhuha" id="dhuha" class="form-control" required>
                                <option value="0">Tidak melaksanakan</option>
                                <?php for ($i = 1; $i <= 7; $i++) : ?>
                                <option value="<?= $i; ?>"><?= $i . ' kali'; ?></option>
                                <?php endfor; ?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>11</td>
                            <td>Membantu/melaksanakan pekerjaan rumah</td>
                            <td>7 Kali</td>
                            <td>
                              <select name="bantu_prt" id="bantu_prt" class="form-control" required>
                                <option value="0">Tidak melaksanakan</option>
                                <?php for ($i = 1; $i <= 7; $i++) : ?>
                                <option value="<?= $i; ?>"><?= $i . ' kali'; ?></option>
                                <?php endfor; ?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>12</td>
                            <td>Infaq/sedekah</td>
                            <td>Ya</td>
                            <td>
                              <select name="infaq" id="infaq" class="form-control" required>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>13</td>
                            <td>Shaum sunnah</td>
                            <td>2 Kali</td>
                            <td>
                              <select name="shaum_sunnah" id="shaum_sunnah" class="form-control" required>
                                <option value="0">Tidak melaksanakan</option>
                                <option value="1">1 kali</option>
                                <option value="2">2 kali atau lebih</option>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>14</td>
                            <td>Olah raga</td>
                            <td>4 Kali</td>
                            <td>
                              <select name="olah_raga" id="olah_raga" class="form-control" required>
                                <option value="0">Tidak melaksanakan</option>
                                <?php for ($i = 1; $i <= 3; $i++) : ?>
                                <option value="<?= $i; ?>"><?= $i . ' kali'; ?></option>
                                <?php endfor; ?>
                                <option value="4">4 kali atau lebih</option>
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
                <a class="btn btn-warning" href="<?= base_url('user/mutabaah'); ?>">Batal</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
