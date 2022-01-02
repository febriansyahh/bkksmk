<?php	
include_once("koneksi.php");
    ?>
<div class="form-group">
  <br>
  <div class="container-fluid">
  <?php
    switch ($data_status) {
      case '1':
        ?>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Pendaftar Lowongan Kerja</h3>
          </div>
          <!-- /.card-header -->
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
                    <!-- <th>Unduh Berkas</th> -->
                    <th>Piihan</th>
                  </tr>
                </center>
              </thead>
              <tbody>
                <?php
            $a = getPendaftar();
            // $a = getPendaftarHistory();
            $no = 1;
            foreach ($a as $key => $data) {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['nisn']; ?></td>
                  <td><?php echo $data['nama']; ?></td>
                  <td><?php echo $data['nmJurusan']; ?></td>
                  <td><?php echo $data['perusahaan']; ?></td>
                  <td><?php echo $data['nmLoker'] ; ?></td>
                  <!-- <td>
                  <a href=<?php echo "file_data/pendaftaran/".$data['berkas']?> class='btn btn-success btn-sm' data-toggle="tooltip" data-placement="top" title="Gagal Seleksi Administrasi !" >Preview</a>
                  </td> -->
                  <td>
                      <?php
                    if($data['status'] == '1' || $data['status'] == '2'){
                      ?>
                      <a href="?pages=valAksi&kodeGagal=<?php echo $data['idDaftar']; ?>" onclick="return confirm('Yakin untuk konfirmasi data ini ?')"
                      class='btn btn-success btn-sm' data-toggle="tooltip" data-placement="top" title="Gagal Seleksi Administrasi !"><i class="fa fa-times-circle"></i></a>
                      <a href="?pages=valAksi&kodes=<?php echo $data['idDaftar']; ?>" onclick="return confirm('Yakin untuk konfirmasi data ini ?')"
                      class='btn btn-success btn-sm' data-toggle="tooltip" data-placement="top" title="Lulus Seleksi Administrasi !"><i class="fa fa-check"></i></a>
                      <a href=<?php echo"./file_data/pendaftaran/".$data['berkas']?> target="_blank"><i class="fa fa-download"></i></a>
                    <?php
                    }elseif($data['status'] == '3'){
                      ?>
                      <a href="?pages=valAksi&kodeGagalUjian=<?php echo $data['idDaftar']; ?>" onclick="return confirm('Yakin untuk konfirmasi data ini ?')"
                      class='btn btn-warning btn-sm' data-toggle="tooltip" data-placement="top" title="Gagal Seleksi Ujian !"><i class="fa fa-times"></i></a>
                      <a href="?pages=valAksi&kodeLulus=<?php echo $data['idDaftar']; ?>" onclick="return confirm('Yakin untuk konfirmasi data ini ?')"
                      class='btn btn-success btn-sm'data-toggle="tooltip" data-placement="top" title="Lulus Seleksi Ujian !"><i class="fa fa-check"></i></a>
                      <?php
                    }
                    ?>
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
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <?php
        break;
    case '2':
      ?>
      <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
          <a data-toggle="modal" data-target="#pendaftaran" class="btn btn-primary d-inline" style="float : right;"><i
                  class="fas fa-plus-square"></i> Ajukann Pendaftaran</a>
            <h3 class="card-title">Data Pendaftar Lowongan Kerja</h3>
          </div>
          <!-- /.card-header -->
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
                    <!-- <th>Tgl Daftar</th> -->
                    <th>Piihan</th>
                  </tr>
                </center>
              </thead>
              <tbody>
                <?php
            $a = getPendaftar();
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
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
      <?php
      break;
    case '3':
      ?>
      <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Pendaftar Lowongan Kerja</h3>
          </div>
          <!-- /.card-header -->
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
                    <!-- <th>Tgl Daftar</th> -->
                    <th>Piihan</th>
                  </tr>
                </center>
              </thead>
              <tbody>
                <?php
            $a = getPendaftar();
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
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
      <?php
      break;
    case '4':
      ?>
      <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Pendaftar Lowongan Kerja</h3>
          </div>
          <!-- /.card-header -->
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
                    <!-- <th>Tgl Daftar</th> -->
                    <th>Piihan</th>
                  </tr>
                </center>
              </thead>
              <tbody>
                <?php
            $a = getPendaftarPer($data_idUser);
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
                  <!-- <td><?php echo $data['tglDaftar']; ?></td> -->
                  <td>
                    <?php
                    if($data['status'] != '1'){
                    ?>
                      <a href=<?php echo"./file_data/pendaftaran/".$data['berkas']?> target="_blank"><i class="fa fa-download"></i></a>
                      <a href="?pages=daftarAksi&kode=<?php echo $data['idDaftar']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
                      class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></a>
                    <?php
                    }else{
                    ?>
                    <a href="?pages=daftarAksi&kode=<?php echo $data['idDaftar']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
                      class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></a>
                    <?php
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
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
      <?php
      break;
      }
      ?>
    <!-- /.row -->
  </div>

  </body>
  <div id="pendaftaran" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Tambah Data Jurusan</h4>
      </div>
      <div class="modal-body">
        <form action="?pages=jadwalAksi" method="post" enctype="multipart/form-data">

          <div class="form-group">
          <label>Lowongan </label>
              <input class="form-control" type="hidden" name="usrInput" value="<?php echo $data_idUser; ?>" readonly> <br>
              <select name="noLoker" id="" class="form-control">
                <option value="">-Pilih-</option>
                <?php
                $dt = getLowongan($data_idUser);
                foreach ($dt as $value) {
                  echo '<option value="'.$value['idLowongan'].'">'.$value['nmLoker'].'</option>';
                }
              ?>
              </select>
          </div>

          <div class="form-group">
            <label>Tempat</label>
              <input class="form-control " type="text" name="tempat" require>
          </div>
          <div class="form-group">
          <label>Tgl Seleksi</label>
              <input class="form-control " type="date" name="tanggal" require>
          </div>
          <div class="form-group">
          <label>Waktu </label>
              <input class="form-control " type="text" name="waktu" require>
          </div>
          <div class="form-group">
          <label>Keterangan</label>
              <textarea style="resize: none" name="ket" id="" class="form-control" rows="3" require></textarea>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <input class="btn btn-success" type="submit" name="btnSimpan" value="Simpan" />
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

  <div id="preview" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Data Pendaftar</h4>
      </div>
      <div class="modal-body">
        <form action="?pages=jadwalAksi" method="post" enctype="multipart/form-data">

          <div class="form-group">
          <label>Lowongan </label>
              <input class="form-control" type="hidden" name="usrInput" value="<?php echo $data_idUser; ?>" readonly> <br>
              <select name="noLoker" id="" class="form-control">
                <option value="">-Pilih-</option>
                <?php
                $dt = getLowongan($data_idUser);
                foreach ($dt as $value) {
                  echo '<option value="'.$value['idLowongan'].'">'.$value['nmLoker'].'</option>';
                }
              ?>
              </select>
          </div>

          <div class="form-group">
            <label>Tempat</label>
              <input class="form-control " type="text" name="tempat" require>
          </div>
          <div class="form-group">
          <label>Tgl Seleksi</label>
              <input class="form-control " type="date" name="tanggal" require>
          </div>
          <div class="form-group">
          <label>Waktu </label>
              <input class="form-control " type="text" name="waktu" require>
          </div>
          <div class="form-group">
          <label>Keterangan</label>
              <textarea style="resize: none" name="ket" id="" class="form-control" rows="3" require></textarea>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <input class="btn btn-success" type="submit" name="btnSimpan" value="Simpan" />
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

  <script src="js/main.js"></script>

</html>
