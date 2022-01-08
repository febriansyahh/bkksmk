<?php
session_start();
include_once("koneksi.php");
include_once("fpdf/fpdf.php");
if (isset($_SESSION['ses_username']) == "") {
  echo "<meta http-equiv='refresh' content='0;url=signin.php'>";
} else {
  $data_username = $_SESSION["ses_username"];
  $data_nama = $_SESSION["ses_nama"];
  $data_id = $_SESSION["ses_idDaftar"];
  $data_idUser = $_SESSION["ses_idUser"];
  $data_status = $_SESSION["ses_idLevel"];
}
// session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bursa Kerja - SMK Muhammadiyah Kudus</title>
  <link href="images/muh.png" rel="icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <script type="text/javascript" src="chartjs/Chart.js"></script>


</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/muh.png" alt="AdminLTELogo" height="60" width="60">
    </div> -->

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color:rgb(47, 107, 219)">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4 text-black" style="background-color:rgb(47, 107, 219);">
      <!-- Brand Logo -->
      <a href="indexAdm.php" class="brand-link">
        <img src="dist/img/muh.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">BKK SMK</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex text-black">
          <!-- <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div> -->
          <div class="info">
            <a href="#"><?php echo $data_nama ?> -
              <?php
                    switch ($data_status) {
                      case '1':
                        ?>
              <a href="#">Admin</a>
              <?php
                        break;
                      case '2':
                        ?>
              <a href="#">Anggota</a>
              <?php
                        break;
                      case '3':
                        ?>
              <a href="#">Ketua BKK</a>
              <?php
                        break;
                      case '4':
                        ?>
              <a href="#">Perusahaan</a>
              <?php
                        break;
                    }
                      ?>
            </a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <?php
        switch ($data_status) {
          case '1':
            ?>
            <li class="nav-item">
              <a href="?pages=beranda" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Beranda
                </p>
              </a>
            </li>
            <li class="nav-header">Master</li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Data Akademik
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?pages=siswa" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Kelola Siswa
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?pages=jurusan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Kelola Jurusan
                    </p>
                  </a>
                </li>
              </ul>
            <li class="nav-item">
              <a href="?pages=perusahaan" class="nav-link">
                <i class="nav-icon fas fa-building"></i>
                <p>
                  Data Perusahaan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?pages=lowongan" class="nav-link">
                <i class="nav-icon fas fa-briefcase"></i>
                <p>
                  Kelola Lowongan
                  <!-- <?php
                   $q_hit= cekLoker($data_idUser);
                    while($row = mysqli_fetch_array($q_hit)) {
                    if($row[0] != 0){
                    ?>
                  <span class="right badge badge-warning">New</span>
                  <?php
                    }
                    }
                    ?> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Kelola Alumni
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?pages=studi" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Alumni Studi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?pages=kerja" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Alumni Bekerja</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-header">Data</li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-briefcase"></i>
                <p>
                  Data Lowongan
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?pages=daftar" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pendaftar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?pages=history" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Riwayat Pendaftar</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-info"></i>
                <p>
                  Kelola Informasi
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?pages=jadwal" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Jadwal Seleksi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?pages=hasil" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Hasil Kelulusan</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Kelola User
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?pages=usrgroup" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>User group</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?pages=user" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>User Pengguna</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-header">Laporan</li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>
                  Laporan
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?pages=reportperusahaan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Perusahaan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?pages=reportalumni" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Alumni</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>
                  Laporan Rekrutmen
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                      <a href="?pages=reportlowongan" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lowongan</p>
                      </a>
                    </li>
              </ul>
            </li>
            <li class="nav-header">Logout</li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="modal" data-target="#logout"><i class="fas fa-sign-out"></i>
                <span>Logout</span></a></li>
            </li>
            <?php
                break;
              case '2':
                ?>
            <li class="nav-item">
              <a href="?pages=beranda" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Beranda
                </p>
              </a>
            </li>
            <li class="nav-header">Menu</li>
            <li class="nav-item">
              <a href="?pages=lowongan" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Lowongan Kerja
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="?pages=history" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Riwayat Pendaftaran</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-info"></i>
                <p>
                  Informasi
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?pages=jadwal" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Jadwal Seleksi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?pages=hasil" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Hasil Kelulusan</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Informasi Alumni
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?pages=grafikAlumni" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Alumni</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?pages=grafikTracer" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Alumni Bekerja</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- <?php
                   $q_hit= cekAlumni($data_idUser);
                    while($row = mysqli_fetch_array($q_hit)) {
                    if($row[0] != NULL){
                    ?>
            <li class="nav-item">
              <a href="?pages=beranda" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Data Alumni
                </p>
              </a>
            </li>
            <?php
                    }
                  }
                    ?> -->
            <li class="nav-header">Logout</li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="modal" data-target="#logout"><i class="fa fa-sign-out"></i>
                <span>Logout</span></a></li>
            </a>
            </li>
            <?php
                break;
                case '3':
                  ?>
            <li class="nav-item">
              <a href="?pages=beranda" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Beranda
                </p>
              </a>
            </li>
            <li class="nav-header">Master</li>
            <li class="nav-item">
              <a href="?pages=lowongan" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Kelola Lowongan
                  <!-- <?php
                   $q_hit= cekLoker($data_idUser);
                    while($row = mysqli_fetch_array($q_hit)) {
                    if($row[0] != 0){
                    ?>
                  <span class="right badge badge-warning">New</span>
                  <?php
                    }
                    }
                    ?> -->
                </p>
              </a>
            </li>
            <li class="nav-header">Data</li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Kelola Lowongan
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?pages=daftar" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pendaftar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?pages=history" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Riwayat Pendaftar</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tree"></i>
                <p>
                  Kelola Informasi
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?pages=jadwal" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Jadwal Seleksi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?pages=hasil" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Hasil Kelulusan</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-header">Laporan</li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>
                  Laporan
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?pages=reportperusahaan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Perusahaan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?pages=reportalumni" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Alumni</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
                  <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-file"></i>
                    <p>
                      Laporan Rekruitmen
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="?pages=reportlowongan" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lowongan</p>
                      </a>
                    </li>
                  </ul>
                </li>
            <li class="nav-header">Logout</li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="modal" data-target="#logout"><i class="fa fa-sign-out"></i>
                <span>Logout</span></a></li>
            </a>
            </li>
            <?php
                  break;

                  case '4':
                    ?>
            <li class="nav-item">
              <a href="?pages=beranda" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Beranda
                </p>
              </a>
            </li>
            <li class="nav-header">Master</li>
            <li class="nav-item">
              <a href="?pages=lowongan" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Kelola Lowongan
                  <!-- <?php
                   $q_hit= cekLoker($data_idUser);
                    while($row = mysqli_fetch_array($q_hit)) {
                    if($row[0] != 0 || $row[0] != 3){
                    ?>
                  <span class="right badge badge-warning">New</span>
                  <?php
                    }
                    }
                    ?> -->
                </p>
              </a>
            </li>
            <li class="nav-header">Data</li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-briefcase"></i>
                <p>
                  Data Lowongan
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?pages=daftar" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pendaftar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?pages=reportpendaftaran" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Riwayat Pendaftar</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tree"></i>
                <p>
                  Kelola Informasi
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?pages=jadwal" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Jadwal Seleksi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?pages=hasil" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Hasil Kelulusan</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>
                  Laporan
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?pages=reportlowongan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lowongan</p>
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a href="?pages=reportpendaftaran" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Riwayat Pendaftar</p>
                  </a>
                </li> -->
              </ul>
            </li>
            <li class="nav-header">Logout</li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="modal" data-target="#logout"><i class="fa fa-sign-out"></i>
                <span>Logout</span></a></li>
            </li>

            <?php
                    break;
              
        }
          ?>
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <div class="content-wrapper">
      <div class="container-fluid">
        <!-- Menjadikan halaman web dinamis, 
                dengan menjadikan halaman lain yang dipanggil sebagai sebuah konten dari index.php-->
        <?php 
                    if(isset($_GET['pages'])){
                        $hal = $_GET['pages'];
                
                        switch ($hal) {
                            case 'beranda':
                                include "pages/dashboard.php";
                                break;
                            case 'profile':
                                include "pages/profile.php";
                                break;
                            case 'siswa':
                                include "pages/siswa/siswa.php";
                                break;
                            case 'siswa_aksi':
                              include "pages/siswa/aksi.php";
                                break;
                            
                            case 'lowongan':
                              include "pages/loker/lowongan.php";
                              break;
                            case 'lokerAksi':
                              include "pages/loker/lowonganAksi.php";
                              break;

                            case 'studi':
                              include "pages/alumni/studi.php";
                              break;
                            case 'kerja':
                              include "pages/alumni/kerja.php";
                              break;
                              
                            case 'daftar':
                              include "pages/pendaftaran/daftar.php";
                              break;
                            case 'daftarAksi':
                              include "pages/pendaftaran/daftar_aksi.php";
                              break;
                            case 'valAksi':
                              include "pages/pendaftaran/validasi_daftar.php";
                              break;
                            case 'history':
                              include "pages/pendaftaran/history.php";
                              break;

                            case 'jadwal':
                              include "pages/informasi/jadwal.php";
                              break;
                            case 'jadwalAksi':
                              include "pages/informasi/jadwalAksi.php";
                              break;
                            case 'hasil':
                              include "pages/informasi/hasil.php";
                              break;
                            case 'hasilAksi':
                              include "pages/informasi/hasilAksi.php";
                              break;
                            
                            case 'cobaCetak':
                              include "pages/laporan/cetak.php";
                              break;

                            case 'jurusan':
                              include "pages/jurusan/jurusan.php";
                              break;
                            case 'jurusanAksi':
                              include "pages/jurusan/aksi.php";
                              break;

                            case 'perusahaan':
                              include "pages/perusahaan/view.php";
                              break;
                            case 'perusahaanAksi':
                              include "pages/perusahaan/aksi.php";
                              break;

                            case 'usrgroup':
                              include "pages/user/usrGroup.php";
                              break;
                            case 'groupAksi':
                              include "pages/user/usrGroupAksi.php";
                              break;

                            case 'alumni_aksi':
                              include "pages/alumni/aksi.php";
                              break;

                            case 'user':
                              include "pages/user/user.php";
                              break;
                            case 'userAksi':
                              include "pages/user/userAksi.php";
                              break;

                            case 'grafikAlumni':
                              include "pages/alumni/grafikAlumni.php";
                              break;
                            case 'grafikTracer':
                              include "pages/alumni/grafikTracer.php";
                              break;

                            case 'reportperusahaan' :
                              include "pages/v_report/perusahaan.php";
                              break;
                            case 'reportlowongan' :
                              include "pages/v_report/lowongan.php";
                              break;
                            case 'reportalumni' :
                              include "pages/v_report/alumni.php";
                              break;
                            case 'reportpendaftaran' :
                              include "pages/v_report/riwayat.php";
                              break;

                            default:
                            echo "<center><h3 style='font-family: Poppins'> Maaf Laman yang anda tuju tidak tersedia !</h3></center>";
                                break;    
                        }
                    }else{
                        include "pages/dashboard.php";
                    }
                ?>
      </div>
    </div>
    <!-- /.content-wrapper -->
    <!-- /.control-sidebar -->
  </div>
  <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih Log Out Jika ingin keluar.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="signin.php">Logout</a>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)

  </script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="dist/js/demo.js"></script> -->
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script src="js/main.js"></script>

</body>

</html>
