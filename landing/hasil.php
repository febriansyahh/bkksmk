<body>
  <section id="featured-services" class="featured-services">
    <div class="container px-5 my-5" data-aos="fade-up">
      <div class="row gx-6">
      
        <h3 style="font-family: Poppins">Info<strong> <span style="color:blue">Hasil Tes Seleksi</span></strong></h3>
        <?php
      include_once('koneksi.php');
      $dt = getHasilAll();
      foreach ($dt as $key => $data) {
        ?>
        <div class="col-lg-4 mb-6 mb-lg-4" >
        <data-toggle="modal" data-target="#detailHasil" onclick="editableHasil(this)"
                data-id="<?php echo $data['noLoker'] . "~" . $data['idLowongan'] . "~" . $data['file'] . "~" . $data['keterangan'] . "~" . $data['perusahaan'] . "~" . $data['nmLoker'] ?>">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
            <h4 class="title"><?php echo $data['perusahaan'] .' - '. $data['nmLoker']?></h4>
            <p class="description" style="text-align: justify;"> Pengumuman Lowongan
              <?php echo $data['nmLoker'] ." perusahaan ". $data['perusahaan']
              ."."?><span style="color:blue"> <a href=<?php echo "file_data/hasil/".$data['file']?>>Unduh</a></span></p>
          </div>
        </div>
        <br>
        <?php
          }
        ?>
      </div>
    </div>
  </section>
  <div class="modal fade" id="detailHasil" tabindex="-1" aria-labelledby="portfolioModal1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body ">
          <div class="container">
            <div class="row justify-content">
              <div class="col-lg-12">
                <!-- Portfolio Modal - Title-->
                <font face="Trebuchet MS">
                  <h4>Detail Hasil Lowongan</h4>
                </font>
                <!-- Icon Divider-->
                <br>
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                  <div class="divider-custom-line"></div>
                </div>
                <div class="row pb-1">
                  <label for=""><b>Nama Perusahaan</b></label>
                  <textarea style="resize: none; text-align:center; font-weight:bold" id="editNmPer" cols="30" rows="2"
                    class="form-control" readonly></textarea>
                </div>
                <div class="row pb-1">
                  <label for=""><b>Lowongan Kerja</b></label>
                  <textarea style="resize: none; text-align:center; font-weight:bold" id="editNmLoker" cols="30"
                    rows="2" class="form-control" readonly></textarea>
                </div>
                <div class="row pb-1">
                  <label for=""><b>Keterangan</b></label>
                  <textarea style="resize: none;" cols="30" rows="2" class="form-control" id="editKeterangan"
                    readonly></textarea>
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
                <div class="row pb-1">
                <label for=""><b>Sumber Lowongan</b></label>
                  <input type="text" class="form-control" id="editSumber" readonly />
                  <br>
                </div>
                <div class="col-6">
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

</body>

</html>
