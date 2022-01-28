<?php
        include_once("koneksi.php");
        ?>
<body>
  <section style="font-family: Poppins">
    <div class="container">
      <div class="span4">
        <h5>Info<strong> Perkembangan Alumni Bekerja</strong></h5>
      </div>
    </div>
    <br>
    <center>
    <h5>Grafik Perkembangan <br>Alumni Bekerja</h5>
  <div style="width: 700px;height: 450px">
		<canvas id="myChart"></canvas>
	</div>
	<br>
  <h5>Grafik Perkembangan <br>Alumni Bekerja Diluar BKK</h5>
  <div style="width: 700px;height: 300px">
		<canvas id="myChart2"></canvas>
	</div>
  </center>
   </section>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
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
					$jumlah_teknik = mysqli_query($con,"SELECT a.idDaftar FROM pendaftaran_loker a, siswa b, alumni c WHERE a.idAnggota=b.idSiswa AND c.nisn=b.nisn AND a.status='4' AND c.thnLulus='$tahunPertamas' ");
					echo mysqli_num_rows($jumlah_teknik);
					?>, 
					<?php 
					$jumlah_ekonomi = mysqli_query($con,"SELECT a.idDaftar FROM pendaftaran_loker a, siswa b, alumni c WHERE a.idAnggota=b.idSiswa AND c.nisn=b.nisn AND a.status='4' AND c.thnLulus='$tahunKeduas' ");
					echo mysqli_num_rows($jumlah_ekonomi);
					?>, 
					<?php 
					$jumlah_fisip = mysqli_query($con,"SELECT a.idDaftar FROM pendaftaran_loker a, siswa b, alumni c WHERE a.idAnggota=b.idSiswa AND c.nisn=b.nisn AND a.status='4' AND c.thnLulus='$tahunKetigas' ");
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
					$jumlah_teknik = mysqli_query($con,"SELECT * FROM `alumni` WHERE status='Bekerja' AND nisn NOT IN (SELECT b.nisn FROM pendaftaran_loker a, siswa b WHERE a.idAnggota=b.idSiswa AND a.status='4') AND thnLulus='$tahunPertama'");
					echo mysqli_num_rows($jumlah_teknik);
					?>, 
					<?php 
					$jumlah_ekonomi = mysqli_query($con,"SELECT * FROM `alumni` WHERE status='Bekerja' AND nisn NOT IN (SELECT b.nisn FROM pendaftaran_loker a, siswa b WHERE a.idAnggota=b.idSiswa AND a.status='4') AND thnLulus='$tahunKedua'");
					echo mysqli_num_rows($jumlah_ekonomi);
					?>, 
					<?php 
					$jumlah_fisip = mysqli_query($con,"SELECT * FROM `alumni` WHERE status='Bekerja' AND nisn NOT IN (SELECT b.nisn FROM pendaftaran_loker a, siswa b WHERE a.idAnggota=b.idSiswa AND a.status='4') AND thnLulus='$tahunKetiga'");
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
  <!-- SELECT * FROM pendaftaran a, siswa b, alumni c WHERE a.idAnggota=b.idSiswa AND c.nisn=b.nisn AND a.status='4' AND c.thnLulus='' -->
  <!-- SELECT b.nisn, c.nama FROM pendaftaran a, anggota b, siswa c WHERE a.idAnggota=b.idAnggota AND b.nisn=c.nisn -->
</body>

</html>
