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
            <a data-toggle="modal" data-target="#myRiwayat" class="btn btn-primary d-inline"><i
                class="fas fa-search"></i> Cari Pendaftar</a>
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
                $id = $_POST['nama'];
                if($id != ""){
                  $a = getRiwayatViewFilter($id);
                }else{
                $a = getRiwayatView();
                }
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

  <div id="myRiwayat" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h6 class="modal-title">Cari Pendaftar</h6>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <label>Nama Pendaftar </label><br>
            <select name="nama" class="selek2" style="width: 100%">
            <option value="" selected="selected">-Pilih-</option>
              <?php
              $dt = getNamaAnggota();
              foreach ($dt as $value) {
                echo '<option value="'.$value['idAnggota'].'">'.$value['nama'].'</option>';
              }
              ?>
            </select>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <input class="btn btn-success" type="submit" name="btnSimpan" value="Cari" />
          </div>
        </form>
      </div>
    </div>
  </div>
</div>