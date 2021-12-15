<body>
  <section id="featured-services" class="featured-services">
    <div class="container px-5 my-5" data-aos="fade-up">
      <div class="row gx-6">
      <h3 style="font-family: Poppins">Info<strong> <span style="color:blue">Lowongan Kerja</span></strong></h3>
        <?php
      include_once('koneksi.php');
      $dt = getLokerAll();
      foreach ($dt as $key => $data) {
        ?>
        <div class="col-lg-4 mb-6 mb-lg-4" data-toggle="modal" data-target="#detailLoker"
                data-id="<?php echo $data['idLowongan'] . "~" . $data['noLoker'] ."~" . $data['perusahaan'] . "~" . $data['nmLoker'] . "~" . $data['jekel']. "~" . $data['file']. "~" . $data['keterangan']. "~" . $data['sumber']. "~" . $data['tglInput']. "~" . date('d-m-Y', strtotime($data['batas']))?>"
                onclick="editDetLoker(this)">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
            <h4 class="title"><?php echo $data['nmLoker']?></h4>
            <p class="description" style="font-family: Poppins; text-align: justify;" >
              <?php echo $data['perusahaan'] ." membuka lowongan ". $data['nmLoker']
              ." dengan kriteria ". $data['keterangan'] ." untuk ". $data['jekel'] .". Batas pendaftaran tanggal ".  date('d-m-Y', strtotime($data['batas'])) ?></p>
          </div>
        </div>
        <br>
        <?php
          }
        ?>
      </div>
    </div>
  </section>
  <div class="modal fade" id="detailLoker" tabindex="-1" aria-labelledby="portfolioModal1" aria-hidden="true">
    <div class="modal-dialog" style="font-family: Poppins">
      <div class="modal-content">
        <div class="modal-body text-center pb-5">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-12">
                <!-- Portfolio Modal - Title-->
                <font face="Trebuchet MS">
                  <h4>Detail Program</h4>
                </font>
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
                  <div class="col-8">
                    <label for=""><b>Sumber Lowongan</b></label>
                    <input type="text" class="form-control" id="editSumber" readonly />
                  </div>
                  <div class="col-4">
                    <label for=""><b>File</b></label>
                    <!-- <?php echo $_FILES['editFile']?> -->
                    <!-- <a href="../file_data/loker/".id="editFile" target="_blank">Download</a> -->
                    <input type="text" class="form-control" value="editFile" readonly />
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

</body>

</html>
