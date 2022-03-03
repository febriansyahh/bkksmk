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
                  <option value="">- Pilih -</option>
                  <?php
                $dt = getMonthLowonganPerusahaan($data_idUser);
                foreach ($dt as $value) {
                  switch ($value['bulan'])
                  {
                    case '01' :
                      echo '<option value="'.$value['bulan'].'">Januari</option>';
                    break;
                    case '02' :
                      echo '<option value="'.$value['bulan'].'">Februari</option>';
                    break;
                    case '03' :
                      echo '<option value="'.$value['bulan'].'">Maret</option>';
                    break;
                    case '04' :
                      echo '<option value="'.$value['bulan'].'">April</option>';
                    break;
                    case '05' :
                      echo '<option value="'.$value['bulan'].'">Mei</option>';
                    break;
                    case '06' :
                      echo '<option value="'.$value['bulan'].'">Juni</option>';
                    break;
                    case '07' :
                      echo '<option value="'.$value['bulan'].'">Juli</option>';
                    break;
                    case '08' :
                      echo '<option value="'.$value['bulan'].'">Agustus</option>';
                    break;
                    case '09' :
                      echo '<option value="'.$value['bulan'].'">September</option>';
                    break;
                    case '10' :
                      echo '<option value="'.$value['bulan'].'">Oktober</option>';
                    break;
                    case '11' :
                      echo '<option value="'.$value['bulan'].'">November</option>';
                    break;
                    case '12' :
                      echo '<option value="'.$value['bulan'].'">Desember</option>';
                    break;
                  }
                }
              ?>
                </select>
                &nbsp;
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
            <a href="" data-toggle="modal" data-target="#cari" class="btn btn-primary btn-sm"> Cari Laporan</a>
            <a href="" data-toggle="modal" data-target="#cetak" class="btn btn-primary btn-sm"> Cetak Laporan</a>
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
                $bulan = $_POST['bulan'];
                if($bulan != ''){
                  $a = reportLowongans($bulan); 
                }else{
                  $a = reportLowongan();
                }
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

  <div id="cari" class="modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h6 class="modal-title" style="font-family: Poppins">Laporan Lowongan</h6>
        </div>
        <div class="modal-body">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="input-group mb-3">
              <label for=""> Bulan : </label> &nbsp;
              <select name="bulan" class="form-select" id="inputGroupSelect02" style="width:70%;">
                <option value="" selected="selected">- Pilih -</option>
                <?php
                $dt = getMonthLowongan();
                foreach ($dt as $value) {
                  switch ($value['bulan'])
                  {
                    case '01' :
                      echo '<option value="'.$value['bulan'].'">Januari</option>';
                    break;
                    case '02' :
                      echo '<option value="'.$value['bulan'].'">Februari</option>';
                    break;
                    case '03' :
                      echo '<option value="'.$value['bulan'].'">Maret</option>';
                    break;
                    case '04' :
                      echo '<option value="'.$value['bulan'].'">April</option>';
                    break;
                    case '05' :
                      echo '<option value="'.$value['bulan'].'">Mei</option>';
                    break;
                    case '06' :
                      echo '<option value="'.$value['bulan'].'">Juni</option>';
                    break;
                    case '07' :
                      echo '<option value="'.$value['bulan'].'">Juli</option>';
                    break;
                    case '08' :
                      echo '<option value="'.$value['bulan'].'">Agustus</option>';
                    break;
                    case '09' :
                      echo '<option value="'.$value['bulan'].'">September</option>';
                    break;
                    case '10' :
                      echo '<option value="'.$value['bulan'].'">Oktober</option>';
                    break;
                    case '11' :
                      echo '<option value="'.$value['bulan'].'">November</option>';
                    break;
                    case '12' :
                      echo '<option value="'.$value['bulan'].'">Desember</option>';
                    break;

                  }
                }
              ?>
              </select>
              &nbsp;
              <input type="submit" class="btn btn-primary" name="btnFilter" value="Cari">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div id="cetak" class="modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h6 class="modal-title" style="font-family: Poppins">Laporan Lowongan</h6>
        </div>
        <div class="modal-body">
          <form method='POST' action='./pages/laporan/lowongan.php'>
            <div class="input-group mb-3">
              <label for=""> Bulan : </label> &nbsp;
              <select name="bulan" class="form-select" id="inputGroupSelect02" style="width:70%;">
                <option value="" selected="selected">- Pilih -</option>
                <?php
                $dt = getMonthLowongan();
                foreach ($dt as $value) {
                  switch ($value['bulan'])
                  {
                    case '01' :
                      echo '<option value="'.$value['bulan'].'">Januari</option>';
                    break;
                    case '02' :
                      echo '<option value="'.$value['bulan'].'">Februari</option>';
                    break;
                    case '03' :
                      echo '<option value="'.$value['bulan'].'">Maret</option>';
                    break;
                    case '04' :
                      echo '<option value="'.$value['bulan'].'">April</option>';
                    break;
                    case '05' :
                      echo '<option value="'.$value['bulan'].'">Mei</option>';
                    break;
                    case '06' :
                      echo '<option value="'.$value['bulan'].'">Juni</option>';
                    break;
                    case '07' :
                      echo '<option value="'.$value['bulan'].'">Juli</option>';
                    break;
                    case '08' :
                      echo '<option value="'.$value['bulan'].'">Agustus</option>';
                    break;
                    case '09' :
                      echo '<option value="'.$value['bulan'].'">September</option>';
                    break;
                    case '10' :
                      echo '<option value="'.$value['bulan'].'">Oktober</option>';
                    break;
                    case '11' :
                      echo '<option value="'.$value['bulan'].'">November</option>';
                    break;
                    case '12' :
                      echo '<option value="'.$value['bulan'].'">Desember</option>';
                    break;
                  }
                }
              ?>
              </select>
              &nbsp;
              <input type="submit" name="btnCetak" formtarget="_blank" class="btn btn-primary" value="Cetak" />
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
