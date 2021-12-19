<?php
include_once("koneksi.php");
?>
<div class="form-group">
  <br>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Laporan Riwayat Pendaftaran</h3>
          </div>
          <!-- /.card-header -->
          <?php
          if($data_status == '4'){
          ?>
          <div class="card-body">
            <form method='POST' action='./pages/laporan/riwayatPerusahaan.php'>
              <div class="input-group mb-3">
                <label for=""> Pilih Tahun : </label> &nbsp;
                <select name="loker" class="form-select" id="inputGroupSelect02" style="width:25%;">
                  <option value="NULL">- Pilih -</option>
                  <?php
                  $dt = getRiwayatPerusahaan($data_idUser);
                  foreach ($dt as $value) {
                    echo '<option value="' . $value['idLowongan'] . '">' . $value['perusahaan'] . ' - ' . $value['nmLoker'] . '</option>';
                  }
                  ?>
                </select>
                <input type="hidden" name="idPerusahaan" class="form-class" value="<?php echo $data_idUser ?>">
                <input type="submit" name="submit" formtarget="_blank" class="btn btn-primary" value="Cetak" />
              </div>
            </form>
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <center>
                  <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Perusahaan</th>
                    <th>Lowongan</th>
                    <th>Status</th>
                  </tr>
                </center>
              </thead>
              <tbody>
                <?php
                $a = getRiwayatView();
                $no = 1;
                foreach ($a as $key => $data) {
                ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['nisn']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['nmJurusan']; ?></td>
                    <td><?php echo $data['perusahaan']; ?></td>
                    <td><?php echo $data['nmLoker']; ?></td>
                    <td>
                      <?php
                      switch ($data['status']) {
                        case '1':
                      ?>
                          <a href="#" class="btn btn-warning btn-sm">Proses</a>
                        <?php
                          break;
                        case '2':
                        ?>
                          <a href="#" class="btn btn-danger btn-sm">Gagal Administrasi</a>
                        <?php
                          break;
                        case '3':
                        ?>
                          <a href="#" class="btn btn-primary btn-sm">Lolos Administrasi</a>
                        <?php
                          break;
                        case '4':
                        ?>
                          <a href="#" class="btn btn-success btn-sm">Lulus</a>
                        <?php
                          break;
                        case '5':
                        ?>
                          <a href="#" class="btn btn-danger btn-sm">Tidak Lulus</a>
                      <?php
                          break;
                      }
                      ?>
                    </td>
                  </tr>
                <?php
                  $no++;
                }
                ?>

              </tbody>
            </table>
          </div>
          <?php
          }else{
            ?>
            <div class="card-body">
            <form method='POST' action='./pages/laporan/riwayat.php'>
              <div class="input-group mb-3">
                <label for=""> Pilih Tahun : </label> &nbsp;
                <select name="loker" class="form-select" id="inputGroupSelect02" style="width:25%;">
                  <option value="NULL">- Pilih -</option>
                  <?php
                  $dt = getSelectRiwayat();
                  foreach ($dt as $value) {
                    echo '<option value="' . $value['idLowongan'] . '">' . $value['perusahaan'] . ' - ' . $value['nmLoker'] . '</option>';
                  }
                  ?>
                </select>
                <input type="submit" name="submit" formtarget="_blank" class="btn btn-primary" value="Cetak" />
              </div>
            </form>
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <center>
                  <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama </th>
                    <th>Jurusan</th>
                    <th>Perusahaan</th>
                    <th>Lowongan</th>
                    <th>Status</th>
                  </tr>
                </center>
              </thead>
              <tbody>
                <?php
                $a = getRiwayatView();
                $no = 1;
                foreach ($a as $key => $data) {
                ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['nisn']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['nmJurusan']; ?></td>
                    <td><?php echo $data['perusahaan']; ?></td>
                    <td><?php echo $data['nmLoker']; ?></td>
                    <td>
                      <?php
                      switch ($data['status']) {
                        case '1':
                      ?>
                          <a href="#" class="btn btn-warning btn-sm">Proses</a>
                        <?php
                          break;
                        case '2':
                        ?>
                          <a href="#" class="btn btn-danger btn-sm">Gagal Administrasi</a>
                        <?php
                          break;
                        case '3':
                        ?>
                          <a href="#" class="btn btn-primary btn-sm">Lolos Administrasi</a>
                        <?php
                          break;
                        case '4':
                        ?>
                          <a href="#" class="btn btn-success btn-sm">Lulus</a>
                        <?php
                          break;
                        case '5':
                        ?>
                          <a href="#" class="btn btn-danger btn-sm">Tidak Lulus</a>
                      <?php
                          break;
                      }
                      ?>
                    </td>
                  </tr>
                <?php
                  $no++;
                }
                ?>

              </tbody>
            </table>
          </div>
          <?php
          }
          ?>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>

  </body>

  </html>