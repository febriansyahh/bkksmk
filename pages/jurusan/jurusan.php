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
                  class="fas fa-plus-square"></i> Tambah Jurusan</a>
                <h3 class="card-title">Data Jurusan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                <thead>
                        <center>
                          <tr>
                            <th>No</th>
                            <th>Jurusan</th>
                            <th>Keterangan</th>
                            <th>Piihan</th>
                          </tr>
                        </center>
                  </thead>
                  <tbody>
                  <?php
            $a = jurusan();
            $no = 1;
            foreach ($a as $key => $data) {
                ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $data['nmJurusan']; ?></td>
                          <td><?php echo $data['keterangan']; ?></td>
                          <td>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#editSiswa" onclick="editableJurusan(this)" data-id="<?php echo $data['idJurusan'] . "~" . $data['nmJurusan'] . "~" . $data['keterangan']  ?>"  class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="?pages=jurusanAksi&kode=<?php echo $data['idJurusan']; ?>"
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
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Tambah Jurusan</h4>
      </div>
      <div class="modal-body">
        <form action="?pages=jurusanAksi" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <label>Nama Jurusan </label>
            <input class="form-control" type="text" name="nmJurusan" required>
          </div>

          <div class="form-group">
            <label>Keterangan</label>
            <textarea name="ket" id="" class="form-control" rows="3" required></textarea>
            <!-- <input class="form-control " type="text" name="ket"> -->
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
    <form action="?pages=jurusanAksi" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <h2 class="text-center"><b>Edit Jurusan</b></h2>
          <hr>
          <div class="form-group">
            <label for=""><b>Jurusan </b></label>
            <input class="form-control" type="hidden" id="editId"  name="idJurusan">
            <input class="form-control" type="text" id="editNm"  name="nmJurusan">
          </div>
          <div class="form-group">
            <label for=""><b>Keterangan </b></label>
            <!-- <input type="text" name="editNama" id="editNama" class="form-control"> -->
            <textarea name="ket" id="editKet" class="form-control" rows="3"></textarea>
          </div>
        <div class="modal-footer">
          <button type="submit" name="btnUBAH" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

</html>