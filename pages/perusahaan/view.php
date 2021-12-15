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
              <a data-toggle="modal" data-target="#jurusan" class="btn btn-primary d-inline" style="float : right;"><i
                  class="fas fa-plus-square"></i> Tambah Perusahaan</a>
                <h3 class="card-title">Data Perusahaan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                <thead>
                        <center>
                          <tr>
                            <th>No</th>
                            <th>Nama Perusahaan</th>
                            <th>St. Perusahaan</th>
                            <th>email</th>
                            <th>Telepon</th>
                            <th>Terdaftar</th>
                            <th>Piihan</th>
                          </tr>
                        </center>
                  </thead>
                  <tbody>
                  <?php
            $a = perusahaan();
            $no = 1;
            foreach ($a as $key => $data) {
                ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $data['nmPerusahaan']; ?></td>
                          <td><?php echo $data['stsPerusahaan']; ?></td>
                          <td><?php echo $data['email']; ?></td>
                          <td><?php echo $data['noTelp']; ?></td>
                          <td><?php echo $data['tglKerjasama']; ?></td>
                          <td>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#editPerusahaan" onclick="editablePerusahaan(this)" data-id="<?php echo $data['idPerusahaan'] . "~" . $data['nmPerusahaan'] . "~" . $data['email'] . "~" . $data['stsPerusahaan'] . "~" . $data['noTelp'] . "~" . $data['tglKerjasama']  ?>"  class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="?pages=perusahaanAksi&kode=<?php echo $data['idPerusahaan']; ?>"
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
<div id="jurusan" class="modal fade">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <label>Tambah Data Perusahaan</label>
      </div>
      <div class="modal-body">
        <form action="?pages=perusahaanAksi" method="post" enctype="multipart/form-data">

        <div class="form-group">
        <label>Nama Perusahaan </label>
        <input class="form-control" type="text" name="nmPerusahaan">
      </div>
        <div class="row" >
          
          <div class="col-6">
            <label>Status Perusahaan </label>
            <select name="statusPer" id="" class="form-control">
              <option value="">Pilih</option>
              <option value="BUMN">BUMN</option>
              <option value="Swasta">Swasta</option>
              <option value="CV">CV</option>
              <option value="Lainnya">Lainnya</option>
            </select>
          </div>

          <div class="col-6">
            <label>No Telepon </label>
            <input class="form-control" type="text" name="telepon">
          </div>

        </div>
        <div class="row" >
        <div class="col-6">
            <label>Email </label>
            <input class="form-control" type="text" name="email">
          </div>

          <div class="col-6">
            <label>Tanggal Kerjasama </label>
            <input class="form-control" type="date" name="tglKerjasama">
          </div>
        </div>
      <div class="row">
        <div class="col-6">
            <label>Username </label>
            <input class="form-control" type="text" name="username">
          </div>

          <div class="col-6">
            <label>password </label>
            <input class="form-control" type="text" name="password">
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
          </div>


<div class="modal" id="editPerusahaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <form action="?pages=perusahaanAksi" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <p class="text-center"><b>Edit Perusahaan</b></p>
          <hr>
          <div class="form-group">
        <label>Nama Perusahaan </label>
        <input class="form-control" type="hidden" name="idPerusahaan" id="editId">
        <input class="form-control" type="text" name="nmPerusahaan" id="editNm">
      </div>
        <div class="row" >
          
          <div class="col-6">
            <label>Status Perusahaan </label>
            <select name="status" id="editSts" class="form-control">
              <option value="">Pilih</option>
              <option value="BUMN">BUMN</option>
              <option value="Swasta">Swasta</option>
              <option value="CV">CV</option>
              <option value="Lainnya">Lainnya</option>
            </select>
          </div>

          <div class="col-6">
            <label>No Telepon </label>
            <input class="form-control" type="text" name="telepon" id="editTelp">
          </div>

        </div>
        <div class="row" >
        <div class="col-6">
            <label>Email </label>
            <input class="form-control" type="text" name="email" id="editEmail">
          </div>

          <div class="col-6">
            <label>Tanggal Kerjasama </label>
            <input class="form-control" type="date" name="tglKerjasama" id="editTgl">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="btnUBAH" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

</html>