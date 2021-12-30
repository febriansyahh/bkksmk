<?php
include_once("koneksi.php");
if (isset($_POST['btnLogin'])) LoginUser();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bursa Kerja - SMK Muhammadiyah Kudus</title>
    <link href="images/muh.png" rel="icon">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-6">
                        <img src="assets/img/login.jpg" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="assets/img/loginbkk.png" alt="logo" class="logo">
                            </div>
                            <p class="login-card-description">Sign into your account</p>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="email" class="sr-only">Username</label>
                                    <input type="text" class="form-control" name="txtusm" placeholder="Username Login">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <!-- <input type="password" name="password" id="password" class="form-control" placeholder="***********"> -->
                                    <input type="password" class="form-control" name="txtpassword" placeholder="***********">
                                </div>
                                <input name="btnLogin" id="login" style="background-color: #2F4AAA;" class="btn btn-block login-btn mb-4" type="submit" value="Login">
                            </form>
                            <a href="index.php" class="forgot-password-link">Back to home page</a>
                            <p class="login-card-footer-text">Don't have an account? <a data-toggle="modal" data-target="#register" class="btn-get-started scrollto">Register here</a>
                            </p>
                            <!-- <nav class="login-card-footer-nav">
                                <a href="#!">Terms of use.</a>
                                <a href="#!">Privacy policy</a>
                            </nav> -->
                            <nav class="login-card-footer-nav">
                                <a href="#!">Copyright IT Support SMK Muhammadiyah.</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div id="register" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h6 class="modal-title">Register Anggota</h6>
        </div>
        <div class="modal-body">
          <form action="landing/registrasi_aksi.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>NISN</label>
              <input class="form-control" type="text" name="nisn" placeholder="Masukkan NISN anda">
            </div>

            <div class="form-group">
              <label>No WhatsApp</label>
              <input class="form-control " type="text" name="no_wa" placeholder="Masukkan Nomor WhatsApp anda (+6289xxxx)">
            </div>

            <div class="form-group">
              <label>Username</label>
              <input class="form-control " type="text" name="username" placeholder="Masukkan username">
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Password</label>
                  <input class="form-control " type="password" name="password" placeholder="Masukkan Username">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Confirm Password</label>
                  <input class="form-control " type="password" name="rePassword" placeholder="Masukkan Password">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <input class="btn btn-success" type="submit" name="btnSimpan" value="Simpan" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>