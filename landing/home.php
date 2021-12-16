<?php
include_once("koneksi.php");
?>
<body>
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1 style="font-family: Poppins">Selamat datang di <span>Bursa Kerja Khusus</span></h1>
      <h2 style="font-family: Poppins"><span>SMK Muhammadiyah Kudus</span> <br>
        Berprestasi, Berkarakter, Unggul Dalam IT yang Dilandasi Iman dan
        Taqwa
      </h2>
      <div class="d-flex">
        <a data-toggle="modal" data-target="#register" class="btn-get-started scrollto">Daftar Anggota</a>
        &nbsp;
        <a data-toggle="modal" data-target="#alumni" class="btn-get-started scrollto">Daftar Alumni</a>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
<section class=" border-bottom" id="features">
    <div class="container px-5 my-5"><h5><a class="text-decoration-none" href="?page=loker">
                        Klik untuk selengkapnya
                        <i class="bi bi-arrow-right"></i>
                    </a></h5>
    </div>
    <div class="container px-5 my-5">
            <div class="row gx-5">
    <?php
      include_once('koneksi.php');
      $dt = getLokerIndex();
      foreach ($dt as $key => $data) {
        ?>

                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="bg-gradient text-white rounded-3 mb-3"><i
                            class="bi bi-collection"></i></div>
                    <h2 class="h4 fw-bolder"><?php echo $data['perusahaan']?></h2>
                    <p style="font-family: Poppins"><?php echo $data['nmLoker'] ." Untuk ". $data['jekel'] ." ". $data['keterangan']?></p>
                 
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#detailLoker"
                      data-id="<?php echo $data['idLowongan'] . "~" . $data['noLoker'] ."~" . $data['perusahaan'] . "~" . $data['nmLoker'] . "~" . $data['jekel']. "~" . $data['file']. "~" . $data['keterangan']. "~" . $data['sumber']. "~" .  date('d-m-Y', strtotime($data['tglInput'])). "~" . date('d-m-Y', strtotime($data['batas'])) . "~" . $data['kualifikasi'] . "~" . $data['persyaratan']?>"
                      onclick="editDetLoker(this)"class="text-decoration-none">Lihat Selengkapnya
                        <i class="bi bi-arrow-right"></i></a>
                </div>
                <?php
      }
      ?>
            </div>
        </div>
    </section>
    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-building"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php // menghitung
                    $sql_hitung = "SELECT COUNT(nisn) from siswa";
                    $q_hit= mysqli_query($con, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0]."";
                    }
                    ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Jumlah Siswa Aktif</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="bi bi-people"></i>
              <span data-purecounter-start="0" data-purecounter-end="
              <?php // menghitung
                    $sql_hitung = "SELECT COUNT(idLowongan) from lowongan where status ='2'";
                    $q_hit= mysqli_query($con, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0]."";
                    }
                    ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Lowongan Kerja</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-people"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php // menghitung
                    $sql_hitung = "SELECT COUNT(idAlumni) from alumni where status ='Bekerja'";
                    $q_hit= mysqli_query($con, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0]."";
                    }
                    ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Alumni Bekerja</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-people"></i>
              <span data-purecounter-start="0" data-purecounter-end="
              <?php // menghitung
                    $sql_hitung = "SELECT COUNT(idAlumni) from alumni where status ='Studi'";
                    $q_hit= mysqli_query($con, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0]."";
                    }
                    ?>
              " data-purecounter-duration="1" class="purecounter"></span>
              <p>Alumni Studi</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->
  </main><!-- End #main -->
  <div id="register" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h6 class="modal-title">Register Anggota</h6>
        </div>
        <div class="modal-body">
        <form action="?page=registrasi" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>NISN</label>
              <input class="form-control" type="text" name="nisn" placeholder="Masukkan NISN anda">
            </div>

            <div class="form-group">
              <label>No WhatsApp</label>
              <input class="form-control " type="text" name="no_wa" placeholder="Masukkan Nomor WhatsApp anda">
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

  <div id="alumni" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h6 class="modal-title">Register Alumni</h6>
        </div>
        <div class="modal-body">
          <form action="?page=registrasi" method="post" enctype="multipart/form-data">
          <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>NISN</label>
                  <input class="form-control" type="text" name="nisn" placeholder="Masukkan NISN anda">
                </div>
              </div>

            <div class="col-6">
              <div class="form-group">
                <label>Posisi</label>
                <!-- <input class="form-control" type="text" name="no_wa" placeholder="Masukkan Nomor WhatsApp anda"> -->
                <select name="status" id="" class="form-control">
                  <option value="">Pilih</option>
                  <option value="Bekerja">Bekerja</option>
                  <option value="Studi">Studi</option>
                </select>
              </div>
            </div>
          </div>

            <div class="form-group">
              <label>Nama Instansi</label>
              <input class="form-control" type="text" name="nmInstansi" placeholder="Nama Instansi sekarang bekerja / studi">
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Pekerjaan</label>
                  <select name="pekerjaan" id="" class="form-control">
                    <option value="">Pilih</option>
                    <option value="Utama">Utama</option>
                    <option value="Sambilan">Sambilan</option>
                    <option value="Wirausaha">Wirausaha</option>
                    <option value="Tidak">Tidak</option>
                  </select>
                </div>
              </div>
              <div class="col-6">
                  <div class="form-group">
                  <label>Mulai Sejak</label>
                  <select name="mulai" id="" class="form-control">
                    <option value="">Pilih</option>
                    <option value="Sebelum">Sebelum</option>
                    <option value="Sesudah">Sesudah</option>
                    <option value="Tidak">Tidak</option>
                  </select>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Pertanggal</label>
                  <input class="form-control" type="date" name="waktu">
                </div>
              </div>
              <div class="col-6">
                  <div class="form-group">
                  <label>Jenis Perusahaan</label>
                  <select name="jnsPerusahaan" id="" class="form-control">
                    <option value="">Pilih</option>
                    <option value="Kuliah">Studi</option>
                    <option value="BUMN">BUMN</option>
                    <option value="Swasta">Swasta</option>
                    <option value="Nonprofil">Nonprofil</option>
                    <option value="Wiraswasta">Wiraswasta</option>
                  </select>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Gaji</label>
                  <input class="form-control" type="text" name="gaji">
                </div>
              </div>
              <div class="col-6">
                  <div class="form-group">
                  <label>Tahun Lulus</label>
                  <select name="tahun" id="" class="form-control" placeholder="Masukkan Besaran Gaji Bagi yang bekerja">
                <option value="">-Pilih-</option>
                  <?php
                    $dt = getYear();
                    foreach ($dt as $value) {
                      echo '<option value="'.$value['tahun'].'">'.$value['tahun'].'</option>';
                    }
                  ?>
              </select>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <input class="btn btn-success" type="submit" name="btnAlumniReg" value="Simpan" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div id="alumniReg" class="modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h6 class="modal-title">Registrasi Alumni</h6>
        </div>
        <div class="modal-body">
          <form action="?page=registrasi" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-8">
                <label>NISN</label>
                <input class="form-control" type="text" name="udid" id="udid" placeholder="Masukkan NISN anda" onkeypress="getNisn()">
            </div>
            <div class="col-4">
            <label style="color: white">NISN</label>
            <input type="button" class="form-control" value="Get Name" onclick="getUserName(document.getElementById('udid'));">
            </div>
          </div>
         
            <div class="form-group">
              <label>Nama</label>
              <input class="form-control " type="text" name="nama" id="namaAlumni" readonly>
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

  <div class="modal fade" id="detailLoker" tabindex="-1" aria-labelledby="portfolioModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content" style="font-family: Poppins">
        <div class="modal-body text-center pb-5">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-12">
                <!-- Portfolio Modal - Title-->
                <p class="portfolio-modal-title text-secondary pt-2 text-uppercase mb-0"><b>Detail Program</b></p>
                <!-- Icon Divider-->
                <br>
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                  <div class="divider-custom-line"></div>
                </div>
                <div class="row pb-2">
                  <div class="col-6">
                    <label for=""><b>Nama Perusahaan</b></label>
                    <input type="text" class="form-control" id="editNmPer" readonly />
                  </div>
                  <div class="col-6">
                    <label for=""><b>Lowongan Kerja</b></label>
                    <input type="text" class="form-control" id="editNmLoker" readonly />
                  </div>
                </div>
                <div class="row pb-2">
                <div class="col-6">
                    <label>Kualifikasi</label>
                    <textarea name="editKual" id="editKualLoker" style="white-space: pre-line" class="form-control" cols="50"
                      rows="3" readonly></textarea><br>
                  </div>

                  <div class="col-6">
                    <label>Persyaratan</label>
                    <textarea name="editPersy" id="editPersyLoker" style="white-space: pre-line" class="form-control"
                      cols="50" rows="3" readonly></textarea>
                  </div>
                </div>
                <div class="row pb-2">
                  <div class="col-6">
                    <label for=""><b>Ditujukan</b></label>
                    <input type="text" class="form-control" id="editJekel" readonly />
                  </div>
                  <div class="col-6">
                    <label for=""><b>Tanggal Berakhir</b></label>
                    <input type="text" class="form-control" id="editBatas" readonly />
                  </div>
                </div>
                <div class="form-group">
                  <label for=""><b>Keterangan</b></label>
                  <textarea style="resize: none;" cols="30" rows="2" class="form-control" id="editKeterangan"
                    readonly></textarea>
                </div>
                <div class="row pb-2">
                  <div class="col-7">
                    <label for=""><b>Sumber Lowongan</b></label>
                    <input type="text" class="form-control" id="editSumber" readonly />
                  </div>
                  <div class="col-5">
                    <label for=""><b>Tgl. Kirim</b></label>
                    <input type="text" style="border:0px" class="form-control" id="editTanggal" />
                  </div>
                </div>
              </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Vendor JS Files -->
  <!-- <div class="modal fade" id="detailLoker" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog pt-5" role="document">
      <div class="modal-content">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <h2 class="text-center"><b>Detail Lowongan</b></h2>
            <hr>
            <div class="row">
              <div class="col-6">
                <label for=""><b>Kode Lowongan </b></label>
                <input type="text" name="editID" id="editID" class="form-control" readonly>
              </div>
              <div class="col-6">
                <label for=""><b>Nama Perusahaan </b></label>
                <input type="text" name="editNmPer" id="editNmPer" class="form-control">
              </div>
              <div class="col-6">
                <label for=""><b>Lowongan Kerja </b></label>
                <input type="text" name="editNmLoker" id="editNmLoker" class="form-control">
              </div>
              <div class="col-6">
                <label for=""><b>Jenis Kelamin</b></label>
                <input type="text" name="editJekel" id="editJekel" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <label for=""><b>Sumber </b></label>
                <input type="text" name="editSumber" id="editSumber" class="form-control">
              </div>
              <div class="col-6">
                <label for=""><b>Tanggal </b></label>
                <input type="text" name="editTgl" id="editTanggal" class="form-control">
              </div>
              <div class="col-6">
                <label for=""><b>Batas </b></label>
                <input type="text" name="editBatas" id="editBatas" class="form-control">
              </div>
              <div class="col-6">
                <label for=""><b>Status </b></label>
                <input type="text" name="editStatus" id="editStatus" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for=""><b>Keterangan </b></label>
              <input type="text" name="editKet" id="editKeterangan" class="form-control">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <input class="btn btn-success" type="submit" name="btn" value="Ubah"  />
            </div>
        </form>
      </div>
    </div>
  </div> -->

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