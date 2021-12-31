<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title >Bursa Kerja - SMK Muhammadiyah Kudus</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="images/muh.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="http://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="chartjs/Chart.js"></script>

  <!-- =======================================================
  * Template Name: BizLand - v3.5.0
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <!-- <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="d-flex align-items-center" style="font-family: Poppins"><a href="mailto:contact@example.com">Bertaqwa, Berprestasi, Mandiri dan Profesional</a></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
      </div>
    </div>
  </section> -->

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <h1 class="logo"><a href="index.php"><img src="assets/img/headerbgs.png" alt="" style="width: 100%;"><span></span></a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="?page=beranda">Beranda</a></li>
          <li><a class="nav-link scrollto" href="?page=profil">Profil</a></li>
          <li class="dropdown"><a href="#"><span>Informasi</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="?page=loker">Lowongan Kerja</a></li>
              <li><a href="?page=test">Jadwal Seleksi</a></li>
              <li><a href="?page=hasiltable">Hasil Seleksi</a></li>
              <li><a href="?page=perusahaan">Perusahaan Terdaftar</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Tracer</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="?page=alumni">Alumni</a></li>
              <li><a href="?page=tracer">Statisik Alumni</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="signin.php">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
        <div class="content-wrapper">
            
                <!-- Menjadikan halaman web dinamis, 
                dengan menjadikan halaman lain yang dipanggil sebagai sebuah konten dari index.php-->
                <?php 
                    if(isset($_GET['page'])){
                        $hal = $_GET['page'];
                
                        switch ($hal) {
                            case 'beranda':
                                include "landing/home.php";
                                break;
                            case 'registrasi':
                                include "landing/registrasi_aksi.php";
                                break;
                            case 'profil':
                                include "landing/profil.php";
                                break;
                            case 'loker':
                                include "landing/loker.php";
                                break;
                            case 'test':
                                include "landing/test.php";
                                break;
                            case 'hasil':
                                include "landing/hasil.php";
                                break;
                            case 'hasiltable':
                                include "landing/hasiltable.php";
                                break;
                            case 'alumniReg':
                                include "landing/alumniReg.php";
                                break;
                            case 'perusahaan':
                                include "landing/perTerdaftar.php";
                                break;
                            case 'alumni':
                                include "landing/alumni.php";
                                break;
                            case 'tracer':
                                include "landing/tracer.php";
                                break;
                            case 'login':
                                include "login.php";
                                break;
                            default:
                                echo "<center><h3> ERROR !</h3></center>";
                                break;    
                        }
                    }else{
                        include "landing/home.php";
                    }
                ?>
            
        </div>

  <!-- ======= Footer ======= -->
  
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">
    
          <div class="col-lg-4 col-md-6 footer-contact">
            <h4>Tautan</h4>
            <p style="font-family: Poppins">
              <a href="https://website.smkmuhikudus.sch.id/" target="_blank">Situs SMK Muhammadiyah</a><br>
              <a href="https://muhammadiyah.or.id/en/" target="_blank">Muhammadiyah</a><br>
              <a href="https://kuduskab.go.id/" target="_blank">Kab. Kudus</a><br>
              
            </p>
          </div>
    
          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Tautan Lainnya</h4>
            <p style="font-family: Poppins">
              <a href="https://www.kemdikbud.go.id/" target="_blank">Kemendikbud</a><br>
              <a href="https://kemenag.go.id/" target="_blank">Kemenag</a><br>
            </p>
          </div>
    
          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Contact Us </h4>
            <p style="font-family: Poppins">Jl. Kudus - Jepara No.KM.3, Bendaran, Prambatan Lor, Kec. Kaliwungu, Kudus <br>
                Jawa Tengah - Indonesia <br>
                Telp. +(0291) 441992<br>
                email. <a href="mailto:smkmuhikudus@gmail.com">smkmuhikudus@gmail.com</a> <br>
            </p>
            <div class="social-links mt-3">
              <a href="https://www.facebook.com/smkmuhikudus" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="https://twitter.com/smkmuhikudus" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="https://www.instagram.com/smkmuhikudus/" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="https://www.youtube.com/SMKMUHIKUDUS" target="_blank" class="google-plus"><i class="bx bxl-youtube"></i></a>
            </div>
          </div>
    
        </div>
      </div>
    </div>
    <!-- <footer id="footer"> -->
    <div class="container py-4" >
      <div class="copyright" style="text-align:center;">
        &copy; Copyright 2021 <strong><span><a href="index.php" style="color:white">SMK Muhammadiyah Kudus</a></span></strong>
      </div>
      <!-- <div class="credits"> -->
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
        <!-- Support <span>Eprints</span> -->
      </div>
    </div>
    </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="http://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> -->

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="js/main.js"></script>
  
</body>

</html>