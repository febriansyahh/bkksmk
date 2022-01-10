<?php	
include_once("koneksi.php");
error_reporting();
error_reporting (E_ALL ^ E_NOTICE); 
    ?>
<div class="form-group">
  <br>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="input-group mb-3">
              <label for="">Pilih Tahun : &nbsp;</label>
              <select name="tahun" id="filter" style="width:20%;" required>
                <option value="" selected="selected">Pilih Tahun</option>
                <?php
                $dt = getYearAlumni();
                foreach ($dt as $value) {
                  echo '<option value="'.$value['tahun'].'">'.$value['tahun'].'</option>';
                }
              ?>
              </select>&nbsp;
              <input type="submit" class="btn btn-primary" name="btnFilter" value="Cari">
              <input type="submit" class="btn btn-primary" name="btnFilter" value="Reset">
            </div>
          </form>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"> Data Alumni</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <center>
                  <tr>
                    <th>No</th>
                    <th>Nama </th>
                    <th>Jurusan</th>
                    <th>Instansi</th>
                    <th>Tahun Lulus</th>
                  </tr>
                </center>
              </thead>
              <tbody>
                <?php
            // $a = getAlumni();
            // foreach ($a as $key => $data) {
              $no = 1;
            // $jur = $_POST['jurusan'];
            $tahun = $_POST['tahun'];
            if($tahun != ''){
            $sql_tampil = mysqli_query($con,"SELECT a.idAlumni, b.nisn, a.nmInstansi, a.status, b.nama, c.nmJurusan, b.noTelp, a.thnLulus FROM alumni a, siswa b, jurusan c WHERE a.nisn=b.nisn AND b.jurusan=c.idJurusan AND a.thnLulus = '$tahun' ORDER BY a.thnLulus ASC");
            }else{
              $sql_tampil = mysqli_query($con,"SELECT a.idAlumni, b.nisn, a.nmInstansi, a.status, b.nama, c.nmJurusan, b.noTelp, a.thnLulus FROM alumni a, siswa b, jurusan c WHERE a.nisn=b.nisn AND b.jurusan=c.idJurusan ORDER BY a.thnLulus ASC");
            }
            while($data = mysqli_fetch_array($sql_tampil)){
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['nama']; ?></td>
                  <td><?php echo $data['nmJurusan']; ?></td>
                  <td><?php echo $data['nmInstansi']; ?></td>
                  <td><?php echo $data['thnLulus']; ?></td>
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

  <center>
    <?php
    $tahun = $_POST['tahun'];
    if($tahun != ''){ 
      ?>
    <h3 style="font-family: Poppins">Grafik Perkembangan Alumni <?php echo $tahun ?></h3>
    <div style="width: 700px;height: 300px">
		<canvas id="myChart"></canvas>
	</div>
    <?php
    }else{
    ?>
    <h3 style="font-family: Poppins">Grafik Perkembangan Alumni</h3>
    <div style="width: 700px;height: 300px">
		<canvas id="myChart1"></canvas>
	</div>
    <?php
    }
    ?>
  </center>
  </body>
  <script src="js/main.js"></script>
  <?php
        $tahun = $_POST['tahun'];
        if($tahun != ''){ 
          $sql="SELECT c.nmJurusan, COUNT(a.idAlumni) as total FROM alumni a, siswa b, jurusan c WHERE a.nisn=b.nisn AND b.jurusan=c.idJurusan AND a.thnLulus='$tahun' GROUP BY c.nmJurusan ORDER BY a.thnLulus";
        }else{
        $sql="SELECT c.nmJurusan, COUNT(a.idAlumni) as total FROM alumni a, siswa b, jurusan c WHERE a.nisn=b.nisn AND b.jurusan=c.idJurusan GROUP BY c.nmJurusan ORDER BY a.thnLulus";
        }
        $filter=mysqli_query($con,$sql);
    while ($data = mysqli_fetch_array($filter)) {
        $jur=$data['nmJurusan'];
        $jurusan .= "'$jur'". ", ";

        $jum=$data['total'];
        $jmlh .= "$jum". ", ";
    }
    ?>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php echo $jurusan; ?>],
            datasets: [{
                label:'Alumni Siswa',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)','rgb(175, 238, 239)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jmlh; ?>]
            }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>

  <?php
        $sql="SELECT c.nmJurusan, COUNT(a.idAlumni) as total FROM alumni a, siswa b, jurusan c WHERE a.nisn=b.nisn AND b.jurusan=c.idJurusan  GROUP BY c.nmJurusan ORDER BY a.thnLulus";
        $hasil=mysqli_query($con,$sql);

    while ($data = mysqli_fetch_array($hasil)) {
        $jur=$data['nmJurusan'];
        $nama_jurusan .= "'$jur'". ", ";

        $jum=$data['total'];
        $jumlah .= "$jum". ", ";
    }
    ?>
<script>
    var ctx = document.getElementById('myChart1').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php echo $nama_jurusan; ?>],
            datasets: [{
                label:'Alumni Siswa',
                backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',	'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jumlah; ?>]
            }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>
</html>
