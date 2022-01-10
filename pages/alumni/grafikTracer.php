<?php	
include_once("koneksi.php");
error_reporting();
error_reporting (E_ALL ^ E_NOTICE); 
?>
<div class="form-group">
  <br>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
			<form action="" method="post" enctype="multipart/form-data" name="filter">
            <div class="input-group mb-3">
              <!-- <select name="jurusan" id="filter" style="width:20%;" required>
                <option value="" selected="selected">Pilih Jurusan</option>
                <?php
                $dt = getJurusan();
                foreach ($dt as $value) {
                  echo '<option value="'.$value['idJurusan'].'">'.$value['nmJurusan'].'</option>';
                }
              ?>
              </select>&nbsp; -->
							<label for="">Tahun : </label>&nbsp;
              <select name="tahun" id="filter" style="width:20%;">
                <option value="" selected="selected">Pilih Tahun</option>
                <?php
                $dt = getYearAlumni();
                foreach ($dt as $value) {
                  echo '<option value="'.$value['tahun'].'">'.$value['tahun'].'</option>';
                }
              ?>
              </select>&nbsp;
              <input type="submit" class="btn btn-primary" name="btnFilter" value="Cari">
            </div>
          </form>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Alumni BKK Bekerja</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <center>
                  <tr>
                    <th>No</th>
                    <th>Nama </th>
                    <th>Jurusan</th>
                    <th>Instansi</th>
                    <th>Tahun Lulus</th>
                  </tr>
                </center>
              </thead>
              <tbody>
                <?php
            // $a = getAlumniKerja();
            // $no = 1;
            // foreach ($a as $key => $data) {
							// $jur = $_POST['jurusan'];
							$no = 1;
							$tahun = $_POST['tahun'];
							if($jur || $tahun != ''){
							$sql_tampil = mysqli_query($con,"SELECT a.idAlumni, b.nisn, a.nmInstansi, a.status, b.nama, c.nmJurusan, b.noTelp, a.thnLulus FROM alumni a, siswa b, jurusan c WHERE a.nisn=b.nisn AND b.jurusan=c.idJurusan AND a.status='Bekerja' AND a.thnLulus = '$tahun' AND c.idJurusan= '$jur' ORDER BY a.thnLulus ASC");
							}else{
								$sql_tampil = mysqli_query($con,"SELECT a.idAlumni, b.nisn, a.nmInstansi, a.status, b.nama, c.nmJurusan, b.noTelp, a.thnLulus FROM alumni a, siswa b, jurusan c WHERE a.nisn=b.nisn AND b.jurusan=c.idJurusan AND a.status='Bekerja' ORDER BY a.thnLulus ASC");
							}
							while($data = mysqli_fetch_array($sql_tampil)){
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['nama']; ?></td>
                  <td><?php echo $data['nmJurusan']; ?></td>
                  <td><?php echo $data['nmInstansi']; ?></td>
                  <td><?php echo $data['thnLulus']; ?></td>
                </tr>
                <?php
            $no++;
            }
        ?>

              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>

  <center>
    <br>
    <?php
			// $jur = isset($_POST['jurusan']);
			$tahun = $_POST['tahun'];
			if($tahun != ''){ 
        ?>
    <h5 style="font-family: Poppins">Grafik Perkembangan Alumni Bekerja Tahun <?php echo $tahun ?></h5>
    <div class="row" style="width:auto; padding-left: 2%;">
      <div style="width: 500px;height: 200px">
        <canvas id="myChart"></canvas>
        <!-- <canvas id="myChart3"></canvas> -->
      </div>
    
      <div style="width: 500px;height: 200px">
        <canvas id="myChart2"></canvas>
      </div>
    </div>
    <?php
    }else{
    ?>
    <h5 style="font-family: Poppins">Grafik Perkembangan Alumni Bekerja</h5>
    <div class="row" style="width:auto; padding-left: 2%;">
      <div style="width: 500px; height: 200px">
        <canvas id="myChart4"></canvas>
        <!-- <canvas id="myChart3"></canvas> -->
      </div>
    
      <div style="width: 500px;height: 200px">
        <canvas id="myChart5"></canvas>
      </div>
    </div>
    <?php
    }
    ?>
  </center>
  <p style="padding-left: 2%; padding-top:7%">Keterangan :</p>
  <ul>
    <li>MM : Multimedia</li>
    <li>TKJ : Teknik Komputer dan Jaringan</li>
    <li>TSM : Teknik Sepeda Motor</li>
    <li>TAV : Teknik Audio Video</li>
    <li>TKR : Teknik Kendaraan Ringan</li>
    <li>TP : Teknik Pemesinan</li>
  </ul>
  </body>
  <script src="js/main.js"></script>
	<?php
        $tahun = $_POST['tahun'];
        $sql="SELECT d.nmJurusan, COUNT(a.idDaftar) as total FROM pendaftaran a, siswa b, alumni c, jurusan d WHERE a.idAnggota=b.idSiswa AND c.nisn=b.nisn AND b.jurusan=d.idJurusan AND a.status='4' AND c.thnLulus='$tahun' GROUP BY d.nmJurusan";
        $hasil=mysqli_query($con,$sql);

    while ($data = mysqli_fetch_array($hasil)) {
        $jur=$data['nmJurusan'];
        $ikutbkkfilter .= "'$jur'". ", ";

        $jum=$data['total'];
        $jumlahbkkfilter .= "$jum". ", ";
    }
    ?>
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php echo $ikutbkkfilter; ?>],
            datasets: [{
                label:'Alumni Siswa Bekerja dari BKK',
                backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',	'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jumlahbkkfilter; ?>]
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
	<?php
        $tahun = $_POST['tahun'];
        $sql="SELECT cc.nmJurusan, COUNT(aa.idAlumni) as total FROM alumni aa, siswa bb, jurusan cc WHERE aa.nisn=bb.nisn AND bb.jurusan=cc.idJurusan AND aa.status='Bekerja' AND aa.nisn NOT IN (SELECT b.nisn FROM pendaftaran a, siswa b WHERE a.idAnggota=b.idSiswa AND a.status='4') AND aa.thnLulus='$tahun' GROUP BY cc.nmJurusan";
        $hasil=mysqli_query($con,$sql);

    while ($data = mysqli_fetch_array($hasil)) {
        $jur=$data['nmJurusan'];
        $ikutbkk .= "'$jur'". ", ";

        $jum=$data['total'];
        $jumlahbkk .= "$jum". ", ";
    }
    ?>
	<script>
		var ctx = document.getElementById("myChart2").getContext('2d');
		var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php echo $ikutbkk; ?>],
            datasets: [{
              label:'Alumni Siswa Bekerja di luar BKK',
                backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',	'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jumlahbkk; ?>]
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

<?php
        $sql="SELECT d.nmJurusan, COUNT(a.idDaftar) as total FROM pendaftaran a, siswa b, alumni c, jurusan d WHERE a.idAnggota=b.idSiswa AND c.nisn=b.nisn AND b.jurusan=d.idJurusan AND a.status='4' GROUP BY d.nmJurusan";
        $hasil=mysqli_query($con,$sql);

    while ($data = mysqli_fetch_array($hasil)) {
        $jur=$data['nmJurusan'];
        $ikutbkk .= "'$jur'". ", ";

        $jum=$data['total'];
        $jumlahbkk .= "$jum". ", ";
    }
    ?>
<script>
		var ctx = document.getElementById("myChart4").getContext('2d');
		var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php echo $ikutbkk; ?>],
            datasets: [{
                label:'Alumni Siswa Bekerja dari BKK',
                backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',	'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jumlahbkk; ?>]
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
	
  <?php
        $sql="SELECT cc.nmJurusan, COUNT(aa.idAlumni) as total FROM alumni aa, siswa bb, jurusan cc WHERE aa.nisn=bb.nisn AND bb.jurusan=cc.idJurusan AND aa.status='Bekerja' AND aa.nisn NOT IN (SELECT b.nisn FROM pendaftaran a, siswa b WHERE a.idAnggota=b.idSiswa AND a.status='4') GROUP BY cc.nmJurusan";
        $hasil=mysqli_query($con,$sql);

    while ($data = mysqli_fetch_array($hasil)) {
        $jur=$data['nmJurusan'];
        $nama_jurusan .= "'$jur'". ", ";

        $jum=$data['total'];
        $jumlah .= "$jum". ", ";
    }
    ?>
<script>
    var ctx = document.getElementById('myChart5').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php echo $nama_jurusan; ?>],
            datasets: [{
                label:'Alumni Siswa Bekerja di luar BKK',
                backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',	'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jumlah; ?>]
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
</html>
