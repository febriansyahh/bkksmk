<?php
include_once("koneksi.php")
?>
<!DOCTYPE html>
<html>
<head>
    <script src="js/Chart.js"></script>
</head>
<body>
    <br>
    <h4>Cara Membuat Grafik (Chart) di PHP dengan Chart.js</h4>
    <canvas id="myChart"></canvas>
    <?php
        $nama_jurusan1= "";
        $jumlah1=null;
        $sql="SELECT c.nmJurusan, COUNT(a.idAlumni) as total FROM alumni a, siswa b, jurusan c WHERE a.nisn=b.nisn AND b.jurusan=c.idJurusan  GROUP BY c.nmJurusan ORDER BY a.thnLulus";
        $hasil=mysqli_query($con,$sql);

    while ($data = mysqli_fetch_array($hasil)) {
        $jur1=$data['nmJurusan'];
        $nama_jurusan1 .= "'$jur1'". ", ";

        $jum1=$data['total'];
        $jumlah1 .= "$jum1". ", ";
    }
    ?>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: [<?php echo $nama_jurusan1; ?>],
            datasets: [{
                label:'Data Jurusan Mahasiswa 1',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)','rgb(175, 238, 239)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jumlah1; ?>]
            }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>

</body>
</html>


<?php
  $dt = getJurusan();
  foreach ($dt as $key => $data) {
  ?>
  <ol>
    <?php echo $data['nmJurusan'] ." : ". $data['keterangan']?> 
  </ol>
  <?php
  }
  ?>

<!-- section lowongan home page -->
<section class=" border-bottom" id="features">
      <div class="container px-5 my-5">
        <h5><a class="text-decoration-none" href="?page=loker">
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
            <div class="bg-gradient text-white rounded-3 mb-3"><i class="bi bi-collection"></i></div>
            <h2 class="h4 fw-bolder"><?php echo $data['perusahaan']?></h2>
            <p style="font-family: Poppins">
              <?php echo $data['nmLoker'] ." Untuk ". $data['jekel'] ." ". $data['keterangan']?></p>
            <a href="javascript:void(0)" data-toggle="modal" data-target="#detailLoker"
              data-id="<?php echo $data['idLowongan'] . "~" . $data['noLoker'] ."~" . $data['perusahaan'] . "~" . $data['nmLoker'] . "~" . $data['jekel']. "~" . $data['file']. "~" . $data['keterangan']. "~" . $data['sumber']. "~" .  date('d-m-Y', strtotime($data['tglInput'])). "~" . date('d-m-Y', strtotime($data['batas'])) . "~" . $data['kualifikasi'] . "~" . $data['persyaratan']?>"
              onclick="editDetLoker(this)" class="text-decoration-none">Tap untuk lebih detail
              <!-- <i class="bi bi-arrow-right"></i> -->
            </a>
          </div>
          <?php
      }
      ?>
        </div>
      </div>
    </section>

