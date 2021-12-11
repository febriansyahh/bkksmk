<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bursa Kerja - SMK Muhammadiyah Kudus</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="../assets/style.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="../assets/css/style.css" rel="stylesheet">

 
</head>

<body>
  
  
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <center>
        <h1 class="logo"><img src="../dist/img/muh.png" width="50" height="80"><br>
        <a href="index.php">SMK Muhammadiyah Kudus</a></h1>
      </center>
    </div>
    
    <div></div>
  </header><!-- End Header -->
  &nbsp;&nbsp;
  <section>
  <div class="container">
    <div class="title">Registrasi Perusahaan</div>
    <div class="content">
      <form action="#">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nama Perusahaan</span>
            <input type="text" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Alamat Perusahaan</span>
            <input type="text" placeholder="Enter your username" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Enter your username" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" placeholder="Enter your password" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register" name="btnDaftarPer">
          <a href="../login.php" class="form-control" style="text-align: center; background-color: yellow;">Kembali</a>
        </div>
      </form>
    </div>
  </div>
  </section>
  
  

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/purecounter/purecounter.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> -->

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script src="js/main.js"></script>

</body>

</html>
<?php
 include_once('../koneksi.php');
 $sqlAI = "SELECT `AUTO_INCREMENT` as id_AI FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'bkksmk' AND TABLE_NAME = 'perusahaan'";
 $query_cek = mysqli_query($con, $sqlAI);
 $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
 $date = date('Y-m-d');

 if (isset ($_POST['btnDaftarPer'])){
		$sql_simpan = "INSERT INTO user (namaPengguna, username, password, idLevel, idDaftar,status) VALUES (
                    '".$_POST['txtusername']."',
                    '".$_POST['txtnama']."',
					          '".$_POST['txtpassword']."',
                    '".$_POST['txtemail']."',
                    '".$_POST['txtalamat']."',
                    '".$data_cek['id_AI']."',
                    '".'Nonaktif'."');";
		$query_simpan = mysqli_query($konek,$sql_simpan);

		$sql_simpans = "INSERT INTO perusahaan (nm_perusahaan, alamat, email, no_hp, tgl_daftar) VALUES (
                    '".$_POST['nmPerusahaan']."',
                    '".$_POST['alamat']."',
					          '".$_POST['email']."',
                    '".$_POST['no_hp']."',
                    '".$date."')";
		$query_simpans = mysqli_query($konek,$sql_simpans);

        if ($query_simpan && $query_simpans) {
            echo "<script>alert('Registrasi Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=login.php'>";
        }else{
            echo "<script>alert('Proses Gagal')</script>";
        }
        //selesai proses simpan
    }
    ?>