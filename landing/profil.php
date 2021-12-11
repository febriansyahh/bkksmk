<body>
<header class="bg-blue ">
    <div class="container">
      <div class="row gx-3 justify-content-center">
        <div class="col-lg-6">
          <div class="text-center my-5">
          <img src="images/muh.png" width="100" height="100">
            <h3 class="display fw-bolder black-white mb-2" style="font-family: Poppins">SMK Muhammadiyah Kudus
            </h3>
            <p class="lead text-black-50 mb-4" style="font-family: Poppins"><b>Berprestasi, Berkarakter, Unggul Dalam IT yang Dilandasi Iman dan
                Taqwa</b></p>
            <!-- <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                            <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Get Started</a>
                            <a class="btn btn-outline-light btn-lg px-4" href="#!">Learn More</a>
                        </div> -->
          </div>
        </div>
      </div>
    </div>
  </header>
<section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">
        <h3><span>Tingkat Kejuruan</span></h3>
        <br>
        <div class="row">
        <?php
      include_once('koneksi.php');
      $dt = getJurusan();
      foreach ($dt as $key => $data) {
        ?>
          <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="fa fa-cogs"></i></div>
              <h4 class="title"><a href=""><?php echo $data['nmJurusan'] ?></a></h4>
              <p class="description" style="text-align: justify;"><?php echo $data['keterangan'] ?></p>
              <!-- <p class="description" style="text-align: justify;">Teknik Audio Video mengkhususkan pembahasan atau pembelajaran tentang hal-hal
            teknik elektronika yang berkait dengan suara (audio) dan gambar (video) yang diproses secara elektronik.</p> -->
            </div>
          </div>

          <!-- <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="bx bx-car"></i></div>
              <h4 class="title"><a href="">Teknik Kendaraan Ringan</a></h4>
              <p class="description" style="text-align: justify;">Teknik Kendaraan Ringan merupakan ilmu yang mempelajari tentang alat-alat
            transportasi darat yang menggunakan mesin, terutama mobil yang mulai berkembang sebagai cabang ilmu seiring
            dengan diciptakannya mesin mobil.</p>
            </div>
          </div> -->

          <!-- <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="bx bx-laptop"></i></div>
              <h4 class="title"><a href="">Teknik Komputer dan Jaringan</a></h4>
              <p class="description" style="text-align: justify;">Teknik Komputer dan Jaringan merupakan ilmu berbasis Teknologi Informasi dan
            Komunikasi terkait kemampuan algoritma, dan pemrograman komputer, perakitan komputer, perakitan jaringan
            komputer, dan pengoperasian perangkat lunak, dan internet.</p>
            </div>
          </div> -->
          <?php
          }
        ?>
        </div>

      </div>
    </section>

    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <h3><span>Kontak Kami</span></h3>
          <p>Untuk informasi lebih lanjut dapat menghubungi kontak kami dibawah ini.</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Alamat Sekolah</h3>
              <p>Jl. Kudus - Jepara No.KM.3, Bendaran, Prambatan Lor, Kec. Kaliwungu,<br>
              Kabupaten Kudus, Jawa Tengah
                    59361</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>smkmuh_kudus@yahoo.com</p>
              <p>admin@smkmuhkudus.sch.id</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Phone</h3>
              <p>(0291) 434330</p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->

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