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
              <a data-toggle="modal" data-target="#mySiswa" class="btn btn-primary d-inline" style="float : right;"><i
                  class="fas fa-plus-square"></i> Tambah Siswa</a>
                <h3 class="card-title">Data Siswa</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                <thead>
                        <center>
                          <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Jurusan</th>
                            <th>Tahun Lulus</th>
                            <th>Piihan</th>
                          </tr>
                        </center>
                  </thead>
                  <tbody>
                  <?php
            $a = SelectSiswa();
            $no = 1;
            foreach ($a as $key => $data) {
                ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $data['nisn']; ?></td>
                          <td><?php echo $data['nama']; ?></td>
                          <td><?php echo $data['jekel']; ?></td>
                          <td><?php echo $data['nmJurusan']; ?></td>
                          <td><?php echo $data['tahunMasuk']; ?></td>
                          <td>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#detailSiswa" onclick="editableDataSiswa(this)" data-id="<?php echo $data['idSiswa'] . "~" . $data['nisn'] . "~" . $data['nama'] . "~" . $data['jekel'] . "~" . $data['tempatLhr'] . "~" . $data['tglLhr'] . "~" . $data['nmJurusan'] . "~" . $data['tahunMasuk'] . "~" . $data['nmOrtu'] . "~" . $data['alamat'] . "~" . $data['noTelp'] . "~" . $data['nmJurusan'] ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#editSiswa" onclick="editableDataSiswa(this)" data-id="<?php echo $data['idSiswa'] . "~" . $data['nisn'] . "~" . $data['nama'] . "~" . $data['jekel'] . "~" . $data['tempatLhr'] . "~" . $data['tglLhr'] . "~" . $data['nmJurusan'] . "~" . $data['tahunMasuk'] ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="?page=siswaAksi&kode=<?php echo $data['idSiswa']; ?>"
                              onclick="return confirm('Apakah anda yakin hapus data ini ?')"
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
        <!-- /.row -->
      </div>

</body>
<!-- <div id="mySiswa" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Tambah Data Siswa</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <label>IP Address </label>
            <input class="form-control" type="text" name="ipAddress">
          </div>

          <div class="form-group">
            <label>Lokasi IP</label>
            <input class="form-control " type="text" name="lokasi">
          </div>

          <div class="form-group">
            <label>Keterangan</label>
            <textarea name="ket" id="" class="form-control" rows="3"></textarea>
            <input class="form-control " type="text" name="ket">
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <input class="btn btn-success" type="submit" name="btn" value="Save" />
          </div>
        </form>
      </div>
    </div>
  </div>
</div> -->

<div id="mySiswa" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <p class="modal-title" style="font-family: Poppins">Detail Data Siswa</p>
      </div>
      <div class="modal-body">
        <form action="?page=siswaAksi" method="post" enctype="multipart/form-data">
        <div class="row">
        <div class="col md-6">
            <label for=""><b>NISN Siswa </b></label>
            <input type="text" name="Nisn" class="form-control">
          </div>
          <div class="col md-6">
            <label for=""><b>Nama Siswa </b></label>
            <input type="text" name="nama" class="form-control">
          </div>
      </div>
      <div class="row">
        <div class="col md-6">
          <label for=""><b>Jenis Kelamin</b></label>
          <select name="jekel" id="" class="form-control">
            <option value="">- Pilih -</option>
            <option value="Pria">Pria</option>
            <option value="Wanita">Wanita</option>
          </select>
          </div>
          <div class="col md-6">
            <label for=""><b>email </b></label>
            <input type="text" name="email" class="form-control">
          </div>
        </div>
        <div class="row">
        <div class="col md-6">
            <label for=""><b>Tempat Lahir </b></label>
            <input type="text" name="tempat" class="form-control">
          </div>
          <div class="col md-6">
            <label for=""><b>Tanggal Lahir </b></label>
            <input type="date" name="tgl" class="form-control">
          </div>
        </div>
        <div class="row">
        <div class="col md-6">
            <label for=""><b>Nama Orang Tua </b></label>
            <input type="text" name="nmOrtu" class="form-control">
          </div>
          <div class="col md-6">
            <label for=""><b>Alamat</b></label>
            <input type="text" name="alamat" class="form-control">
          </div>
        </div>
        <div class="row">
        <div class="col md-6">
            <label for=""><b>No Telepon </b></label>
            <input type="text" name="telp" class="form-control">
          </div>
          <div class="col md-6">
            <label for=""><b>Jurusan</b></label>
            <select name="jurusan" id="" class="form-control">
            <option value="">-Pilih-</option>
                <?php
                $dt = getJurusan();
                foreach ($dt as $value) {
                  echo '<option value="'.$value['idJurusan'].'">'.$value['nmJurusan'].'</option>';
                }
              ?>
          </select>
          </div>
          <div class="col md-6">
            <label for=""><b>Tahun Masuk</b></label>
            <input type="text" name="tahun" class="form-control">
          </div>
        </div>
        <br>
        <br>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <input class="btn btn-success" type="submit" name="btnSimpan" value="Simpan" />
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div id="detailSiswa" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <p class="modal-title" style="font-family: Poppins">Detail Data Siswa</p>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
        <div class="col md-6">
            <label for=""><b>NISN Siswa </b></label>
            <input type="text" name="Nisn" id="editNisn" class="form-control" readonly>
          </div>
          <div class="col md-6">
            <label for=""><b>Nama Siswa </b></label>
            <input type="text" name="Nama" id="editNama" class="form-control" readonly>
          </div>
      </div>
      <div class="row">
        <div class="col md-6">
          <label for=""><b>Jenis Kelamin</b></label>
          <input type="text" name="Jekel" id="editJekel" class="form-control" readonly>
          </div>
          <div class="col md-6">
            <label for=""><b>Jurusan </b></label>
            <input type="text" name="Ket" id="editJurusan" class="form-control" readonly>
          </div>
        </div>
        <div class="row">
        <div class="col md-6">
            <label for=""><b>Tempat Lahir </b></label>
            <input type="text" name="Ket" id="editTmptLhr" class="form-control" readonly>
          </div>
          <div class="col md-6">
            <label for=""><b>Tanggal Lahir </b></label>
            <input type="text" name="Ket" id="editTglLhr" class="form-control" readonly>
          </div>
          <div class="col md-6">
            <label for=""><b>Tahun Masuk </b></label>
            <input type="text" name="Ket" id="editTahun" class="form-control" readonly>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="editSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog pt-5" role="document">
    <div class="modal-content">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <h2 class="text-center"><b>Edit Siswa</b></h2>
          <hr>
          <div class="form-group">
            <label for=""><b>NISN Siswa </b></label>
            <input type="text" name="ID" id="editNisns" class="form-control">
            <input type="text" name="Nisn" id="editNisn" class="form-control">
          </div>
          <div class="form-group">
            <label for=""><b>Nama Siswa </b></label>
            <input type="text" name="Nama" id="editNama" class="form-control">
          </div>
          <div class="form-group">
            <label for=""><b>Jenis Kelamin</b></label>
            <input type="text" name="Jekel" id="editJekel" class="form-control">
          </div>
          <div class="form-group">
            <label for=""><b>Jurusan </b></label>
            <input type="text" name="Ket" id="editJurusan" class="form-control">
          </div>
          <div class="form-group">
            <label for=""><b>Tempat Lahir </b></label>
            <input type="text" name="Ket" id="editTmptLhr" class="form-control">
          </div>
          <div class="form-group">
            <label for=""><b>Tanggal Lahir </b></label>
            <input type="text" name="Ket" id="editTglLhr" class="form-control">
          </div>
          <div class="form-group">
            <label for=""><b>Tahun Masuk </b></label>
            <input type="text" name="Ket" id="editTahun" class="form-control">
          </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal" id="detSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog pt-5" role="document">
    <div class="modal-content">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <h2 class="text-center"><b>Edit Siswa</b></h2>
          <hr>
          <div class="form-group">
            <label for=""><b>NISN Siswa </b></label>
            <input type="text" name="ID" id="editNisns" class="form-control" readonly>
            <input type="text" name="Nisn" id="editNisn" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for=""><b>Nama Siswa </b></label>
            <input type="text" name="Nama" id="editNama" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for=""><b>Jenis Kelamin</b></label>
            <input type="text" name="Jekel" id="editJekel" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for=""><b>Jurusan </b></label>
            <input type="text" name="Ket" id="editJurusan" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for=""><b>Tempat Lahir </b></label>
            <input type="text" name="Ket" id="editTmptLhr" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for=""><b>Tanggal Lahir </b></label>
            <input type="text" name="Ket" id="editTglLhr" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for=""><b>Tahun Masuk </b></label>
            <input type="text" name="Ket" id="editTahun" class="form-control" readonly>
          </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>



</html>