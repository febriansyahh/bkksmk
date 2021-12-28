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
            <h3 class="card-title">Grafik Data Alumni BKK Bekerja 3 Tahun Terakhir</h3>
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
                    <th>Instansi</th>
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

  <center>
    <h5 style="font-family: Poppins">Grafik Perkembangan Alumni Bekerja</h5>
    <br>
    <div class="row" style="width:auto; padding-left: 2%;">
      <div style="width: 500px;height: 500px">
        <canvas id="myChart"></canvas>
      </div>
    
      <div style="width: 500px;height: 500px">
        <canvas id="myChart2"></canvas>
      </div>
    </div>
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
					 $sql = "SELECT DISTINCT(thnLulus) AS year FROM alumni ORDER BY thnLulus DESC LIMIT 2,999999 ";
           $query = mysqli_query($con, $sql);
           $row = mysqli_fetch_row($query);
          $tahunPertamas = $row[0];
              echo $tahunPertamas;
					?>
          , 
          <?php 
					 $sql = "SELECT DISTINCT(thnLulus) AS year FROM alumni ORDER BY thnLulus DESC LIMIT 1,999999 ";
           $query = mysqli_query($con, $sql);
           $row = mysqli_fetch_row($query);
              $tahunKeduas = $row[0];
              echo $tahunKeduas;
					?>,
          <?php 
					 $sql = "SELECT DISTINCT(thnLulus) AS year FROM alumni GROUP BY thnLulus ORDER BY thnLulus DESC LIMIT 1 ";
           $query = mysqli_query($con, $sql);
           $row = mysqli_fetch_row($query);
              $tahunKetigas = $row[0];
              echo $tahunKetigas;
					?>, 
          ],
				datasets: [{
					label: 'Jumlah Siswa Diterima dari lowongan BKK',
					data: [
					<?php 
					$jumlah_teknik = mysqli_query($con,"SELECT a.idDaftar FROM pendaftaran a, siswa b, alumni c WHERE a.idAnggota=b.idSiswa AND c.nisn=b.nisn AND a.status='4' AND c.thnLulus='$tahunPertamas' ");
					echo mysqli_num_rows($jumlah_teknik);
					?>, 
					<?php 
					$jumlah_ekonomi = mysqli_query($con,"SELECT a.idDaftar FROM pendaftaran a, siswa b, alumni c WHERE a.idAnggota=b.idSiswa AND c.nisn=b.nisn AND a.status='4' AND c.thnLulus='$tahunKeduas' ");
					echo mysqli_num_rows($jumlah_ekonomi);
					?>, 
					<?php 
					$jumlah_fisip = mysqli_query($con,"SELECT a.idDaftar FROM pendaftaran a, siswa b, alumni c WHERE a.idAnggota=b.idSiswa AND c.nisn=b.nisn AND a.status='4' AND c.thnLulus='$tahunKetigas' ");
					echo mysqli_num_rows($jumlah_fisip);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
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
		var ctx = document.getElementById("myChart2").getContext('2d');
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
					label: 'Jumlah Siswa Diterima dari lowongan Luar BKK',
					data: [
					<?php 
					$jumlah_teknik = mysqli_query($con,"SELECT * FROM `alumni` WHERE status='Bekerja' AND nisn NOT IN (SELECT b.nisn FROM pendaftaran a, siswa b WHERE a.idAnggota=b.idSiswa AND a.status='4') AND thnLulus='$tahunPertama'");
					echo mysqli_num_rows($jumlah_teknik);
					?>, 
					<?php 
					$jumlah_ekonomi = mysqli_query($con,"SELECT * FROM `alumni` WHERE status='Bekerja' AND nisn NOT IN (SELECT b.nisn FROM pendaftaran a, siswa b WHERE a.idAnggota=b.idSiswa AND a.status='4') AND thnLulus='$tahunKedua'");
					echo mysqli_num_rows($jumlah_ekonomi);
					?>, 
					<?php 
					$jumlah_fisip = mysqli_query($con,"SELECT * FROM `alumni` WHERE status='Bekerja' AND nisn NOT IN (SELECT b.nisn FROM pendaftaran a, siswa b WHERE a.idAnggota=b.idSiswa AND a.status='4') AND thnLulus='$tahunKetiga'");
					echo mysqli_num_rows($jumlah_fisip);
					?>, 
					<?php 
					$jumlah_pertanian = mysqli_query($con,"SELECT * FROM siswa where jekel='Wanita'");
					echo mysqli_num_rows($jumlah_pertanian);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
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
