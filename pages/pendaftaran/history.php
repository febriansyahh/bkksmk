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
            <h3 class="card-title">Data Riwayat Pendaftaran</h3>
          </div>
          <!-- /.card-header -->
          <?php
        switch ($data_status) {
          case '1':
            ?>
          <div class="card-body">
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
                    <!-- <th>Tgl Daftar</th> -->
                    <th>Piihan</th>
                  </tr>
                </center>
              </thead>
              <tbody>
                <?php
            $a = getPendaftarHistory();
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
                  <td><?php echo $data['status']; ?></td>
                  <!-- <td><?php echo $data['tglDaftar']; ?></td> -->
                  <td>
                    <!-- <a href="javascript:void(0)" data-toggle="modal" data-target="#editLoker"
                      data-id="<?php echo $data['id_alumni'] . "~" . $data['nisn'] . "~" . $data['nm_loker'] . "~" . $data['jekel']. "~" . $data['keterangan']. "~" . $data['sumber']. "~" . $data['tanggal']. "~" . $data['batas']. "~" . $data['status'] ?>"
                      onclick="editableLowongan(this)" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a> -->
                    <a href="#" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
                      class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                <?php
            $no++;
            }
        ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <?php
        break;
      case '2':
        ?>
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <center>
                  <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama </th>
                    <th>Perusahaan</th>
                    <th>Lowongan</th>
                    <th>Status</th>
                    <!-- <th>Tgl Daftar</th> -->
                    <th>Piihan</th>
                  </tr>
                </center>
              </thead>
              <tbody>
                <?php
            $a = getHistoryAnggota($data_id);
            $no = 1;
            foreach ($a as $key => $data) {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['nisn']; ?></td>
                  <td><?php echo $data['nama']; ?></td>
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
                    <!-- <a href="javascript:void(0)" data-toggle="modal" data-target="#editLoker"
                      data-id="<?php echo $data['id_alumni'] . "~" . $data['nisn'] . "~" . $data['nm_loker'] . "~" . $data['jekel']. "~" . $data['keterangan']. "~" . $data['sumber']. "~" . $data['tanggal']. "~" . $data['batas']. "~" . $data['status'] ?>"
                      onclick="editableLowongan(this)" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a> -->
                  </td>
                  <td>
                  <a href="?pages=daftarAksi&kode=<?php echo $data['idDaftar']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
                      class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                <?php
            $no++;
            }
        ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <?php
        break;
      case '3':
        ?>
        <div class="card-body">
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
                    <!-- <th>Tgl Daftar</th> -->
                    <th>Piihan</th>
                  </tr>
                </center>
              </thead>
              <tbody>
                <?php
            $a = getPendaftarHistory();
            $no = 1;
            foreach ($a as $key => $data) {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['nisn']; ?></td>
                  <td><?php echo $data['nama']; ?></td>
                  <td><?php echo $data['jurusan']; ?></td>
                  <td><?php echo $data['nm_perusahaan']; ?></td>
                  <td><?php echo $data['nm_loker']; ?></td>
                  <td><?php echo $data['status']; ?></td>
                  <!-- <td><?php echo $data['tglDaftar']; ?></td> -->
                  <td>
                    <!-- <a href="javascript:void(0)" data-toggle="modal" data-target="#editLoker"
                      data-id="<?php echo $data['id_alumni'] . "~" . $data['nisn'] . "~" . $data['nm_loker'] . "~" . $data['jekel']. "~" . $data['keterangan']. "~" . $data['sumber']. "~" . $data['tanggal']. "~" . $data['batas']. "~" . $data['status'] ?>"
                      onclick="editableLowongan(this)" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a> -->
                    <a href="#" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
                      class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                <?php
            $no++;
            }
        ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <?php
        break;
      case '4':
        ?>
          <div class="card-body">
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
                    <!-- <th>Tgl Daftar</th> -->
                    <th>Piihan</th>
                  </tr>
                </center>
              </thead>
              <tbody>
                <?php
            $a = getPendaftarHistory();
            $no = 1;
            foreach ($a as $key => $data) {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['nisn']; ?></td>
                  <td><?php echo $data['nama']; ?></td>
                  <td><?php echo $data['jurusan']; ?></td>
                  <td><?php echo $data['nm_perusahaan']; ?></td>
                  <td><?php echo $data['nm_loker']; ?></td>
                  <td><?php echo $data['status']; ?></td>
                  <!-- <td><?php echo $data['tglDaftar']; ?></td> -->
                  <td>
                    <!-- <a href="javascript:void(0)" data-toggle="modal" data-target="#editLoker"
                      data-id="<?php echo $data['id_alumni'] . "~" . $data['nisn'] . "~" . $data['nm_loker'] . "~" . $data['jekel']. "~" . $data['keterangan']. "~" . $data['sumber']. "~" . $data['tanggal']. "~" . $data['batas']. "~" . $data['status'] ?>"
                      onclick="editableLowongan(this)" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a> -->
                    <a href="#" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
                      class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                <?php
            $no++;
            }
        ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <?php
          break;
      }
        ?>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>

  </body>
  <script src="js/main.js"></script>

</html>
