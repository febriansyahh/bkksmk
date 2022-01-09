<?php	
include_once("koneksi.php");
$maxID = MaxIdProgram();
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
            <a data-toggle="modal" data-target="#mySiswa" class="btn btn-primary d-inline" style="float : right;"><i
                class="fas fa-plus-square"></i> Tambah Lowongan</a>
            <h3 class="card-title">Data Lowongan</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <center>
                  <tr>
                    <th>No</th>
                    <th>Nama Perusahaan</th>
                    <th>Lowongan</th>
                    <th>Jenis Kelamin</th>
                    <th>Keterangan</th>
                    <th>Sumber</th>
                    <th>Batas</th>
                    <th>Piihan</th>
                  </tr>
                </center>
              </thead>
              <tbody>
                <?php
            ArsipOto();
            $a = SelectLowongan();
            $no = 1;
            foreach ($a as $key => $data) {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['perusahaan']; ?></td>
                  <td><?php echo $data['nmLoker']; ?></td>
                  <td><?php echo $data['jekel']; ?></td>
                  <td><?php echo $data['keterangan']; ?></td>
                  <td><?php echo $data['sumber']; ?></td>
                  <td><?php echo date('d F Y', strtotime($data['batas'])); ?></td>
                  <td>
                    <?php
                    if($data['status'] == '2'){
                      ?>
                    <?php
                      if($data['usrInput'] == $data_idUser){
                      ?>
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#editLoker"
                      data-id="<?php echo $data['idLowongan'] . "~" . $data['noLoker'] . "~" . $data['perusahaan'] . "~" . $data['nmLoker'] . "~" . $data['jekel'] . "~" . $data['file'] . "~" . $data['keterangan'] . "~" . $data['sumber'] . "~" . $data['tglInput'] . "~" . date('d-m-Y', strtotime($data['batas'])) . "~" . $data['status'] . "~" . $data['kualifikasi'] . "~" . $data['persyaratan']?>"
                      onclick="editableLowongan(this)" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                    <a href="?pages=lokerAksi&kode=<?php echo $data['idLowongan']; ?>"
                      onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i
                        class="fa fa-trash"></i></a>
                    <?php
                      }else{
                      ?>
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#editLoker"
                      data-id="<?php echo $data['idLowongan'] . "~" . $data['noLoker'] . "~" . $data['perusahaan'] . "~" . $data['nmLoker'] . "~" . $data['jekel'] . "~" . $data['file'] . "~" . $data['keterangan'] . "~" . $data['sumber'] . "~" . $data['tglInput'] . "~" . date('d-m-Y', strtotime($data['batas'])) . "~" . $data['status'] . "~" . $data['kualifikasi'] . "~" . $data['persyaratan']?>"
                      onclick="editableLowongan(this)" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                    <a href="?pages=lokerAksi&kode=<?php echo $data['idLowongan']; ?>"
                      onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i
                        class="fa fa-trash"></i></a>
                    <?php 
                      }
                      ?>
                    <?php
                    }elseif($data['status'] == '3'){
                    ?>
                    <a href="#" class="btn btn-success btn-sm">Pendaftaran Selesai</a>
                    <?php
                    }else{
                    ?>
                    <a href="#" class="btn btn-warning btn-sm">Menunggu Konfirmasi</a>
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
            <h3 class="card-title">Data Lowongan</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <center>
                  <tr>
                    <th>No</th>
                    <th>Nama Perusahaan</th>
                    <th>Lowongan</th>
                    <th>Jenis Kelamin</th>
                    <th>Keterangan</th>
                    <th>Sumber</th>
                    <th>Batas</th>
                    <th>Piihan</th>
                  </tr>
                </center>
              </thead>
              <tbody>
                <?php
            $a = SelectLowonganAnggota();
            $no = 1;
            foreach ($a as $key => $data) {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['perusahaan']; ?></td>
                  <td><?php echo $data['nmLoker']; ?></td>
                  <td><?php echo $data['jekel']; ?></td>
                  <td><?php echo $data['keterangan']; ?></td>
                  <td><?php echo $data['sumber']; ?></td>
                  <td><?php echo date('d F Y', strtotime($data['batas'])); ?></td>
                  <td>
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#editLoker"
                      data-id="<?php echo $data['idLowongan'] . "~" . $data['noLoker'] . "~" . $data['perusahaan'] . "~" . $data['nmLoker'] . "~" . $data['jekel'] . "~" . $data['file'] . "~" . $data['keterangan'] . "~" . $data['sumber'] . "~" . $data['tglInput'] . "~" . $data['batas'] . "~" . $data['status'] . "~" . $data['kualifikasi'] . "~" . $data['persyaratan']?>"
                      onclick="editableLowongan(this)" class="btn btn-success btn-sm"><i
                        class="fas fa-info-circle"></i></a>
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#daftarLoker"
                      data-id="<?php echo $data['idLowongan'] . "~" . $data['noLoker'] . "~" . $data['perusahaan'] . "~" . $data['nmLoker'] ?>"
                      onclick="daftarLoker(this)" class="btn btn-primary btn-sm"><i class="fas fa-file-upload"></i></a>
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
            <!-- <a data-toggle="modal" data-target="#mySiswa" class="btn btn-primary d-inline" style="float : right;"><i
                class="fas fa-plus-square"></i> Tambah Lowongan</a> -->
            <h3 class="card-title">Data Lowongan</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <center>
                  <tr>
                    <th>No</th>
                    <th>Nama Perusahaan</th>
                    <th>Lowongan</th>
                    <th>Jenis Kelamin</th>
                    <th>Keterangan</th>
                    <th>Sumber</th>
                    <th>Batas</th>
                    <th>Piihan</th>
                  </tr>
                </center>
              </thead>
              <tbody>
                <?php
            $a = SelectLowongan();
            $no = 1;
            foreach ($a as $key => $data) {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['perusahaan']; ?></td>
                  <td><?php echo $data['nmLoker']; ?></td>
                  <td><?php echo $data['jekel']; ?></td>
                  <td><?php echo $data['keterangan']; ?></td>
                  <td><?php echo $data['sumber']; ?></td>
                  <td><?php echo date('d F Y', strtotime($data['batas'])); ?></td>
                  <td>
                    <!-- <a href="javascript:void(0)" data-toggle="modal" data-target="#editLoker"
                      data-id="<?php echo $data['idLowongan'] . "~" . $data['noLoker'] . "~" . $data['perusahaan'] . "~" . $data['nmLoker'] . "~" . $data['jekel'] . "~" . $data['file'] . "~" . $data['keterangan'] . "~" . $data['sumber'] . "~" . $data['tglInput'] . "~" . $data['batas'] . "~" . $data['status'] . "~" . $data['kualifikasi'] . "~" . $data['persyaratan']?>"
                      onclick="editableLowongan(this)" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a> -->
                    <a href="?pages=lokerAksi&kode=<?php echo $data['idLowongan']; ?>"
                      onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i
                        class="fa fa-trash"></i></a>
                    <?php
                    if($data['status'] == '1'){
                      ?>
                    <a href="?pages=lokerAksi&kodes=<?php echo $data['idLowongan']; ?>"
                      onclick="return confirm('Yakin untuk konfirmasi data ini ?')" class='btn btn-warning btn-sm'><i
                        class="fa fa-check"></i></a>
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
            <a data-toggle="modal" data-target="#mySiswa" class="btn btn-primary d-inline" style="float : right;"><i
                class="fas fa-plus-square"></i> Tambah Lowongan</a>
            <h3 class="card-title">Data Lowongan</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <center>
                  <tr>
                    <th>No</th>
                    <th>Nama Perusahaan</th>
                    <th>Lowongan</th>
                    <th>Jenis Kelamin</th>
                    <th>Keterangan</th>
                    <th>Sumber</th>
                    <th>Batas</th>
                    <th>Piihan</th>
                  </tr>
                </center>
              </thead>
              <tbody>
                <?php
            $a = SelectLowonganperusahaan($data_idUser);
            // $a = SelectLowongan();
            $no = 1;
            foreach ($a as $key => $data) {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['perusahaan']; ?></td>
                  <td><?php echo $data['nmLoker']; ?></td>
                  <td><?php echo $data['jekel']; ?></td>
                  <td><?php echo $data['keterangan']; ?></td>
                  <td><?php echo $data['sumber']; ?></td>
                  <td><?php echo date('d F Y', strtotime($data['batas'])); ?></td>
                  <td>
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#editLoker"
                      data-id="<?php echo $data['idLowongan'] . "~" . $data['noLoker'] . "~" . $data['perusahaan'] . "~" . $data['nmLoker'] . "~" . $data['jekel'] . "~" . $data['file'] . "~" . $data['keterangan'] . "~" . $data['sumber'] . "~" . $data['tglInput'] . "~" . $data['batas'] . "~" . $data['status'] . "~" . $data['kualifikasi'] . "~" . $data['persyaratan']?>"
                      onclick="editableLowongan(this)" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                    <a href="?pages=lokerAksi&kode=<?php echo $data['idLowongan']; ?>"
                      onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i
                        class="fa fa-trash"></i></a>
                    <?php
                    if($data['status'] == '1'){
                    ?>
                    <a href="https://api.whatsapp.com/send?phone=6287729356414&text=Permisi%2C%20yang%20terhormat%20ketua%20bkk%2C%20kami%20dari%20perusahaan%20<?php echo $data_nama ?>%20telah%20mengajukan%20lowongan%20<?php echo $data['nmLoker']?>%2C%20untuk%20itu%20mohon%20konfirmasi%20terkait%20lowongan%20tersebut.%20Terima%20Kasih"
                      target="_blank" class='btn btn-success btn-sm'><i class="fab fa-whatsapp"></i></a>
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
  <div id="mySiswa" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h6 class="modal-title">Tambah Lowongan Kerja</h6>
        </div>
        <div class="modal-body">
          <form action="?pages=lokerAksi" method="post" enctype="multipart/form-data">
            <?php
            switch ($data_status) {
              case '1':
            ?>
            <div class="row">
              <div class="col-6">
                <label>No Loker </label>
                <input class="form-control" type="hidden" name="usrInput" value="<?php echo $data_idUser; ?>" readonly>
                <br>
                <input class="form-control" type="text" name="noLoker" value="<?php echo $maxID; ?>" readonly> <br>
              </div>

              <div class="col-6">
                <label>Perusahaan</label>
                <input class="form-control " type="text" name="perusahaan" required>
              </div>

              <div class="col-6">
                <label>Lowongan</label>
                <input class="form-control " type="text" name="nmloker" required>
              </div>

              <div class="col-6">
                <label>Jekel Tertuju</label>
                <select name="jekel" class="form-control" id="" required>
                  <option value="">- Pilih -</option>
                  <option value="Pria">Pria</option>
                  <option value="Wanita">Wanita</option>
                  <option value="Keduanya">Pria / Wanita</option>
                  <!-- <option value="Pria/Wanita">Pria / Wanita</option> -->
                </select><br>
              </div>

              <div class="col-6">
                <label>Kualifikasi</label>
                <textarea name="kualifikasi" id="" style="white-space: pre-line; resize: none;" oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"' 
                class="form-control" cols="50"
                  rows="3"></textarea><br>
              </div>

              <div class="col-6">
                <label>Persyaratan</label>
                <textarea name="persyaratan" id="" style="white-space: pre-line; resize: none;" oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"' 
                class="form-control" cols="50"
                  rows="3"></textarea>
                <!-- <textarea name="" id="" cols="30" rows="10"></textarea> -->
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <label>File Lowongan</label>
                <input class="form-control " type="file" name="fileLoker">
                <span>*) Max. File : 4 MB</span>
                <br>
              </div>

              <div class="col-6">
                <label>Batas Pendaftaran</label>
                <input class="form-control " type="date" name="batas" required>
              </div>
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <textarea name="ket" style="white-space: pre-line; resize: none;" oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"'
                class="form-control"rows="2"></textarea>
              </div>

              <div class="row">
              <div class="col-6">
                <label>Sumber : <?php echo $data_nama ?></label>
                <input class="form-control " type="hidden" name="sumber" value="<?php echo $data_nama ?>">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <input class="btn btn-success" type="submit" name="btnSimpan" value="Save" />
            </div>
            <?php
                break;
              case '4':
                ?>
            <div class="row">
              <div class="col-6">
                <label>No Loker </label>
                <input class="form-control" type="hidden" name="usrInput" value="<?php echo $data_idUser; ?>" readonly>
                <br>
                <input class="form-control" type="text" name="noLoker" value="<?php echo $maxID; ?>" readonly> <br>
              </div>

              <div class="col-6">
                <label>Perusahaan</label>
                <input class="form-control " type="text" name="perusahaan" value="<?php echo $data_nama ?>" readonly>
              </div>

              <div class="col-6">
                <label>Lowongan</label>
                <input class="form-control " type="text" name="nmloker" required>
              </div>

              <div class="col-6">
                <label>Jekel Tertuju</label>
                <select name="jekel" class="form-control" id="" required>
                  <option value="">- Pilih -</option>
                  <option value="Pria">Pria</option>
                  <option value="Wanita">Wanita</option>
                  <option value="Keduanya">Pria / Wanita</option>
                  <!-- <option value="Pria/Wanita">Pria / Wanita</option> -->
                </select><br>
              </div>
              <div class="col-6">
                <label>Kualifikasi</label>
                <textarea name="kualifikasi" id="" style="white-space: pre-line; resize: none;" oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"' 
                class="form-control" cols="50"
                  rows="3"></textarea><br>
              </div>

              <div class="col-6">
                <label>Persyaratan</label>
                <textarea name="persyaratan" id="" style="white-space: pre-line; resize: none;" oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"' 
                class="form-control" cols="50"
                  rows="3"></textarea>
                <!-- <textarea name="" id="" cols="30" rows="10"></textarea> -->
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <label>File Lowongan</label>
                <input class="form-control " type="file" name="fileLoker">
                <span>*) Max. File : 4 MB</span> <br>
              </div>

              <div class="col-6">
                <label>Batas Pendaftaran</label>
                <input class="form-control " type="date" name="batas" required>
              </div>
            </div>
              <div class="form-group">
                <label>Keterangan</label>
                <textarea name="ket" style="white-space: pre-line; resize: none;" oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"'
                class="form-control"rows="2"></textarea>
              </div>

              <div class="row">
              <div class="col-6">
                <label>Sumber : <?php echo $data_nama ?></label>
                <input class="form-control " type="hidden" name="sumber" value="<?php echo $data_nama ?>">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <input class="btn btn-success" type="submit" name="btnSimpan" value="Save" />
            </div>
            <?php
              break;
              
              }
          ?>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div id="daftarLoker" class="modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h6 class="modal-title">Daftar Lowongan Kerja</h6>
        </div>
        <div class="modal-body">
          <form action="?pages=daftarAksi" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>No Loker </label>
              <input class="form-control" type="hidden" name="idLoker" id="valId" readonly>
              <input class="form-control" type="text" name="noLoker" id="valnoLok" readonly> <br>

              <label>Perusahaan</label>
              <input class="form-control " type="text" name="perusahaan" id="valperusahaan" readonly>

              <label>Lowongan</label>
              <input class="form-control " type="text" name="nmloker" id="valnmLoker" required readonly>

              <label>Atas Nama</label>
              <input class="form-control" type="hidden" name="idDaftar" value="<?php echo $data_id ?>" readonly>
              <input class="form-control" type="text" name="atasNama" value="<?php echo $data_nama ?>" readonly>

              <label>File Pendaftaran</label>
              <input class="form-control " type="file" name="berkasDaftar" required>
              <span>*) Max. File : 4 MB</span> <br>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <input class="btn btn-success" type="submit" name="btnSimpan" value="Daftar" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal" id="editLoker" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <?php
        if($data_status == 2){
        ?>
        <form action="#" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <h2 class="text-center"><b>Detail Lowongan</b></h2>
            <hr>
            <div class="row">
              <div class="col-6">
                <label for=""><b>Kode Lowongan </b></label>
                <input type="text" name="editID" id="editID" class="form-control" readonly>
              </div>
              <div class="col-6">
                <label for=""><b>Nama Perusahaan </b></label>
                <input type="text" name="editNmPer" id="editNmPer" class="form-control" readonly>
              </div>
              <div class="col-6">
                <label for=""><b>Lowongan Kerja </b></label>
                <input type="text" name="editNmLoker" id="editNmLoker" class="form-control" readonly>
              </div>
              <div class="col-6">
                <label for=""><b>Jenis Kelamin</b></label>
                <input type="text" name="editJekel" id="editJekel" class="form-control" readonly>
              </div>
              
              <div class="col-6">
                <label>Kualifikasi</label>
                <textarea name="editKual" id="editKual" style="white-space: pre-line" class="form-control" cols="50"
                  rows="3" readonly></textarea><br>
              </div>

              <div class="col-6">
                <label>Persyaratan</label>
                <textarea name="editPersy" id="editPersy" style="white-space: pre-line" class="form-control" cols="50"
                  rows="3" readonly></textarea>
              </div>

            </div>
            <div class="row">
              <div class="col-6">
                <label for=""><b>Sumber </b></label>
                <input type="text" name="editSumber" id="editSumber" class="form-control" readonly>
              </div>
              <!-- <div class="col-6">
                <label for=""><b>Tanggal </b></label>
                <input type="date" name="editTgl" id="editTanggal" class="form-control" readonly>
              </div> -->
              <div class="col-6">
                <label for=""><b>Batas </b></label>
                <input type="text" name="editBatas" id="editBatas" class="form-control" readonly>
              </div>
              <!-- <div class="col-6">
                <label for=""><b>Status </b></label>
                <input type="text" name="editStatus" id="editStatus" class="form-control" readonly>
              </div> -->
            </div>
            <div class="form-group">
              <label for=""><b>Keterangan </b></label>
              <input type="text" name="editKet" id="editKeterangan" class="form-control" readonly>
            </div>
        </form>
        <?php
        } else{
        ?>
        <form action="?pages=lokerAksi" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <h2 class="text-center"><b>Detail Lowongan</b></h2>
            <hr>
            <div class="row">
              <div class="col-6">
                <label for=""><b>Kode Lowongan </b></label>
                <input type="text" name="editID" id="editID" class="form-control" readonly>
              </div>
              <div class="col-6">
                <label for=""><b>Nama Perusahaan </b></label>
                <input type="text" name="editNmPer" id="editNmPer" class="form-control">
              </div>
              <div class="col-6">
                <label for=""><b>Lowongan Kerja </b></label>
                <input type="text" name="editNmLoker" id="editNmLoker" class="form-control">
              </div>
              <div class="col-6">
                <label for=""><b>Jenis Kelamin</b></label>
                <input type="text" name="editJekel" id="editJekel" class="form-control">
              </div>
              
              <div class="col-6">
                <label>Kualifikasi</label>
                <textarea name="editKual" id="editKual" style="white-space: pre-line" class="form-control" cols="50"
                  rows="3"></textarea><br>
              </div>

              <div class="col-6">
                <label>Persyaratan</label>
                <textarea name="editPersy" id="editPersy" style="white-space: pre-line" class="form-control" cols="50"
                  rows="3"></textarea>
              </div>

            </div>
            <div class="row">
              <div class="col-6">
                <label for=""><b>Sumber </b></label>
                <input type="text" name="editSumber" id="editSumber" class="form-control" readonly>
              </div>
              <!-- <div class="col-6">
                <label for=""><b>Tanggal </b></label>
                <input type="date" name="editTgl" id="editTanggal" class="form-control">
              </div> -->
              <div class="col-6">
                <label for=""><b>Batas </b></label>
                <input type="text" name="editBatas" id="editBatas" class="form-control">
              </div>
              <!-- <div class="col-6">
                <label for=""><b>Status </b></label>
                <input type="text" name="editStatus" id="editStatus" class="form-control">
              </div> -->
            </div>
            <div class="form-group">
              <label for=""><b>Keterangan </b></label>
              <input type="text" name="editKet" id="editKeterangan" class="form-control">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <input class="btn btn-success" type="submit" name="btnUBAH" value="Ubah" />
            </div>
        </form>
        <?php
        } ?>
      </div>
    </div>
  </div>

  <script src="js/main.js"></script>

  </html>
