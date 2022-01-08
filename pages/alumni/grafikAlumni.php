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
              <select name="jurusan" id="filter" style="width:20%;"required>
                <option value="" selected="selected">Pilih Jurusan</option>
                <?php
                $dt = getJurusan();
                foreach ($dt as $value) {
                  echo '<option value="'.$value['idJurusan'].'">'.$value['nmJurusan'].'</option>';
                }
              ?>
              </select>&nbsp;
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
            $jur = $_POST['jurusan'];
            $tahun = $_POST['tahun'];
            if($jur && $tahun != ''){
            $sql_tampil = mysqli_query($con,"SELECT a.idAlumni, b.nisn, a.nmInstansi, a.status, b.nama, c.nmJurusan, b.noTelp, a.thnLulus FROM alumni a, siswa b, jurusan c WHERE a.nisn=b.nisn AND b.jurusan=c.idJurusan AND a.thnLulus = '$tahun' AND c.idJurusan= '$jur' ORDER BY a.thnLulus ASC");
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
    <h3 style="font-family: Poppins">Grafik Perkembangan Alumni</h3>
    <?php
    $jur = $_POST['jurusan'];
    $tahun = $_POST['tahun'];
    if($jur && $tahun != ''){ 
    ?>
    <div style="width: 700px;height: 300px">
		<canvas id="myChart"></canvas>
	</div>
    <?php
    }else{
    ?>
    <div style="width: 700px;height: 300px">
		<canvas id="myChart1"></canvas>
	</div>
    <?php
    }
    ?>
  </center>
  </body>
  <script src="js/main.js"></script>
  <script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: [
          <?php
          $jur = $_POST['jurusan'];
          $tahun = $_POST['tahun'];
          if($jur && $tahun != ''){ 
            echo $tahun;
          }else{
            $sql = "SELECT DISTINCT(thnLulus) AS year FROM alumni GROUP BY thnLulus ORDER BY thnLulus DESC LIMIT 1 ";
            $query = mysqli_query($con, $sql);
            $row = mysqli_fetch_row($query);
            $tahunPertama = $row[0];
                echo $tahunPertama;
          }
					?>
          , 
          ],
				datasets: [{
					label: 'Jumlah alumni per tahun',
					data: [
					<?php
          $jur = $_POST['jurusan'];
          $tahun = $_POST['tahun'];
          if($jur && $tahun != ''){ 
					$jumlah_teknik = mysqli_query($con,"SELECT a.idAlumni, b.nisn, a.nmInstansi, a.status, b.nama, c.nmJurusan, b.noTelp, a.thnLulus FROM alumni a, siswa b, jurusan c WHERE a.nisn=b.nisn AND b.jurusan=c.idJurusan AND a.thnLulus = '$tahun' AND c.idJurusan= '$jur' ORDER BY a.thnLulus ASC");
          }else{
					$jumlah_teknik = mysqli_query($con,"SELECT * FROM alumni where thnLulus='$tahunPertama'");
          }
					echo mysqli_num_rows($jumlah_teknik);
					?>, 
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)'
					// 'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)'
					// 'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
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
 <script>
		var ctx = document.getElementById("myChart1").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: [
          <?php 
					 $sql = "SELECT DISTINCT(thnLulus) AS year FROM alumni ORDER BY thnLulus DESC LIMIT 2,999999 ";
           $query = mysqli_query($con, $sql);
           $row = mysqli_fetch_row($query);
          $tahunPertama = $row[0];
              echo $tahunPertama;
					?>
          , 
          <?php 
					 $sql = "SELECT DISTINCT(thnLulus) AS year FROM alumni ORDER BY thnLulus DESC LIMIT 1,999999 ";
           $query = mysqli_query($con, $sql);
           $row = mysqli_fetch_row($query);
              $tahunKedua = $row[0];
              echo $tahunKedua;
					?>,
          <?php 
					 $sql = "SELECT DISTINCT(thnLulus) AS year FROM alumni GROUP BY thnLulus ORDER BY thnLulus DESC LIMIT 1 ";
           $query = mysqli_query($con, $sql);
           $row = mysqli_fetch_row($query);
              $tahunKetiga = $row[0];
              echo $tahunKetiga;
					?>, 
          ],
				datasets: [{
					label: 'Jumlah Alumni',
					data: [
					<?php 
					$jumlah_teknik = mysqli_query($con,"SELECT * FROM alumni where thnLulus='$tahunPertama'");
					echo mysqli_num_rows($jumlah_teknik);
					?>, 
					<?php 
					$jumlah_ekonomi = mysqli_query($con,"SELECT * FROM alumni where thnLulus='$tahunKedua'");
					echo mysqli_num_rows($jumlah_ekonomi);
					?>, 
					<?php 
					$jumlah_fisip = mysqli_query($con,"SELECT * FROM alumni where thnLulus='$tahunKetiga'");
					echo mysqli_num_rows($jumlah_fisip);
					?>, 
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)'
					// 'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)'
					// 'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
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
