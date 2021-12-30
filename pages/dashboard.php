<?php	
	 include_once("koneksi.php");
    ?>

<div class="form-group">

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h3 style="font-family: Poppins">
      Beranda
    </h3>

  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <?php
        switch ($data_status) {
          case '1':
            ?>
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php // menghitung
                    $sql_hitung = "SELECT COUNT(idLowongan) from lowongan where status ='2'";
                    $q_hit= mysqli_query($con, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0]."";
                    }
                    ?></h3>

              <p>Lowongan</p>
            </div>
            <div class="icon">
              <i class="ion ion-briefcase"></i>
            </div>
            <a href="?pages=lowongan" class="small-box-footer">Lihat selengkapnya <i
                class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php
                    $sql_hitung = "SELECT COUNT(nisn) from siswa";
                    $q_hit= mysqli_query($con, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0]."";
                    }
                    ?></h3>

              <p>Siswa</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="?pages=siswa" class="small-box-footer" style="color:white">Lihat selengkapnya <i
                class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php
                    $sql_hitung = "SELECT COUNT(idUser) from user";
                    $q_hit= mysqli_query($con, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0]."";
                    }
                    ?></h3>

              <p>User Aktif</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="?pages=user" class="small-box-footer">Lihat selengkapnya <i
                class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php
                    $sql_hitung = "SELECT COUNT(idAlumni) from alumni";
                    $q_hit= mysqli_query($con, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0]."";
                    }
                    ?></h3>

              <p>Alumni</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="?pages=kerja" class="small-box-footer">Lihat selengkapnya <i
                class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <?php
          break;
          default:
            ?>

      <?php
                    break;
              
        }
          ?>
      <!-- /.row -->
      <!-- Main row -->
      <center>
      <div class="card" style="border-radius: 15px; box-shadow: 0 5px 5px 0 rgba(128, 123, 123, 0.43)">
        <div class="text-center my-5">
          <img src="dist/img/muh.png" width="100" height="100"><br><br>
          <h3 class="display fw-bolder black-white mb-2" style="font-family: Poppins">SMK Muhammadiyah Kudus
          </h3>

          <p class="lead text-black-50 mb-4" style="font-family: Poppins"><b>Berprestasi, Berkarakter, Unggul Dalam IT
              yang Dilandasi Iman dan
              Taqwa</b></p>
        </div>
      </div>
      </center>
    </div><!-- /.container-fluid -->
  </section>

</div>
