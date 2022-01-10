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