<?php
include_once("koneksi.php");
if (isset($_POST['btnLogin'])) LoginUser();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bursa Kerja - SMK Muhammadiyah Kudus</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
  <img src="dist/img/muh.png" width="70" height="70">
  <br>
    <h4 style="font-family: Poppins"> <a href="index.php"><b>BKK</b> SMK </a></h4>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body" style="border-radius: 25%;">
      <p class="login-box-msg" style="font-family: Poppins"><b>Masukkan Username & Password Anda</b></p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="txtusm" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="txtpassword" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-key"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
           
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-sm" name="btnLogin">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-0">
        <!-- <a href="landing/reg_perusahaan.php" class="text-center">Register Perusahaan</a> -->
        <a data-toggle="modal" data-target="#register" class="btn-get-started scrollto">Register Perusahaan</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<div id="register" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h6 class="modal-title">Register Perusahaan</h6>
        </div>
        <div class="modal-body">
          <form action="landing/registrasi_aksi.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label>Nama Perusahaan</label>
              <input class="form-control" type="text" name="namaper" placeholder="Masukkan Nama Perusahaan">
            </div>

            <div class="form-group">
              <label>Email</label>
              <input class="form-control " type="email" name="email" placeholder="Masukkan Alamat email">
            </div>
            
            <div class="form-group">
              <label>Status Perusahaan</label>
              <select name="status" id="" class="form-control">
                <option value="">-Pilih-</option>
                <option value="BUMN">BUMN</option>
                <option value="Swasta">Swasta</option>
                <option value="CV">CV</option>
                <option value="Lainnya">Lainnya</option>
              </select>
            </div>
            
            <div class="form-group">
              <label>No Telp</label>
              <input class="form-control" type="text" name="noTelp" placeholder="Masukkan No Telepon perusahaan">
            </div>

            <div class="form-group">
              <label>Username</label>
              <input class="form-control " type="text" name="username" placeholder="Masukkan username">
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Password</label>
                  <input class="form-control " type="password" name="password" placeholder="Masukkan Password">
                </div>
              </div>
              <div class="col-6">
              <div class="form-group">
              <label>Confirm Password</label>
              <input class="form-control " type="password" name="rePassword" placeholder="Masukkan Ulang Password">
            </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <input class="btn btn-success" type="submit" name="btnSimpans" value="Simpan" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
