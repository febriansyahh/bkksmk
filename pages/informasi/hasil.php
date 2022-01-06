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
              <a data-toggle="modal" data-target="#jurusan" class="btn btn-primary d-inline" style="float : right;"><i
                  class="fas fa-plus-square"></i> Hasil Seleksi</a>
                <h3 class="card-title">Data Hasil Seleksi Lowongan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <center>
                      <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Perusahaan</th>
                        <th>Lowongan</th>
                        <th>Keterangan</th>
                        <th>File</th>
                        <th>Piihan</th>
                      </tr>
                    </center>
                  </thead>
                  <tbody>
                    <?php
                $a = getHasil();
                $no = 1;
                foreach ($a as $key => $data) {
                    ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['idLoker']; ?></td>
                      <td><?php echo $data['perusahaan']; ?></td>
                      <td><?php echo $data['nmLoker']; ?></td>
                      <td><?php echo $data['keterangan']; ?></td>
                      <td><span style="color:blue"> <a href=<?php echo "file_data/hasil/".$data['file']?>>Unduh</a></span></td>
                      
                      <!-- <td><?php echo $data['tglDaftar']; ?></td> -->
                      <td>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#editSiswa"
                          data-id="<?php echo $data['idHasil'] . "~" . $data['idLoker'] . "~" . $data['perusahaan'] . "~" . $data['file'] . "~" . $data['keterangan'] ?>"
                          onclick="editableHasil(this)" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="?pages=hasilAksi&kode=<?php echo $data['idHasil'] ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
                          class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></a>
                          <?php
                        if($data['status'] == '1'){
                      ?>
                      <a href="?pages=hasilAksi&kodes=<?php echo $data['idHasil']; ?>" onclick="return confirm('Yakin untuk konfirmasi data ini ?')"
                      class='btn btn-warning btn-sm'><i class="fa fa-check"></i></a>
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
      case '2':
        ?>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Hasil Seleksi Lowongan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <center>
                      <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Perusahaan</th>
                        <th>Lowongan</th>
                        <th>File</th>
                        <th>Piihan</th>
                      </tr>
                    </center>
                  </thead>
                  <tbody>
                    <?php
                $a = getHasilAnggota($data_id);
                $no = 1;
                foreach ($a as $key => $data) {
                    ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['idHasil']; ?></td>
                      <td><?php echo $data['perusahaan']; ?></td>
                      <td><?php echo $data['nmLoker']; ?></td>
                      <td><span style="color:blue"> <a href=<?php echo "file_data/hasil/".$data['file']?>>Unduh</a></span></td>
                      
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
                <h3 class="card-title">Data Hasil Seleksi Lowongan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <center>
                      <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Perusahaan</th>
                        <th>Lowongan</th>
                        <th>File</th>
                        <th>Piihan</th>
                      </tr>
                    </center>
                  </thead>
                  <tbody>
                    <?php
                $a = getHasil();
                $no = 1;
                foreach ($a as $key => $data) {
                    ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['idHasil']; ?></td>
                      <td><?php echo $data['perusahaan']; ?></td>
                      <td><?php echo $data['nmLoker']; ?></td>
                      <td><span style="color:blue"> <a href=<?php echo "file_data/hasil/".$data['file']?>>Unduh</a></span></td>
                      
                      <!-- <td><?php echo $data['tglDaftar']; ?></td> -->
                      <td>
                      <a href="?pages=hasilAksi&kode=<?php echo $data['idHasil'] ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
                          class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></a>
                          <?php
                    if($data['status'] == '1'){
                      ?>
                      <a href="?pages=hasilAksi&kodes=<?php echo $data['idHasil']; ?>" onclick="return confirm('Yakin untuk konfirmasi data ini ?')"
                      class='btn btn-warning btn-sm'><i class="fa fa-check"></i></a>
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
      case '4':
        ?>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <a data-toggle="modal" data-target="#jurusan" class="btn btn-primary d-inline" style="float : right;"><i
                  class="fas fa-plus-square"></i> Hasil Seleksi</a>
                <h3 class="card-title">Data Hasil Seleksi Lowongan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <center>
                      <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Perusahaan</th>
                        <th>Lowongan</th>
                        <th>Keterangan</th>
                        <th>File</th>
                        <th>Piihan</th>
                      </tr>
                    </center>
                  </thead>
                  <tbody>
                    <?php
                $a = getHasilPerusahaan($data_idUser);
                $no = 1;
                foreach ($a as $key => $data) {
                    ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['noLoker']; ?></td>
                      <td><?php echo $data['perusahaan']; ?></td>
                      <td><?php echo $data['nmLoker']; ?></td>
                      <td><?php echo $data['keterangan']; ?></td>
                      <td><span style="color:blue"> <a href=<?php echo "file_data/hasil/".$data['file']?>>Unduh</a></span></td>
                      
                      <!-- <td><?php echo $data['tglDaftar']; ?></td> -->
                      <td>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#editSiswa"
                          data-id="<?php echo $data['idHasil'] . "~" . $data['idLoker'] . "~" . $data['perusahaan'] . "~" . $data['file'] . "~" . $data['keterangan'] ?>"
                          onclick="editableHasil(this)" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="?pages=hasilAksi&kode=<?php echo $data['idHasil'] ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
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
    }
    ?>
    <!-- /.row -->
  </div>

  </body>
  <div id="jurusan" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h5 class="modal-title">Tambah Hasil Seleksi</h5>
      </div>
      <div class="modal-body">
        <form action="?pages=hasilAksi" method="post" enctype="multipart/form-data">

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
            <label>File</label>
              <input class="form-control" type="file" name="fileHasil" require>
              <span>*) Max. File : 4 MB</span>
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


<div class="modal fade" id="editSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog pt-5" role="document">
    <div class="modal-content">
    <form action="?pages=hasilAksi" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <h3 class="text-center"><b>Edit Hasil Seleksi</b></h3>
          <hr>
          <div class="form-group">
          <label>Lowongan </label>
              <input class="form-control" type="hidden" name="usrInput" value="<?php echo $data_idUser; ?>" readonly> <br>
              <select name="noLoker" id="editidLok" class="form-control">
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
          <label>Perusahaan</label>
          <input class="form-control" type="hidden" name="idHasil" id="editidHasil" value="<?php echo $data_idUser; ?>" readonly> <br>
              <input class="form-control " type="text" name="tempat" id="editperusahaan" readonly>
          </div>
          <!-- <div class="form-group">
          <label>Tgl Seleksi</label>
              <input class="form-control " type="date" name="tanggal" id="edittgl" require>
          </div> -->
          <!-- <div class="form-group">
          <label>Waktu </label>
              <input class="form-control " type="text" name="waktu" id="editwaktu" require>
          </div> -->
          <div class="form-group">
          <label>Keterangan</label>
              <textarea style="resize: none" name="ket" id="editketerangan" class="form-control" rows="3" require></textarea>
          </div>

        <div class="modal-footer">
          <button type="submit" name="btnUBAH" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
  </html>
  <script src="js/main.js"></script>
