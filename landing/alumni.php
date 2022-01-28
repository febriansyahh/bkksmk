<?php
        include_once("koneksi.php");
?>
<body>
  <section style="font-family: Poppins">
    <div class="container">
      <div class="span4">
        <h5>Info<strong> Perkembangan Alumni</strong></h5>
      </div>
    </div>
    <br><br><br>
    <center>
    <h3>Grafik Perkembangan Alumni</h3>
  <div style="width: 700px;height: 350px">
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
   <!-- labels: [
          <?php 
					$tahunPertama = mysqli_query($con,"SELECT DISTINCT(thnLulus) AS year FROM alumni ORDER BY thnLulus DESC LIMIT LIMIT 1,999999");
					echo mysqli_num_rows($tahunPertama);
					?>, 
          <?php 
					$tahunKedua = mysqli_query($con,"SELECT DISTINCT(thnLulus) AS year FROM alumni ORDER BY thnLulus DESC LIMIT LIMIT 2,999999");
					echo mysqli_num_rows($tahunKedua);
					?>,
          <?php 
					$tahunKetiga = mysqli_query($con,"SELECT DISTINCT(thnLulus) AS year FROM alumni GROUP BY thnLulus ORDER BY thnLulus DESC LIMIT 2,999999");
					echo mysqli_num_rows($tahunKetiga);
					?>], -->
</body>

</html>
