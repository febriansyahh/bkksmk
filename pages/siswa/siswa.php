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
                          <td><?php echo $data['nmJurusan']; ?> </td>
                          <td><?php echo $data['tahunMasuk']; ?></td>
                          <td>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#detailSiswa" onclick="editableDataSiswas(this)" data-id="<?php echo $data['idSiswa'] . "~" . $data['nisn'] . "~" . $data['nama'] . "~" . $data['jekel'] . "~" . $data['tempatLhr'] . "~" . $data['tglLhr'] . "~" . $data['nmJurusan'] . "~" . $data['tahunMasuk'] . "~" . $data['nmOrtu'] . "~" . $data['alamat'] . "~" . $data['noTelp'] . "~" . $data['nmJurusan'] ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#editSiswa" onclick="editableDataSiswa(this)" data-id="<?php echo $data['idSiswa'] . "~" . $data['nisn'] . "~" . $data['nama'] . "~" . $data['jekel'] . "~" . $data['tempatLhr'] . "~" . $data['tglLhr'] . "~" . $data['nmJurusan'] . "~" . $data['tahunMasuk'] . "~" . $data['nmOrtu'] . "~" . $data['alamat'] . "~" . $data['noTelp'] . "~" . $data['nmJurusan'] . "~" . $data['jurusan'] ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                            <!-- <a href="?pages=siswa_aksi&kode=<?php echo $data['idSiswa']; ?>"
                              onclick="return confirm('Apakah anda yakin hapus data ini ?')"
                              class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></a> -->
                            <a href="?pages=siswa_aksi&kode=<?php echo $data['idSiswa']; ?>"
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
<div id="mySiswa" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <p class="modal-title" style="font-family: Poppins">Detail Data Siswa</p>
      </div>
      <div class="modal-body">
        <form action="?pages=siswa_aksi" method="post" enctype="multipart/form-data">
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
            <label for=""><b>Nama Orang Tua </b></label>
            <input type="text" name="Ket" id="editOrtu" class="form-control" readonly>
          </div>
          <div class="col md-6">
            <label for=""><b>No Telepon </b></label>
            <input type="text" name="Ket" id="editnoTelp" class="form-control" readonly>
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
        <div class="form-group">
        <label for=""><b>Alamat </b></label>
            <input type="text" name="Ket" id="editalamat" class="form-control" readonly>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div id="editSiswa" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <p class="modal-title" style="font-family: Poppins">Ubah Data Siswa</p>
      </div>
      <form action="?pages=siswa_aksi" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="row">
        <div class="col md-6">
            <label for=""><b>NISN Siswa </b></label>
            <input type="hidden" name="id" id="editID" class="form-control">
            <input type="text" name="nisn" id="editNisnSiswa" class="form-control">
          </div>
          <div class="col md-6">
            <label for=""><b>Nama Siswa </b></label>
            <input type="text" name="Nama" id="editNamaSiswa" class="form-control">
          </div>
      </div>
      <div class="row">
        <div class="col md-6">
          <label for=""><b>Jenis Kelamin</b></label>
          <!-- <input type="text" name="Jekel" id="editJekelSiswa" class="form-control"> -->
          <select name="jekel" id="editJekelSiswa" class="form-control">
            <option value="Pria">Pria</option>
            <option value="Wanita">Wanita</option>
          </select>
          </div>
          <div class="col md-6">
            <label for=""><b>Jurusan </b></label>
            <!-- <input type="text" name="jurusan" id="editidJurusanSiswa" class="form-control"> -->
            <select name="jurusan" id="editidJurusanSiswa" class="form-control">
            <option value="">-Pilih-</option>
                <?php
                $dt = getJurusan();
                foreach ($dt as $value) {
                  echo '<option value="'.$value['idJurusan'].'">'.$value['nmJurusan'].'</option>';
                }
              ?>
          </select>
          </div>
        </div>
        <div class="row">
        <div class="col md-6">
            <label for=""><b>Nama Orang Tua </b></label>
            <input type="text" name="ortu" id="editOrtuSiswa" class="form-control">
          </div>
          <div class="col md-6">
            <label for=""><b>No Telepon </b></label>
            <input type="text" name="notelp" id="editnoTelpSiswa" class="form-control">
          </div>
        </div>
        <div class="row">
        <div class="col md-6">
            <label for=""><b>Tempat Lahir </b></label>
            <input type="text" name="tempat" id="editTmptLhrSiswa" class="form-control">
          </div>
          <div class="col md-6">
            <label for=""><b>Tanggal Lahir </b></label>
            <input type="date" name="tglLahir" id="editTglLhrSiswa" class="form-control">
          </div>
          <div class="col md-6">
            <label for=""><b>Tahun Masuk </b></label>
            <input type="text" name="tahun" id="editTahunSiswa" class="form-control">
          </div>
        </div>
        <div class="form-group">
        <label for=""><b>Alamat </b></label>
            <input type="text" name="alamat" id="editalamatSiswa" class="form-control">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="btnUBAH">Ubahs</button>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>

</html>