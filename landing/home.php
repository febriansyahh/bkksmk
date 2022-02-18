<?php
include_once("koneksi.php");
?>

<body>
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100" style="text-align: center;">
      <h1 style="font-family: Poppins">Selamat datang di <span>SI-BUK</span></h1>
      <h4 style="font-family: Poppins"><span>Sistem Informasi Bursa Kerja Khusus (SI-BUK) adalah</span> <br>
        sistem yang berguna untuk meningkatkan <br> pelayanan dan memperluas kesempatan kerja
      </h4>
      <br>
      <div class="d-flex" style="width:450px; margin:0 auto;">
        <a data-toggle="modal" data-target="#register" class="btn-get-started scrollto" style="float : center;">Daftar
          Anggota</a>
        &nbsp;
        <a data-toggle="modal" data-target="#alumni" class="btn-get-started scrollto" style="float : center;">Daftar
          Alumni</a>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <section id="featured-services" class="featured-services">
    <div class="container px-5 my-3">
        <h5><a class="text-decoration-none" href="?page=loker">
            Klik untuk selengkapnya
            <i class="bi bi-arrow-right"></i>
          </a></h5><br>
          <h6 style="color: #247cf0;">3 Lowongan terbaru</h6>
      </div>
    <div class="container px-5 my-3" data-aos="fade-up">
      <div class="row gx-6">
        <?php
      include_once('koneksi.php');
      $dt = getLokerIndex();
      foreach ($dt as $key => $data) {
        ?>
        <div class="col-lg-4 mb-4 mb-lg-4 " data-toggle="modal" data-target="#detailLoker"
          data-id="<?php echo $data['idLowongan'] . "~" . $data['noLoker'] ."~" . $data['perusahaan'] . "~" . $data['nmLoker'] . "~" . $data['jekel']. "~" . $data['file']. "~" . $data['keterangan']. "~" . $data['sumber']. "~" .  date('d-m-Y', strtotime($data['tglInput'])). "~" . date('d-m-Y', strtotime($data['batas'])) . "~" . $data['kualifikasi'] . "~" . $data['persyaratan']?>"
          onclick="editDetLoker(this)" style="padding-top: 25px;">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="100" style="height: 270px;">
            <h4 class="title">
              <?php echo $data['perusahaan'] ." - ". $data['nmLoker']?></h4>
            <p class="description" style="font-family: Poppins; text-align: justify;">
              <?php echo $data['perusahaan'] ." membuka lowongan ". $data['nmLoker']
              ." untuk ". $data['jekel'] .". Batas pendaftaran tanggal ".  date('d-m-Y', strtotime($data['batas'])) ?>
              <span style="color:blue"> 
              . Tap untuk lebih detail. 
              <?php 
              echo '<br>';
              if($data['file'] != NULL){
              ?>
              <a href=<?php echo "file_data/loker/".$data['file']?>>Unduh</a></span></p>
              <?php
              }
              ?>
          </div>
        </div>
        <br>
        <br>
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
                    ?>" data-purecounter-duration="1" class="purecounter" style="color: white"></span>
              <p style="color: white">Jumlah Siswa Aktif</p>
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
                    ?>" data-purecounter-duration="1" class="purecounter" style="color: white"></span>
              <p style="color: white">Lowongan Kerja</p>
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
                    ?>" data-purecounter-duration="1" class="purecounter" style="color: white"></span>
              <p style="color: white">Alumni Bekerja</p>
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
              " data-purecounter-duration="1" class="purecounter" style="color: white"></span>
              <p style="color: white">Alumni Studi</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->
  </main><!-- End #main -->
  <div id="register" class="modal fade">
    <div class="modal-dialog" style="font-family: Poppins">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h6 class="modal-title">Register Anggota</h6>
        </div>
        <div class="modal-body">
          <form action="?page=registrasi" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>NISN</label>
              <input class="form-control" type="text" name="nisn" placeholder="Masukkan NISN anda" required>
            </div>

            <div class="form-group">
              <label>No WhatsApp</label>
              <input class="form-control " type="text" name="no_wa" placeholder="Masukkan Nomor WhatsApp anda (6289xxxx)" required>
            </div>

            <div class="form-group">
              <label>Username</label>
              <input class="form-control " type="text" name="username" placeholder="Masukkan username" required>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Password</label>
                  <input class="form-control " type="password" name="password" placeholder="Masukkan Password" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Confirm Password</label>
                  <input class="form-control " type="password" name="rePassword" placeholder="Ulangi Password" required>
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
    <div class="modal-dialog" style="font-family: Poppins">
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
                  <input class="form-control" type="text" name="nisn" placeholder="Masukkan NISN anda" required>
                </div>
              </div>

              <div class="col-6">
                <div class="form-group">
                  <label>Posisi</label>
                  <select name="status" id="" class="form-control" required>
                    <option value="">Pilih</option>
                    <option value="Bekerja">Bekerja</option>
                    <option value="Studi">Studi</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Nama Industri / Instansi</label>
              <input class="form-control" type="text" name="nmInstansi"
                placeholder="Nama Instansi sekarang bekerja / studi" required>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Pekerjaan</label>
                  <select name="pekerjaan" id="" class="form-control" required>
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
                  <label>Mulai Bekerja Sejak</label>
                  <select name="mulai" id="" class="form-control" required>
                    <option value="">Pilih</option>
                    <option value="Sebelum">Sebelum Lulus</option>
                    <option value="Sesudah">Sesudah Lulus</option>
                    <option value="Tidak">Tidak / Lanjut Studi</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Tanggal Mulai Bekerja</label>
                  <input class="form-control" type="date" name="waktu" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Jenis Perusahaan</label>
                  <select name="jnsPerusahaan" id="" class="form-control" required>
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
                  <input class="form-control" type="text" name="gaji" placeholder="Masukkan Nominal Angka Gaji">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Tahun Lulus</label>
                  <select name="tahun" id="" class="form-control" placeholder="Masukkan Besaran Gaji Bagi yang bekerja" required>
                    <option value="">-Pilih-</option>
                    <?php
                      $thn_skr = date('Y');
                      for ($x = $thn_skr; $x >= 2015; $x--) {
                      ?>
                          <option value="<?php echo $x ?>"><?php echo $x ?></option>
                      <?php
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
                <input class="form-control" type="text" name="udid" id="udid" placeholder="Masukkan NISN anda"
                  onkeypress="getNisn()">
              </div>
              <div class="col-4">
                <label style="color: white">NISN</label>
                <input type="button" class="form-control" value="Get Name"
                  onclick="getUserName(document.getElementById('udid'));">
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
                <p class="portfolio-modal-title text-secondary pt-2 text-uppercase mb-0"><b>Detail Lowongan Kerja</b></p>
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
                    <textarea name="editKual" id="editKualLoker" style="white-space: pre-line" class="form-control"
                      cols="50" rows="3" readonly></textarea><br>
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
