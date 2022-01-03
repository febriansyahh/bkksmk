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
            <h3 class="card-title">Data Alumni Lanjut Studi</h3>
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
                    <th>Nama Perguruan</th>
                    <th>Tahun Lulus</th>
                    <th>Telp</th>
                    <th>Piihan</th>
                  </tr>
                </center>
              </thead>
              <tbody>
                <?php
            $a = getAlumniStudi();
            $no = 1;
            foreach ($a as $key => $data) {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['nisn']; ?></td>
                  <td><?php echo $data['nama']; ?></td>
                  <td><?php echo $data['nmJurusan']; ?></td>
                  <td><?php echo $data['nmInstansi']; ?></td>
                  <td><?php echo $data['thnLulus']; ?></td>
                  <td><?php echo $data['noTelp']; ?></td>
                  <td>
                    <!-- <a href="javascript:void(0)" data-toggle="modal" data-target="#editLoker"
                      data-id="<?php echo $data['id_alumni'] . "~" . $data['nisn'] . "~" . $data['nm_loker'] . "~" . $data['jekel']. "~" . $data['keterangan']. "~" . $data['sumber']. "~" . $data['tanggal']. "~" . $data['batas']. "~" . $data['status'] ?>"
                      onclick="editableLowongan(this)" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a> -->
                      <a href="?pages=alumni_aksi&kode=<?php echo $data['idAlumni']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
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
  <script src="js/main.js"></script>

</html>
