<body>
  <section id="featured-services" class="featured-services" style="font-family: Poppins">
    <div class="container px-3 my-3" data-aos="fade-up">
      <div class="row gx-6">
        <h4>Info<strong> <span style="color:blue"> Perusahaan Terdaftar</span></strong></h4>
        <?php
      include_once('koneksi.php');
      $dt = getAllPerusahaan();
      foreach ($dt as $key => $data) {
        ?>
        <div class="col-lg-4 mb-6 mb-lg-4" >
          <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
          <h4 class="title">
            <?php
            if($data['logo'] != NULL){
            ?>
            <img src=<?php echo "file_data/logo/".$data['logo'] ?> alt="" style="width:40px; height:40px"> -
            <?php
            }else{
            ?>
            <img src=<?php echo "file_data/logo/default.png" ?> alt="" style="width:40px; height:40px"> -
            <?php
            }
            ?>
            <?php echo $data['nmPerusahaan'] ?></h4>
            <p class="description" style="text-align: justify;"> Perusahaan 
              <?php echo $data['nmPerusahaan'] ." dengan alamat email ". $data['email']
              ." dan telah menjalin kerjasama sejak " . date("d-M-Y", strtotime($data['tglKerjasama']))?></p>
          </div>
        </div>
        <br>
        <?php
          }
        ?>
      </div>
    </div>
  </section>
  
  </div>
  </div>

</body>

</html>
