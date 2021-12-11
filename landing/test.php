<body>
  <section style="font-family: Poppins">
    <div class="container">
      <div class="span4">
        <h5>Info<strong> Jadwal Tes Seleksi</strong></h5>
      </div>
    </div>
    <br>
    <div class="container" >
    <table class="table">
  <thead bgcolor="light-blue" style="color: white;">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode Lowongan</th>
      <th scope="col">Perusahaan</th>
      <th scope="col">Lowongan</th>
      <th scope="col">Tanggal </th>
      <th scope="col">Tempat</th>
      <th scope="col">Waktu</th>
    </tr>
  </thead>
  <tbody>
  <?php
        include_once("koneksi.php");
        $no=1;
        $dt = getDateTest();
        foreach ($dt as $key => $data) {
    ?>
                    <tr>
                      <td scope="row"><?php echo $no; ?></td>
                      <td><?php echo $data['noLoker']; ?></td>
                      <td><?php echo $data['perusahaan']; ?></td>
                      <td><?php echo $data['nmLoker']; ?></td>
                      <td><?php echo date("d M Y", strtotime($data['tglSeleksi'])); ?></td>
                      <td><?php echo $data['tempat']; ?></td>
                      <td><?php echo $data['waktu']; ?></td>
                    </tr>
                    <?php
        $no++;
        }
    ?>
  </tbody>
</table>


    </div>
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

</body>

</html>
