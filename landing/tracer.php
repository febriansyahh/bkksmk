<body>
  <section style="font-family: Poppins">
    <div class="container">
      <div class="span4">
        <h5>Info<strong> Penerimaan Alumni Bekerja</strong></h5>
      </div>
    </div>
    <br>
    <div class="container">
    <div class="card-body">
    <table id="example3" class="table table-bordered table-hover">
        <thead>
          <center>
            <tr>
              <th>No</th>
              <th>Nama </th>
              <th>Jurusan</th>
              <th>Status</th>
              <th>Institusi</th>
              <th>Tahun Lulus</th>
            </tr>
          </center>
        </thead>
        <tbody>
          <?php
        include_once("koneksi.php");
        $no=1;
        $a = getAlumniKerja();
            foreach ($a as $key => $data) {
                ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['nmJurusan']; ?></td>
            <td><?php echo $data['status']; ?></td>
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
    </div>
  </section>
  <section>
    <center>
    <h3>Grafik Perkembangan Alumni Bekerja</h3>
  <div style="width: 700px;height: 700px">
		<canvas id="myChart"></canvas>
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
          "2018", "2019", "2020"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$jumlah_teknik = mysqli_query($con,"SELECT * FROM alumni where `status` = 'Bekerja' AND thnLulus = '2018'");
					echo mysqli_num_rows($jumlah_teknik);
					?>, 
					<?php 
					$jumlah_ekonomi = mysqli_query($con,"SELECT * FROM alumni where `status` = 'Bekerja' AND thnLulus = '2019' ");
					echo mysqli_num_rows($jumlah_ekonomi);
					?>, 
					<?php 
					$jumlah_fisip = mysqli_query($con,"SELECT * FROM alumni where `status` = 'Bekerja' AND thnLulus = '2020' ");
					echo mysqli_num_rows($jumlah_fisip);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					// 'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					// 'rgba(255, 206, 86, 1)',
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
   <!-- labels: [
          <?php 
					$tahunPertama = mysqli_query($con,"SELECT DISTINCT(thnLulus) AS year FROM alumni ORDER BY thnLulus DESC LIMIT 1");
					echo mysqli_num_rows($tahunPertama);
					?>, 
          <?php 
					$tahunKedua = mysqli_query($con,"SELECT DISTINCT(thnLulus) AS year FROM alumni ORDER BY thnLulus DESC LIMIT 2,1");
					echo mysqli_num_rows($tahunKedua);
					?>,
          <?php 
					$tahunKetiga = mysqli_query($con,"SELECT DISTINCT(thnLulus) AS year FROM alumni GROUP BY thnLulus ORDER BY thnLulus DESC LIMIT 2,999999");
					echo mysqli_num_rows($tahunKetiga);
					?>], -->
</body>

</html>
