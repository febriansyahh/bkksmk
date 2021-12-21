<?php	
include_once("koneksi.php");
    ?>
<div class="form-group">
  <br>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <?php
          if($data_status == '4'){
          ?>
          <div class="card-header">
            <h3 class="card-title">Laporan Lowongan Perusahaan</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <form method='POST' action='./pages/laporan/lowonganperusahaan.php'>
              <div class="input-group mb-3">
                <label for=""> Pilih Tahun : </label> &nbsp;
                <select name="tahun" class="form-select" id="inputGroupSelect02" style="width:20%;">
                <option value="NULL">- Pilih -</option>
                <?php
                $dt = getYearLowonganPerusahaan($data_idUser);
                foreach ($dt as $value) {
                  echo '<option value="'.$value['tahun'].'">'.$value['tahun'].'</option>';
                }
              ?>
              </select>
                <input type="hidden" name="idPerusahaan" class="form-class" value="<?php echo $data_idUser ?>">
                <input type="submit" name="submit" formtarget="_blank" class="btn btn-primary" value="Cetak" />
              </div>
            </form>
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
                  </tr>
                </center>
              </thead>
              <tbody>
                <?php
            $a = reportLowonganperusahaan($data_idUser);
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
                </tr>
                <?php
            $no++;
            }
        ?>

              </tbody>
            </table>
          </div>
          <?php
          }else{
          ?>
          <div class="card-header">
            <h3 class="card-title">Laporan Lowongan</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <form method='POST' action='./pages/laporan/lowongan.php'>
              <div class="input-group mb-3">
                <label for=""> Pilih Tahun : </label> &nbsp;
                <select name="tahun" class="form-select" id="inputGroupSelect02" style="width:20%;">
                <option value="NULL">- Pilih -</option>
                <?php
                $dt = getYearLowongan();
                foreach ($dt as $value) {
                  echo '<option value="'.$value['tahun'].'">'.$value['tahun'].'</option>';
                }
              ?>
              </select>
                <input type="submit" name="submit" formtarget="_blank" class="btn btn-primary"value="Cetak" />
              </div>
            </form>
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
                  </tr>
                </center>
              </thead>
              <tbody>
                <?php
            $a = reportLowongan();
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
                </tr>
                <?php
            $no++;
            }
        ?>

              </tbody>
            </table>
          </div>
          <?php
          }
          ?>
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
