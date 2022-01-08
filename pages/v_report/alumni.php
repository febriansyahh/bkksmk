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
            <h3 class="card-title">Laporan Alumni</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <form method='POST' action='./pages/laporan/alumni.php'>
              <div class="input-group mb-3">
                <label for=""> Pilih Tahun : </label> &nbsp;
                <select name="status" class="form-select" id="inputGroupSelect02" style="width:20%;">
                <option value="NULL">- Pilih -</option>
                <option value="Bekerja">Bekerja</option>
                <option value="Studi">Studi</option>
              </select>
              &nbsp;
                <select name="tahun" class="form-select" id="inputGroupSelect02" style="width:20%;">
                <option value="NULL">- Pilih -</option>
                <?php
                $dt = getYearAlumni();
                foreach ($dt as $value) {
                  echo '<option value="'.$value['tahun'].'">'.$value['tahun'].'</option>';
                }
              ?>
              </select>
              &nbsp;
                <input type="submit" name="submit" formtarget="_blank" class="btn btn-primary"value="Cetak" />
              </div>
            </form>
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
                  </tr>
                </center>
              </thead>
              <tbody>
                <?php
            $a = getAlumni();
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

  </html>
