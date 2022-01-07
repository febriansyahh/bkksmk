<?php	
include_once("koneksi.php");
error_reporting();
    ?>
<div class="form-group">
  <br>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
			<form action="" method="post" enctype="multipart/form-data">
            <div class="input-group mb-3">
              <select name="jurusan" id="filter" style="width:20%;">
                <option value="">Pilih Jurusan</option>
                <?php
                $dt = getJurusan();
                foreach ($dt as $value) {
                  echo '<option value="'.$value['idJurusan'].'">'.$value['nmJurusan'].'</option>';
                }
              ?>
              </select>&nbsp;
              <select name="tahun" id="filter" style="width:20%;">
                <option value="">Pilih Tahun</option>
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
            <h3 class="card-title">Grafik Data Alumni BKK Bekerja 3 Tahun Terakhir</h3>
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
            // $no = 1;
            // foreach ($a as $key => $data) {
							$no = 1;
							$jur = $_POST['jurusan'];
							$tahun = $_POST['tahun'];
							if($jur && $tahun != ''){
							$sql_tampil = mysqli_query($con,"SELECT a.idAlumni, b.nisn, a.nmInstansi, a.status, b.nama, c.nmJurusan, b.noTelp, a.thnLulus FROM alumni a, siswa b, jurusan c WHERE a.nisn=b.nisn AND b.jurusan=c.idJurusan AND a.status='Bekerja' AND a.thnLulus = '$tahun' AND c.idJurusan= '$jur' ORDER BY a.thnLulus ASC");
							}else{
								$sql_tampil = mysqli_query($con,"SELECT a.idAlumni, b.nisn, a.nmInstansi, a.status, b.nama, c.nmJurusan, b.noTelp, a.thnLulus FROM alumni a, siswa b, jurusan c WHERE a.nisn=b.nisn AND b.jurusan=c.idJurusan AND a.status='Bekerja' ORDER BY a.thnLulus ASC");
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
          ],
				datasets: [{
					label: 'Jumlah Siswa Diterima dari lowongan BKK',
					data: [
					// 	<?php
          // $jur = $_POST['jurusan'];
          // $tahun = $_POST['tahun'];
          // if($jur && $tahun != ''){ 
					// $jumlah_teknik = mysqli_query($con,"SELECT a.idDaftar, d.nmJurusan FROM pendaftaran a, siswa b, alumni c, jurusan d WHERE a.idAnggota=b.idSiswa AND c.nisn=b.nisn AND b.jurusan=d.idJurusan AND a.status='4' AND c.thnLulus = '$tahun' AND d.idJurusan= '$jur' ORDER BY c.thnLulus ASC");
          // }else{
					// $jumlah_teknik = mysqli_query($con,"SELECT * FROM alumni where thnLulus='$tahunPertama'");
          // }
					// echo mysqli_num_rows($jumlah_teknik);
					// ?>
					// <?php 
					// $jumlah_teknik = mysqli_query($con,"SELECT a.idDaftar FROM pendaftaran a, siswa b, alumni c WHERE a.idAnggota=b.idSiswa AND c.nisn=b.nisn AND a.status='4' AND c.thnLulus='$tahunPertamas' ");
					// echo mysqli_num_rows($jumlah_teknik);
					// ?>, 
					// <?php 
					// $jumlah_ekonomi = mysqli_query($con,"SELECT a.idDaftar FROM pendaftaran a, siswa b, alumni c WHERE a.idAnggota=b.idSiswa AND c.nisn=b.nisn AND a.status='4' AND c.thnLulus='$tahunKeduas' ");
					// echo mysqli_num_rows($jumlah_ekonomi);
					// ?>, 
					// <?php 
					// $jumlah_fisip = mysqli_query($con,"SELECT a.idDaftar FROM pendaftaran a, siswa b, alumni c WHERE a.idAnggota=b.idSiswa AND c.nisn=b.nisn AND a.status='4' AND c.thnLulus='$tahunKetigas' ");
					// echo mysqli_num_rows($jumlah_fisip);
					// ?>
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
          ],
				datasets: [{
					label: 'Jumlah Siswa Diterima dari lowongan Luar BKK',
					data: [
						<?php
          $jur = $_POST['jurusan'];
          $tahun = $_POST['tahun'];
          if($jur && $tahun != ''){ 
					$jumlah_teknik = mysqli_query($con,"SELECT aa.*, bb.jurusan, cc.nmJurusan FROM alumni aa, siswa bb, jurusan cc WHERE aa.nisn=bb.nisn AND bb.jurusan=cc.idJurusan AND aa.status='Bekerja' AND aa.nisn NOT IN (SELECT b.nisn FROM pendaftaran a, siswa b WHERE a.idAnggota=b.idSiswa AND a.status='4') AND aa.thnLulus = '$tahun' AND cc.idJurusan= '$jur' ORDER BY aa.thnLulus ASC");
          }else{
					$jumlah_teknik = mysqli_query($con,"SELECT * FROM `alumni` WHERE status='Bekerja' AND nisn NOT IN (SELECT b.nisn FROM pendaftaran a, siswa b WHERE a.idAnggota=b.idSiswa AND a.status='4') AND thnLulus='$tahunPertama");
          }
					echo mysqli_num_rows($jumlah_teknik);
					?>
					// <?php 
					// $jumlah_teknik = mysqli_query($con,"SELECT * FROM `alumni` WHERE status='Bekerja' AND nisn NOT IN (SELECT b.nisn FROM pendaftaran a, siswa b WHERE a.idAnggota=b.idSiswa AND a.status='4') AND thnLulus='$tahunPertama'");
					// echo mysqli_num_rows($jumlah_teknik);
					// ?>, 
					// <?php 
					// $jumlah_ekonomi = mysqli_query($con,"SELECT * FROM `alumni` WHERE status='Bekerja' AND nisn NOT IN (SELECT b.nisn FROM pendaftaran a, siswa b WHERE a.idAnggota=b.idSiswa AND a.status='4') AND thnLulus='$tahunKedua'");
					// echo mysqli_num_rows($jumlah_ekonomi);
					// ?>, 
					// <?php 
					// $jumlah_fisip = mysqli_query($con,"SELECT * FROM `alumni` WHERE status='Bekerja' AND nisn NOT IN (SELECT b.nisn FROM pendaftaran a, siswa b WHERE a.idAnggota=b.idSiswa AND a.status='4') AND thnLulus='$tahunKetiga'");
					// echo mysqli_num_rows($jumlah_fisip);
					// ?>, 
					// <?php 
					// $jumlah_pertanian = mysqli_query($con,"SELECT * FROM siswa where jekel='Wanita'");
					// echo mysqli_num_rows($jumlah_pertanian);
					// ?>
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
