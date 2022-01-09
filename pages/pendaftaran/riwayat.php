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
            <h3 class="card-title">Riwayat Pendaftaran</h3>
          </div>
          <!-- /.card-header -->
          <?php
          if($data_status == '4'){
          ?>
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <center>
                  <tr>
                    <th>No</th>
                    <th>ID Daftar</th>
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
                $a = getRiwayatViewPerusahaan($data_idUser);
                $no = 1;
                foreach ($a as $key => $data) {
                ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['idDaftar']; ?></td>
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
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <center>
                  <tr>
                    <th>No</th>
                    <th>ID Daftar</th>
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
                    <td><?php echo $data['idDaftar']; ?></td>
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