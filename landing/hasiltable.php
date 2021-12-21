<body>
  <section style="font-family: Poppins">
    <div class="container">
      <div class="span4">
        <h5>Info<strong> Hasil Penerimaan Lowongan</strong></h5>
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
      <th scope="col">Tanggal Rilis </th>
      <th scope="col">Keterangan</th>
      <th scope="col">Opsi</th>
    </tr>
  </thead>
  <tbody>
  <?php
        include_once("koneksi.php");
        $no=1;
        $dt = getHasilAll();
        foreach ($dt as $key => $data) {
    ?>
                    <tr>
                      <td scope="row"><?php echo $no; ?></td>
                      <td><?php echo $data['noLoker']; ?></td>
                      <td><?php echo $data['perusahaan']; ?></td>
                      <td><?php echo $data['nmLoker']; ?></td>
                      <td><?php echo date("d M Y", strtotime($data['tglInput'])); ?></td>
                      <td><?php echo $data['keterangan']; ?></td>
                      <td>
                      <span style="color:blue"><a href=<?php echo "file_data/hasil/".$data['file']?> class="btn btn-primary btn-sm" target="_blank">Unduh</a></span>
                      </td>
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
