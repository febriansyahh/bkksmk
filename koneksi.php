<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'bkkmuh');
// define('DB','sosial');
define ('SITE_ROOT', realpath(dirname(__FILE__)));

$con = mysqli_connect(HOST, USER, PASS, DB) or die('Unable to Connect');

function LoginUser()
{
  global $con;

  $sql_login = "SELECT * FROM `user` WHERE status='1' AND `username`='" . $_POST['txtusm'] . "' AND `password`='" . $_POST['txtpassword'] . "'";
  $query_login = mysqli_query($con, $sql_login);
  $data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);
  $jumlah_login = mysqli_num_rows($query_login);

  if ($jumlah_login >= 1) {
    session_start();
    $_SESSION["ses_username"] = $data_login["username"];
    $_SESSION["ses_nama"] = $data_login["nama"];
    $_SESSION["ses_idLevel"] = $data_login["idLevel"];
    $_SESSION["ses_idDaftar"] = $data_login['idDaftar'];
    $_SESSION["ses_idUser"] = $data_login['idUser'];

    // echo "<script>alert('Login Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php'>";
    // switch ($data_login['idLevel']) {
    //   case '1':
    //     echo "<meta http-equiv='refresh' content='0; url=indexAdm.php'>";
    //     break;

    //   case '2':
    //     echo "<meta http-equiv='refresh' content='0; url=indexAdm.php'>";
    //     break;

    //   case '3':
    //     echo "<meta http-equiv='refresh' content='0; url=indexAdm.php'>";
    //     break;

    //   case '4':
    //     echo "<meta http-equiv='refresh' content='0; url=indexAdm.php'>";
    //     break;
    // }
  } else {
    echo "<script>alert('Login Gagal!!')</script>";
    echo "<meta http-equiv='refresh' content='0; url=signin.php'>";

  }
}

function registrasiData()
{
  global $con;
  
  $cekNisn = "SELECT idSiswa, nisn, nama FROM siswa WHERE nisn = '" . $_POST['nisn'] . "' ";
  $query = mysqli_query($con, $cekNisn);
  $row = mysqli_fetch_row($query);
    $idDaftar = $row[0];
    $nisn = $row[1];
    $nama = $row[2];
    // echo $idDaftar;
    // echo $nisn;
    // echo $nama;
    // die();
  $pass = $_POST['password'];
  $repass = $_POST['rePassword'];
  
  $tgl = date('Y-m-d H:i:s');
  if($nisn == NULL){
    echo "<script>alert('NISN tidak Terdaftar, Registrasi Gagal !!')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php?page=beranda>";
    // echo 'A';
    
  }else
      {
        if($pass != $repass){
          echo "<script>alert('Password tidak sama, Simpan Gagal !!')</script>";
          echo "<meta http-equiv='refresh' content='0; url=index.php?page=beranda>";
        }else
            {
              // $sql_insert = "INSERT INTO anggota (nisn, noWa, tglDaftar) VALUES (
              $sql_insert = "INSERT INTO data_anggota (nisn, noWa, tglDaftar) VALUES (
                '" . $nisn . "',
                '" . $_POST['no_wa'] . "',
                '" . $tgl . "')";
                $query_insert = mysqli_query($con, $sql_insert) or die(mysqli_connect_error());

              $sql_insertUser = "INSERT INTO user (nama, username, password, idLevel, idDaftar, status, tglDaftar) VALUES (
                '$nama',
                '" . $_POST['username'] . "',
                '" . $_POST['password'] . "',
                '2',
                '" . $idDaftar . "',
                '1',
                '" . $tgl . "')";
          
                $query_insertUser = mysqli_query($con, $sql_insertUser) or die(mysqli_connect_error());
                
                if ($query_insert && $query_insertUser) {
                  echo "<script>alert('Registrasi Anggota Berhasil')</script>";
                  echo "<meta http-equiv='refresh' content='0; url=signin.php'>";
                } else {
                  echo "<script>alert('Registrasi Anggota Gagal')</script>";
                  echo "<meta http-equiv='refresh' content='0; url=index.php?page=beranda'>";
                }
            }
      }
    }

function registrasiDatas()
{
  global $con;
  
  $cekNisn = "SELECT idSiswa, nisn, nama FROM siswa WHERE nisn = '" . $_POST['nisn'] . "' ";
  $query = mysqli_query($con, $cekNisn);
  $row = mysqli_fetch_row($query);
    $idDaftar = $row[0];
    $nisn = $row[1];
    $nama = $row[2];
    // echo $idDaftar;
    // echo $nisn;
    // echo $nama;
    // die();
  $pass = $_POST['password'];
  $repass = $_POST['rePassword'];
  
  $tgl = date('Y-m-d H:i:s');
  if($nisn == NULL){
    echo "<script>alert('NISN tidak Terdaftar, Registrasi Gagal !!')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php?page=beranda>";
    // echo 'A';
    
  }else
      {
        if($pass != $repass){
          echo "<script>alert('Password tidak sama, Simpan Gagal !!')</script>";
          echo "<meta http-equiv='refresh' content='0; url=index.php?page=beranda>";
        }else
            {
              // $sql_insert = "INSERT INTO anggota (nisn, noWa, tglDaftar) VALUES (
              $sql_insert = "INSERT INTO data_anggota (nisn, noWa, tglDaftar) VALUES (
                '" . $nisn . "',
                '" . $_POST['no_wa'] . "',
                '" . $tgl . "')";
                $query_insert = mysqli_query($con, $sql_insert) or die(mysqli_connect_error());

              $sql_insertUser = "INSERT INTO user (nama, username, password, idLevel, idDaftar, status, tglDaftar) VALUES (
                '$nama',
                '" . $_POST['username'] . "',
                '" . $_POST['password'] . "',
                '2',
                '" . $idDaftar . "',
                '1',
                '" . $tgl . "')";
          
                $query_insertUser = mysqli_query($con, $sql_insertUser) or die(mysqli_connect_error());
                
                if ($query_insert && $query_insertUser) {
                  echo "<script>alert('Registrasi Anggota Berhasil')</script>";
                  echo "<meta http-equiv='refresh' content='0; url=../signin.php'>";
                } else {
                  echo "<script>alert('Registrasi Anggota Gagal')</script>";
                  echo "<meta http-equiv='refresh' content='0; url=index.php?page=beranda'>";
                }
            }
      }
    }

function registrasiPer()
{
  global $con;
  $cekIdDaftar = "SELECT `AUTO_INCREMENT` as idDaftar FROM INFORMATION_SCHEMA.TABLES
  WHERE TABLE_SCHEMA = 'bkkmuh' AND TABLE_NAME = 'data_perusahaan' ";
  // WHERE TABLE_SCHEMA = 'bkkmuh' AND TABLE_NAME = 'perusahaan' ";
  $query = mysqli_query($con, $cekIdDaftar);
  $row = mysqli_fetch_row($query);
    $idDaftar = $row[0];
  //   echo '<pre>';
  //   print_r($idDaftar);
  //   echo '<br>';
  //   echo '</pre>';
  // die();
  $pass = $_POST['password'];
  $repass = $_POST['rePassword'];
  
  $tgl = date('Y-m-d H:i:s');
  if($pass != $repass){
    echo "<script>alert('Password tidak sama, Simpan Gagal !!')</script>";
    echo "<meta http-equiv='refresh' content='0; url=../signin.php>";
    
    
  }else
      {
        // $sql_insertPer = "INSERT INTO perusahaan (nmPerusahaan, email, stsPerusahaan, noTelp, tglDaftar) VALUES (
        $sql_insertPer = "INSERT INTO data_perusahaan (nmPerusahaan, email, stsPerusahaan, noTelp, tglDaftar) VALUES (
          '" . $_POST['namaper'] . "',
          '" . $_POST['email'] . "',
          '" . $_POST['status'] . "',
          '" . $_POST['noTelp'] . "'
          '" . $tgl . "')";

        $sql_insert = "INSERT INTO user (nama, username, password, idLevel, idDaftar, status, tglDaftar) VALUES (
          '" . $_POST['namaper'] . "',
          '" . $_POST['username'] . "',
          '" . $_POST['password'] . "',
          '4',
          '" . $idDaftar . "',
          '1',
          '" . $tgl . "')";
    
          $query_insertPer = mysqli_query($con, $sql_insertPer) or die(mysqli_connect_error());
          $query_insert = mysqli_query($con, $sql_insert) or die(mysqli_connect_error());
          if ($query_insertPer) {
            echo "<script>alert('Simpan Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=../signin.php'>";
          } else {
            echo "<script>alert('Simpan Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=../signin.php'>";
          }
      }
}

function regAlumni()
{
  global $con;
  $cekNisn = "SELECT idSiswa, nisn, nama FROM siswa WHERE nisn = '" . $_POST['nisn'] . "' ";
  $query = mysqli_query($con, $cekNisn);
  $row = mysqli_fetch_row($query);
    $idDaftar = $row[0];
    $nisn = $row[1];

  $tgl = date('Y-m-d H:i:s');
  if($nisn == NULL){
    echo "<script>alert('NISN tidak Terdaftar, Registrasi Alumni Gagal !!')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php>";
  }else
              $sql_insert = "INSERT INTO alumni (`nisn`, `status`, `nmInstansi`, `mulai`, `pekerjaan`, `waktu`, `jnsPerusahaan`, `gaji`, `thnLulus`, `tglDaftar`) VALUES (
                '$nisn',
                '" . $_POST['status'] . "',
                '" . $_POST['nmInstansi'] . "',
                '" . $_POST['mulai'] . "',
                '" . $_POST['pekerjaan'] . "',
                '" . $_POST['waktu'] . "',
                '" . $_POST['jnsPerusahaan'] . "',
                '" . $_POST['gaji'] . "',
                '" . $_POST['tahun'] . "',
                '" . $tgl . "')";
                $query_insert = mysqli_query($con, $sql_insert) or die(mysqli_connect_error());
                
                if ($query_insert) {
                  echo "<script>alert('Registrasi Alumni Berhasil')</script>";
                  echo "<meta http-equiv='refresh' content='0; url=index.php'>";
                } else {
                  echo "<script>alert('Registrasi Alumni Gagal')</script>";
                  echo "<meta http-equiv='refresh' content='0; url=index.php'>";
                }
}

function getYear()
{
  global $con;
  $sql = "SELECT DISTINCT YEAR(tahunMasuk) as tahun FROM siswa ORDER BY tahunMasuk ASC ";
  $query = mysqli_query($con, $sql);

  return $query;
}


function getYearPerusahaan()
{
  global $con;
  $sql = "SELECT DISTINCT YEAR(tglKerjasama) as tahun FROM data_perusahaan ORDER BY tglKerjasama ASC ";
  // $sql = "SELECT DISTINCT YEAR(tglKerjasama) as tahun FROM perusahaan ORDER BY tglKerjasama ASC ";
  $query = mysqli_query($con, $sql);

  return $query;
}

function getYearLowongan()
{
  global $con;
  $sql = "SELECT DISTINCT YEAR(tglInput) as tahun FROM lowongan WHERE status='3' ORDER BY tglInput ASC ";
  $query = mysqli_query($con, $sql);

  return $query;
}

function getYearLowonganPerusahaan($id)
{
  global $con;
  $sql = "SELECT DISTINCT YEAR(a.tglInput) as tahun FROM lowongan a, user b WHERE a.usrInput=b.idUser AND b.idLevel ='4' AND a.status='3' AND a.usrInput = '$id' ORDER BY a.tglInput ASC ";
  $query = mysqli_query($con, $sql);

  return $query;
}

function getYearAlumni()
{
  global $con;
  $sql = "SELECT DISTINCT thnLulus as tahun FROM alumni ORDER BY thnLulus ASC ";
  $query = mysqli_query($con, $sql);

  return $query;
}

function getRiwayat()
{
  global $con;
  // $sql = "SELECT a.idDaftar, b.nisn, b.nama, d.nmJurusan, c.perusahaan, c.nmLoker, a.status FROM pendaftaran a, siswa b, lowongan c, jurusan d WHERE a.idAnggota=b.idSiswa AND a.idLoker=c.idLowongan AND b.jurusan=d.idJurusan ORDER BY c.idLowongan ASC";
  $sql = "SELECT a.idDaftar, b.nisn, b.nama, d.nmJurusan, c.perusahaan, c.nmLoker, a.status FROM pendaftaran_loker a, siswa b, lowongan c, jurusan d WHERE a.idAnggota=b.idSiswa AND a.idLoker=c.idLowongan AND b.jurusan=d.idJurusan ORDER BY c.idLowongan ASC";
  $query = mysqli_query($con, $sql);

  return $query;
}

function getRiwayatView()
{
  global $con;
  // $sql = "SELECT a.idDaftar, b.nisn, b.nama, d.nmJurusan, c.perusahaan, c.nmLoker, a.status FROM pendaftaran a, siswa b, lowongan c, jurusan d WHERE a.idAnggota=b.idSiswa AND a.idLoker=c.idLowongan AND b.jurusan=d.idJurusan AND c.status ='3' ORDER BY c.idLowongan ASC";
  $sql = "SELECT a.idDaftar, b.nisn, b.nama, d.nmJurusan, c.perusahaan, c.nmLoker, a.status FROM pendaftaran_loker a, siswa b, lowongan c, jurusan d WHERE a.idAnggota=b.idSiswa AND a.idLoker=c.idLowongan AND b.jurusan=d.idJurusan AND c.status ='3' ORDER BY c.idLowongan ASC";
  $query = mysqli_query($con, $sql);

  return $query;
}
function getRiwayatViewKeterima()
{
  global $con;
  // $sql = "SELECT a.idDaftar, b.nisn, b.nama, d.nmJurusan, c.perusahaan, c.nmLoker, a.status FROM pendaftaran a, siswa b, lowongan c, jurusan d WHERE a.idAnggota=b.idSiswa AND a.idLoker=c.idLowongan AND b.jurusan=d.idJurusan AND c.status ='3' AND a.status='4' ORDER BY c.idLowongan ASC";
  $sql = "SELECT a.idDaftar, b.nisn, b.nama, d.nmJurusan, c.perusahaan, c.nmLoker, a.status FROM pendaftaran_loker a, siswa b, lowongan c, jurusan d WHERE a.idAnggota=b.idSiswa AND a.idLoker=c.idLowongan AND b.jurusan=d.idJurusan AND c.status ='3' ORDER BY c.idLowongan ASC";
  $query = mysqli_query($con, $sql);

  return $query;
}

function getRiwayatViewPerusahaan($id)
{
  global $con;
  // $sql = "SELECT a.idDaftar, b.nisn, b.nama, d.nmJurusan, c.perusahaan, c.nmLoker, a.status FROM pendaftaran a, siswa b, lowongan c, jurusan d WHERE a.idAnggota=b.idSiswa AND a.idLoker=c.idLowongan AND b.jurusan=d.idJurusan AND c.status ='3' AND c.usrInput='$id' ORDER BY c.idLowongan ASC";
  $sql = "SELECT a.idDaftar, b.nisn, b.nama, d.nmJurusan, c.perusahaan, c.nmLoker, a.status FROM pendaftaran_loker a, siswa b, lowongan c, jurusan d WHERE a.idAnggota=b.idSiswa AND a.idLoker=c.idLowongan AND b.jurusan=d.idJurusan AND c.status ='3' ORDER BY c.idLowongan ASC";
  $query = mysqli_query($con, $sql);

  return $query;
}

function getRiwayatKeterima($id)
{
  global $con;
  // $sql = "SELECT a.idDaftar, b.nisn, b.nama, d.nmJurusan, c.perusahaan, c.nmLoker, a.status FROM pendaftaran a, siswa b, lowongan c, jurusan d WHERE a.idAnggota=b.idSiswa AND a.idLoker=c.idLowongan AND b.jurusan=d.idJurusan AND c.status ='3'  AND a.status='4' AND c.usrInput='$id' ORDER BY c.idLowongan ASC";
  $sql = "SELECT a.idDaftar, b.nisn, b.nama, d.nmJurusan, c.perusahaan, c.nmLoker, a.status FROM pendaftaran_loker a, siswa b, lowongan c, jurusan d WHERE a.idAnggota=b.idSiswa AND a.idLoker=c.idLowongan AND b.jurusan=d.idJurusan AND c.status ='3' ORDER BY c.idLowongan ASC";
  $query = mysqli_query($con, $sql);

  return $query;
}

function getSelectRiwayat()
{
  global $con;
  $sql = "SELECT DISTINCT idLowongan, perusahaan, nmLoker FROM lowongan WHERE status='3'";
  $query = mysqli_query($con, $sql);

  return $query;
}

function getRiwayatPerusahaan($id)
{
  global $con;
  $sql = "SELECT DISTINCT a.idLowongan, a.perusahaan, a.nmLoker FROM lowongan a, user b WHERE a.usrInput=b.idUser AND a.status='3' AND b.idLevel = '4' AND a.usrInput='$id'";
  $query = mysqli_query($con, $sql);
  return $query;
}

function getAlumni()
{
  global $con;
  $sql = "SELECT a.idAlumni, b.nisn, a.nmInstansi, a.status, b.nama, c.nmJurusan, b.noTelp, a.thnLulus FROM alumni a, siswa b, jurusan c WHERE a.nisn=b.nisn AND b.jurusan=c.idJurusan ORDER BY a.thnLulus ASC ";
  $query = mysqli_query($con, $sql);
  return $query;
}

function cekAlumni($id)
{
  global $con;
  $sql = "SELECT c.nisn FROM `user` a, siswa b, alumni c WHERE a.idDaftar=b.idSiswa AND c.nisn=b.nisn AND a.idLevel='2' AND a.idUser='$id'";
  $query = mysqli_query($con, $sql);
  return $query;
}

function getDataAlumni($id)
{
  global $con;
  $sql = "SELECT c.*, b.nama, b.alamat FROM `user` a, siswa b, alumni c WHERE a.idDaftar=b.idSiswa AND c.nisn=b.nisn AND a.idLevel='2' AND a.idUser='$id'";
  $query = mysqli_query($con, $sql);
  return $query;
}

function getLokerIndex()
{
  global $con;
  $sql = "SELECT * FROM lowongan WHERE status='2' ORDER BY idLowongan DESC LIMIT 3";
  $query = mysqli_query($con, $sql);
  return $query;
}

function getCekLoker()
{
  global $con;
  $cekLoker = "SELECT b.idLevel FROM `lowongan` `a`, `user` `b` WHERE a.usrInput=b.idUser";
  $result = mysqli_query($con, $cekLoker);
  return $result;
  // return $query;
}
function getLokerAll()
{
  global $con;
  $sql = "SELECT * FROM `lowongan` WHERE status='2' ORDER BY idLowongan DESC";
  $query = mysqli_query($con, $sql);

  return $query;
}

function getLokerAllLogo()
{
  global $con;
  $sql = "SELECT a.*, b.nmPerusahaan, b.logo FROM `lowongan` `a`, `data_perusahaan` `b`, `user` `c`  WHERE a.usrInput=c.idUser AND c.idDaftar=b.idPerusahaan AND a.status='2' AND c.idLevel='4' ORDER BY a.idLowongan DESC";
  $query = mysqli_query($con, $sql);
  return $query;

}

function getJurusan()
{
  global $con;
  $sql = "SELECT * FROM `jurusan`";
  $query = mysqli_query($con, $sql);

  return $query;
}

function getHistoryAnggota($id)
{
  global $con;
  // $sql = "SELECT a.idDaftar, a.berkas, a.status, a.tglDaftar, b.nisn, b.nama, c.perusahaan, c.nmLoker FROM `pendaftaran` `a` JOIN `siswa` `b` JOIN `lowongan` `c` ON a.idAnggota=b.idSiswa AND a.idLoker=c.idLowongan WHERE a.idAnggota='$id'";
  $sql = "SELECT a.idDaftar, a.berkas, a.status, a.tglDaftar, b.nisn, b.nama, c.perusahaan, c.nmLoker FROM `pendaftaran_loker` `a` JOIN `siswa` `b` JOIN `lowongan` `c` ON a.idAnggota=b.idSiswa AND a.idLoker=c.idLowongan WHERE a.idAnggota='$id'";
  $query = mysqli_query($con, $sql);

  return $query;
}

function getDateTest()
{
  global $con;
  // $date = date('Y-m-d');
  $sql = "SELECT a.*, b.noLoker, b.perusahaan, b.nmLoker FROM jadwal a, lowongan b WHERE a.idLoker=b.idLowongan AND b.status='2' AND a.tglSeleksi >= 'CURRENT_DATE()'";
  $query = mysqli_query($con, $sql);

  return $query;
}

function getJadwal()
{
  global $con;
  $sql ="SELECT a.*, b.perusahaan, b.nmLoker FROM jadwal a, lowongan b WHERE a.idLoker=b.idLowongan";
  $query = mysqli_query($con, $sql);
  return $query;
}

function getDateTestAnggota($id)
{
  global $con;
  // $sql = "SELECT a.perusahaan, a.nmLoker, c.* FROM lowongan a, pendaftaran b, jadwal c WHERE b.idLoker=a.idLowongan AND c.idLoker=a.idLowongan AND c.tglSeleksi <= CURRENT_DATE() AND b.idAnggota='$id'";
  // $sql = "SELECT a.perusahaan, a.nmLoker, c.* FROM lowongan a, pendaftaran b, jadwal c WHERE b.idLoker=a.idLowongan AND c.idLoker=a.idLowongan AND c.tglSeleksi >= CURRENT_DATE() AND b.idAnggota='$id'";
  $sql = "SELECT a.perusahaan, a.nmLoker, c.* FROM lowongan a, pendaftaran_loker b, jadwal c WHERE b.idLoker=a.idLowongan AND c.idLoker=a.idLowongan AND c.tglSeleksi >= CURRENT_DATE() AND b.idAnggota='$id'";
  $query = mysqli_query($con, $sql);

  return $query;
}

function getJadwalPerusahaan($id)
{
  global $con;
  $sql ="SELECT a.*, b.perusahaan, b.nmLoker FROM jadwal a, lowongan b WHERE a.idLoker=b.idLowongan AND b.usrInput = '$id'";
  $query = mysqli_query($con, $sql);
  return $query;
}

function getHasilAll()
{
  global $con;
  $sql = "SELECT a.*, b.nmLoker, b.perusahaan, b.noLoker FROM hasil a, lowongan b WHERE a.idLoker=b.idLowongan AND a.status='2'";
  $query = mysqli_query($con, $sql);
  return $query;
}

function SelectSiswa()
{
  global $con;
  $sql = "SELECT a.*, b.nmJurusan FROM siswa a JOIN jurusan b ON a.jurusan=b.idJurusan ORDER BY a.tahunMasuk ASC ";
  $query = mysqli_query($con, $sql);

  return $query;
}

function SelectLowongan()
{
  global $con;
  $sql = "SELECT * FROM `lowongan` ORDER BY idLowongan DESC";
  $query = mysqli_query($con, $sql);
  return $query;
}

function reportLowongan()
{
  global $con;
  $sql = "SELECT * FROM `lowongan` WHERE `status` = '3' ORDER BY idLowongan DESC";
  $query = mysqli_query($con, $sql);
  return $query;
}

function SelectLowonganAnggota()
{
  global $con;
  $sql = "SELECT * FROM `lowongan` WHERE status = '2' ORDER BY idLowongan DESC";
  $query = mysqli_query($con, $sql);
  return $query;
}

function getLowongan($id)
{
  global $con;
  $sql = "SELECT * FROM `lowongan` WHERE usrInput = '$id' AND `status` ='2' ORDER BY idLowongan DESC";
  $query = mysqli_query($con, $sql);
  return $query;
}

function reportLowonganperusahaan($id)
{
  global $con;
  $sql = "SELECT * FROM `lowongan` WHERE usrInput = '$id' AND `status`= '3' ORDER BY idLowongan DESC";
  $query = mysqli_query($con, $sql);
  return $query;
}

function SelectLowonganperusahaan($id)
{
  global $con;
  $sql = "SELECT * FROM `lowongan` WHERE usrInput = '$id' ORDER BY idLowongan DESC";
  $query = mysqli_query($con, $sql);
  return $query;
}

function MaxIdProgram()
{
  global $con;

  $carikode = mysqli_query($con, "SELECT MAX(noLoker) FROM lowongan");
  $datakode = mysqli_fetch_array($carikode);
  $tahun = date ('Y');
  if ($datakode) {
    // $nilaikode = substr($datakode[0], 3);
    $nilaikode = substr($datakode[0],8);
    $kode = (int) $nilaikode;
    $kode = $kode + 1;

    // $hasilkode = "PLDN" . str_pad($kode, 2, "0", STR_PAD_LEFT);
    $hasilkode = "LK-". $tahun . "-" . str_pad($kode, 3, "0", STR_PAD_LEFT);
  } else {
    $hasilkode = "LK-". $tahun . "-001";
  }

  return $hasilkode;
}

function ArsipOto()
{
  global $con;
  $date = date('Y-m-d');
  $sql = "UPDATE lowongan SET status='3' WHERE batas='$date'";
  // $sql = "UPDATE lowongan SET status='3' WHERE batas=CURRENT_DATE()";
  $query = mysqli_query($con, $sql);

  return $query;
}

function getAllPerusahaan()
{
  global $con;
  // $sql = "SELECT a.* FROM perusahaan a, user b WHERE b.idDaftar=a.idPerusahaan AND idLevel='4' AND b.status='1'";
  $sql = "SELECT a.* FROM data_perusahaan a, user b WHERE b.idDaftar=a.idPerusahaan AND idLevel='4' AND b.status='1'";
  $query = mysqli_query($con, $sql);

  return $query;
}

function cekLoker($id)
{
  global $con;
  $cekUser = "SELECT idLevel from user WHERE idUser='$id'"; 
  $query = mysqli_query($con, $cekUser);
  $row = mysqli_fetch_row($query);
  $level = $row[0];

  switch ($level) {
    case '1':
      $sql = "SELECT COUNT(idLowongan) from lowongan WHERE status='1' AND status !='3'"; 
      break;
    case '2':
      $sql = "SELECT COUNT(idLowongan) from lowongan WHERE status='2' AND status !='3' ORDER BY idLowongan DESC LIMIT 1"; 
      break;
    case '3':
      $sql = "SELECT COUNT(idLowongan) from lowongan WHERE status='1' AND status !='3' "; 
      break;
    case '4':
      $sql = "SELECT COUNT(idLowongan) from lowongan WHERE usrInput='$id' AND status='1' AND status !='3'"; 
      break;
  }
  
  $query = mysqli_query($con, $sql);

  return $query;
}

function getAlumniStudi()
{
  global $con;
  $sql ="SELECT a.idAlumni, b.nisn, a.nmInstansi, b.nama, c.nmJurusan, b.noTelp, a.thnLulus FROM alumni a, siswa b, jurusan c WHERE a.nisn=b.nisn AND b.jurusan=c.idJurusan AND a.status='Studi'";
  $query = mysqli_query($con, $sql);
  return $query;
}

function getAlumniKerja()
{
  global $con;
  $sql ="SELECT a.idAlumni, b.nisn, a.nmInstansi, a.status, b.nama, c.nmJurusan, b.noTelp, a.thnLulus FROM alumni a, siswa b, jurusan c WHERE a.nisn=b.nisn AND b.jurusan=c.idJurusan AND a.status='Bekerja'";
  $query = mysqli_query($con, $sql);
  return $query;
}

function getPendaftar()
{
  global $con;
  // $sql = "SELECT a.*, b.perusahaan, b.nmLoker, c.nisn, c.nama, d.nmJurusan FROM pendaftaran a, lowongan b, siswa c, jurusan d WHERE a.idLoker=b.idLowongan AND a.idAnggota=c.idSiswa AND c.jurusan=d.idJurusan";
  $sql = "SELECT a.*, b.perusahaan, b.nmLoker, c.nisn, c.nama, d.nmJurusan FROM pendaftaran_loker a, lowongan b, siswa c, jurusan d WHERE a.idLoker=b.idLowongan AND a.idAnggota=c.idSiswa AND c.jurusan=d.idJurusan";
  $query = mysqli_query($con, $sql);
  return $query;
}

function getPendaftarPer($id)
{
  global $con;
  // $sql = "SELECT a.*, b.perusahaan, b.nmLoker, c.nisn, c.nama, d.nmJurusan FROM pendaftaran a, lowongan b, siswa c, jurusan d WHERE a.idLoker=b.idLowongan AND a.idAnggota=c.idSiswa AND c.jurusan=d.idJurusan AND b.usrInput = '$id' ";
  $sql = "SELECT a.*, b.perusahaan, b.nmLoker, c.nisn, c.nama, d.nmJurusan FROM pendaftaran_loker a, lowongan b, siswa c, jurusan d WHERE a.idLoker=b.idLowongan AND a.idAnggota=c.idSiswa AND c.jurusan=d.idJurusan AND b.usrInput = '$id' ";
  $query = mysqli_query($con, $sql);
  return $query;
}

function getPendaftarHistory()
{
  global $con;
  // $sql ="SELECT a.nisn, b.nama, b.jurusan, c.nm_perusahaan, c.nm_loker, a.status FROM tb_pendaftaran a, tb_peserta b, tb_loker c WHERE a.nisn=b.nisn AND a.id_loker=c.id_loker AND a.status !='Proses'";
  // $sql ="SELECT b.nisn, d.nama, d.jurusan, a.berkas, a.tglDaftar, c.perusahaan, c.nmLoker, a.status FROM pendaftaran a, anggota b, lowongan c, siswa d WHERE a.idAnggota=b.idAnggota AND a.idLoker=c.idLowongan AND b.nisn=d.nisn AND a.status !='Proses'";
  // $sql = "SELECT a.*, b.perusahaan, b.nmLoker, c.nisn, c.nama, d.nmJurusan FROM pendaftaran a, lowongan b, siswa c, jurusan d WHERE a.idLoker=b.idLowongan AND a.idAnggota=c.idSiswa AND c.jurusan=d.idJurusan AND b.status='Arsip'";
  $sql = "SELECT a.*, b.perusahaan, b.nmLoker, c.nisn, c.nama, d.nmJurusan FROM pendaftaran_loker a, lowongan b, siswa c, jurusan d WHERE a.idLoker=b.idLowongan AND a.idAnggota=c.idSiswa AND c.jurusan=d.idJurusan AND b.status='Arsip'";
  $query = mysqli_query($con, $sql);
  return $query;
}

function getHasil()
{
  global $con;
  // $sql ="SELECT a.kode_hasil, a.berkas, b.nm_perusahaan, b.nm_loker FROM tb_kelulusan a, tb_loker b WHERE a.id_loker=b.id_loker";
  $sql ="SELECT a.*, b.perusahaan, b.nmLoker FROM hasil a, lowongan b WHERE a.idLoker=b.idLowongan";
  $query = mysqli_query($con, $sql);
  return $query;
}

function getHasilAnggota($id)
{
  global $con;
  // $sql ="SELECT a.perusahaan, a.nmLoker, c.file, c.keterangan, c.tglInput, c.idHasil FROM lowongan a, pendaftaran b, hasil c WHERE b.idLoker=a.idLowongan AND c.idLoker=a.idLowongan AND c.status='2' AND b.idAnggota='$id' ORDER BY c.idHasil DESC ";
  $sql ="SELECT a.perusahaan, a.nmLoker, c.file, c.keterangan, c.tglInput, c.idHasil FROM lowongan a, pendaftaran_loker b, hasil c WHERE b.idLoker=a.idLowongan AND c.idLoker=a.idLowongan AND c.status='2' AND b.idAnggota='$id' ORDER BY c.idHasil DESC ";
  $query = mysqli_query($con, $sql);
  return $query;
}
function getHasilPerusahaan($id)
{
  global $con;
  $sql ="SELECT a.noLoker, a.perusahaan, a.nmLoker, b.file, b.keterangan, b.tglInput FROM lowongan a, hasil b WHERE b.idLoker=a.idLowongan AND b.usrInput='$id' ORDER BY b.idHasil DESC";
  $query = mysqli_query($con, $sql);
  return $query;
}

function jurusan()
{
  global $con;
  $sql ="SELECT * FROM `jurusan`";
  $query = mysqli_query($con, $sql);
  return $query;
}

function insertSiswa()
{
  global $con;
  // echo $_POST['nisn'];
  // echo $_POST['nama'];
  // die();
  $sql_insert = "INSERT INTO siswa (`nisn`, `nama`, `email`, `jekel`, `tempatLhr`, `tglLhr`, `nmOrtu`, `alamat`, `noTelp`, `jurusan`, `tahunMasuk`) VALUES (
					'" . $_POST['nisn'] . "',
					'" . $_POST['nama'] . "',
					'" . $_POST['email'] . "',
					'" . $_POST['jekel'] . "',
					'" . $_POST['tempat'] . "',
					'" . $_POST['tgl'] . "',
					'" . $_POST['nmOrtu'] . "',
					'" . $_POST['alamat'] . "',
					'" . $_POST['telp'] . "',
					'" . $_POST['jurusan'] . "',
          '" . $_POST['tahun'] . "')";

  $query_insert = mysqli_query($con, $sql_insert) or die(mysqli_connect_error());

  if ($query_insert) {
    echo "<script>alert('Simpan Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=siswa'>";
  } else {
    echo "<script>alert('Simpan Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=siswa'>";
  }
}

function getTahunSiswa()
{
  global $con;
  $sql = "SELECT DISTINCT tahunMasuk FROM siswa ORDER BY tahunMasuk DESC";
  $query = mysqli_query($con, $sql);
  return $query;
}

function updateSiswa()
{
  global $con;

  $sql_ubah = "UPDATE siswa SET
        nisn ='" . $_POST['nisn'] . "',
        nama ='" . $_POST['Nama'] . "',
        email ='" . $_POST['email'] . "',
        jekel ='" . $_POST['jekel'] . "',
        tempatLhr ='" . $_POST['tempat'] . "',
        tglLhr ='" . $_POST['tglLahir'] . "',
        nmOrtu ='" . $_POST['ortu'] . "',
        alamat ='" . $_POST['alamat'] . "',
        noTelp ='" . $_POST['notelp'] . "',
        jurusan ='" . $_POST['jurusan'] . "',
        tahunMasuk ='" . $_POST['tahun'] . "'
        WHERE idSiswa ='" . $_POST['id'] . "'";
  $query_ubah = mysqli_query($con, $sql_ubah);

  if ($query_ubah) {
    echo "<script>alert('Ubah Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=siswa'>";
  } else {
    echo "<script>alert('Ubah Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=siswa'>";
  }
}
function deleteSiswa($id)
{
  global $con;

  $sql_hapus = "DELETE FROM siswa WHERE idSiswa ='$id' ";
  $query_hapus = mysqli_query($con, $sql_hapus);

  if ($query_hapus) {
    echo "<script>alert('Hapus Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=siswa'>";
  } else {
    echo "<script>alert('Hapus Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=siswa'>";
  }
}

function insertJurusan()
{
  global $con;
  $sql_insert = "INSERT INTO jurusan (nmJurusan, keterangan) VALUES (
					'" . $_POST['nmJurusan'] . "',
          '" . $_POST['ket'] . "')";

  $query_insert = mysqli_query($con, $sql_insert) or die(mysqli_connect_error());

  if ($query_insert) {
    echo "<script>alert('Simpan Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=jurusan'>";
  } else {
    echo "<script>alert('Simpan Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=jurusan'>";
  }
}

function updateJurusan()
{
  global $con;

  $sql_ubah = "UPDATE jurusan SET
        nmJurusan='" . $_POST['nmJurusan'] . "',
        keterangan='" . $_POST['ket'] . "'
        WHERE idJurusan='" . $_POST['idJurusan'] . "'";
  $query_ubah = mysqli_query($con, $sql_ubah);

  if ($query_ubah) {
    echo "<script>alert('Ubah Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=jurusan'>";
  } else {
    echo "<script>alert('Ubah Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=jurusan'>";
  }
}

function deleteJurusan($id)
{
  global $con;

  $sql_hapus = "DELETE FROM jurusan WHERE idJurusan='$id' ";
  $query_hapus = mysqli_query($con, $sql_hapus);

  if ($query_hapus) {
    echo "<script>alert('Hapus Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=jurusan''>";
  } else {
    echo "<script>alert('Hapus Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=jurusan''>";
  }
}

function Upload_Files($namePost, $codePost)
{
  $ekstensi_diperbolehkan  = array('jpg', 'png', 'jpeg', 'pdf', 'docx', 'doc');
  $date = date('Y-m-d');
  $nama = $_FILES[$namePost]['name'];
  $x = explode('.', $nama);
  $ekstensi = strtolower(end($x));
  $namas = 'Loker_' . $_POST[$codePost] . "_" . $date ."." . $ekstensi;
  $ukuran = $_FILES[$namePost]['size'];
  $file_tmp = $_FILES[$namePost]['tmp_name'];

  if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    if ($ukuran < 41943040) {
      $destination_path = getcwd().DIRECTORY_SEPARATOR . 'file_data\loker' . '/';

      $target_path = $destination_path . $namas;

      @move_uploaded_file($file_tmp, $target_path);
      return $namas;
    } else {
      return;
    }
  } else {
    return;
  }
}

function insertLowongan($upload)
{
  global $con;
  $tgl = date('Y-m-d H:i:s');
  $idLevel = $_SESSION["ses_idLevel"];
  $idDaftar = $_SESSION["ses_idDaftar"];
  switch ($idLevel) {
    case '1':
      $sql_insert = "INSERT INTO lowongan (`noLoker`, `perusahaan`, `nmLoker`, `jekel`, `file`, `kualifikasi`, `persyaratan`, `keterangan`, `sumber`, `batas`, `status`, `logo`, `tglInput`,  `usrInput`) VALUES (
        '" . $_POST['noLoker'] . "',
        '" . $_POST['perusahaan'] . "',
        '" . $_POST['nmloker'] . "',
        '" . $_POST['jekel'] . "',
        '" . $upload . "',
        '" . $_POST['kualifikasi'] . "',
        '" . $_POST['persyaratan'] . "',
        '" . $_POST['ket'] . "',
        '" . $_POST['sumber'] . "',
        '" . $_POST['batas'] . "',
        '2',
        'default.png',
        '$tgl',
        '" . $_POST['usrInput'] . "')";

      break;
    case '4':
      $sql_logo = " SELECT logo FROM perusahaan WHERE idPerusahaan = '$idDaftar' ";
      $query_logo = mysqli_query($con, $sql_logo);
      $row = mysqli_fetch_row($query_logo);
      $logo = $row[0];
      if($logo != NULL){
      $sql_insert = "INSERT INTO lowongan (`noLoker`, `perusahaan`, `nmLoker`, `jekel`, `file`, `kualifikasi`, `persyaratan`, `keterangan`, `sumber`, `batas`, `status`, `logo`, `tglInput`,  `usrInput`) VALUES (
        '" . $_POST['noLoker'] . "',
        '" . $_POST['perusahaan'] . "',
        '" . $_POST['nmloker'] . "',
        '" . $_POST['jekel'] . "',
        '" . $upload . "',
        '" . $_POST['kualifikasi'] . "',
        '" . $_POST['persyaratan'] . "',
        '" . $_POST['ket'] . "',
        '" . $_POST['sumber'] . "',
        '" . $_POST['batas'] . "',
        '1',
        '" . $logo . "',
        '$tgl',
        '" . $_POST['usrInput'] . "')";
      } else{
        $sql_insert = "INSERT INTO lowongan (`noLoker`, `perusahaan`, `nmLoker`, `jekel`, `file`, `kualifikasi`, `persyaratan`, `keterangan`, `sumber`, `batas`, `status`, `logo`, `tglInput`,  `usrInput`) VALUES (
          '" . $_POST['noLoker'] . "',
          '" . $_POST['perusahaan'] . "',
          '" . $_POST['nmloker'] . "',
          '" . $_POST['jekel'] . "',
          '" . $upload . "',
          '" . $_POST['kualifikasi'] . "',
          '" . $_POST['persyaratan'] . "',
          '" . $_POST['ket'] . "',
          '" . $_POST['sumber'] . "',
          '" . $_POST['batas'] . "',
          '1',
          'default.png',
          '$tgl',
          '" . $_POST['usrInput'] . "')";
      }
      break;
  }
  
  $query_insert = mysqli_query($con, $sql_insert) or die(mysqli_connect_error());

  if ($query_insert) {
    echo "<script>alert('Simpan Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=lowongan'>";
  } else {
    echo "<script>alert('Simpan Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=lowongan'>";
  }
}

function updateLowongan()
{
  global $con;

  $sql_ubah = "UPDATE lowongan SET
        perusahaan = '" . $_POST['editNmPer'] . "',
        nmLoker = '" . $_POST['editNmLoker'] . "',
        jekel = '" . $_POST['editJekel'] . "',
        file = '" . $_POST['editNmPer'] . "',
        kualifikasi = '" . $_POST['editKual'] . "',
        persyaratan = '" . $_POST['editPersy'] . "',
        keterangan = '" . $_POST['editKet'] . "',
        batas ='" . $_POST['editBatas'] . "'
        WHERE idLowongan='" . $_POST['editID'] . "'";
  $query_ubah = mysqli_query($con, $sql_ubah);

  if ($query_ubah) {
    echo "<script>alert('Ubah Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=lowongan'>";
  } else {
    echo "<script>alert('Ubah Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=lowongan'>";
  }
}

function deleteLowongan($id)
{
  global $con;
  $cek_hasil = "SELECT `file` FROM lowongan WHERE idLowongan ='$id'";
  $query = mysqli_query($con, $cek_hasil);
  $row = mysqli_fetch_row($query);
  $files = $row[0];
  unlink('file_data/loker/' . $files);
  $sql_hapus = "DELETE FROM lowongan WHERE idLowongan='$id' ";
  $query_hapus = mysqli_query($con, $sql_hapus);

  if ($query_hapus) {
    echo "<script>alert('Hapus Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=lowongan''>";
  } else {
    echo "<script>alert('Hapus Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=lowongan''>";
  }
}

function validasiLowongan($id)
  {
    global $con;

    $sql_validasi = "UPDATE lowongan SET status = '2' WHERE idLowongan='$id'";
      $query_validasi = mysqli_query($con, $sql_validasi);

      if ($query_validasi) {
        echo "<script>alert('Validasi Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=lowongan''>";
      } else {
        echo "<script>alert('Validasi Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=lowongan''>";
      }
  }

// function validasiLowongan($id)
// {
//   global $con;

//   $sql_no = "SELECT noWa FROM data_anggota";
//   $sql_no = "SELECT noWa FROM anggota";
//   $query_no = mysqli_query($con, $sql_no);

//   $cekNisn = "SELECT `perusahaan`, `nmLoker` FROM `lowongan` WHERE `idLowongan` = $id";
//   $query = mysqli_query($con, $cekNisn);
//   $row = mysqli_fetch_row($query);

//   $textt = "Kepada Anggota BKK, Terdapat lowongan baru $row[1] dari perusahaan $row[0]";
//   $rplc = str_replace(' ', '%20', $textt);

//   foreach ($query_no as $value) {
//     $curl = curl_init();

//     $noWa = $value['noWa'];

//     curl_setopt_array($curl, array(
//       CURLOPT_URL => "https://panel.rapiwha.com/send_message.php?apikey=BVHKMPMKEXZZ0O0GHO2T&number=$noWa&text=$rplc",
//       CURLOPT_RETURNTRANSFER => true,
//       CURLOPT_ENCODING => "",
//       CURLOPT_MAXREDIRS => 10,
//       CURLOPT_TIMEOUT => 30,
//       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//       CURLOPT_CUSTOMREQUEST => "GET",
//     ));

//     $response = curl_exec($curl);
//     $err = curl_error($curl);

//     curl_close($curl);

//     if ($err) {
//       echo "cURL Error #:" . $err;
//     } else {
//         $sql_validasi = "UPDATE lowongan SET
//         status = '2'
//         WHERE idLowongan='$id'";
        
//         $query_validasi = mysqli_query($con, $sql_validasi);

//         if ($query_validasi) {
//           echo "<script>alert('Validasi Berhasil')</script>";
//           echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=lowongan''>";
//         } else {
//           echo "<script>alert('Validasi Gagal')</script>";
//           echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=lowongan''>";
//         }
//     }
//   }
// }

function insertJadwal()
{
  global $con;
  $tgl = date('Y-m-d H:i:s');
  $sql_insert = "INSERT INTO jadwal (`idLoker`, `tempat`, `tglSeleksi`, `waktu`, `keterangan`, `tglInput`, `usrInput`) VALUES (
					'" . $_POST['noLoker'] . "',
					'" . $_POST['tempat'] . "',
					'" . $_POST['tanggal'] . "',
					'" . $_POST['waktu'] . "',
					'" . $_POST['ket'] . "',
					'" . $tgl . "',
          '" . $_POST['usrInput'] . "')";

  $query_insert = mysqli_query($con, $sql_insert) or die(mysqli_connect_error());

  if ($query_insert) {
    echo "<script>alert('Simpan Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=jadwal'>";
  } else {
    echo "<script>alert('Simpan Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=jadwal'>";
  }
}

function updateJadwal()
{
  global $con;

  $sql_ubah = "UPDATE jadwal SET
        tempat='" . $_POST['tempat'] . "',
        tglSeleksi='" . $_POST['tanggal'] . "',
        waktu='" . $_POST['waktu'] . "',
        keterangan='" . $_POST['ket'] . "'
        WHERE idJadwal='" . $_POST['idJadwal'] . "'";
  $query_ubah = mysqli_query($con, $sql_ubah);

  if ($query_ubah) {
    echo "<script>alert('Ubah Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=jadwal'>";
  } else {
    echo "<script>alert('Ubah Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=jadwal'>";
  }
}

function deleteJadwal($id)
{
  global $con;

  $sql_hapus = "DELETE FROM jadwal WHERE idJadwal='$id' ";
  $query_hapus = mysqli_query($con, $sql_hapus);

  if ($query_hapus) {
    echo "<script>alert('Hapus Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=jadwal''>";
  } else {
    echo "<script>alert('Hapus Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=jadwal''>";
  }
}

function uploadHasil($namePost)
{
  $name = $_SESSION["ses_nama"];
  $namaPengirim = str_replace(' ', '_', $name);
  $date = date('Y-m-d');
  $ekstensi_diperbolehkan  = array('jpg', 'png', 'jpeg', 'pdf');
  $nama = $_FILES[$namePost]['name'];
  
  $x = explode('.', $nama);
  $ekstensi = strtolower(end($x));
  $namas = 'Hasil_' . $namaPengirim . '_' . $date . "." . $ekstensi;
  $ukuran  = $_FILES[$namePost]['size'];
  $file_tmp = $_FILES[$namePost]['tmp_name'];
  

  if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    if ($ukuran < 41943040) {
      $destination_path = getcwd().DIRECTORY_SEPARATOR . 'file_data\hasil' . '/';

      $target_path = $destination_path . $namas;

      @move_uploaded_file($file_tmp, $target_path);
      return $namas;
    } else {
      return;
    }
  } else {
    return;
  }
}

function insertHasil($uploadFiles)
{
  global $con;
  $tgl = date('Y-m-d H:i:s');
  $idLevel = $_SESSION["ses_idLevel"];
  switch ($idLevel) {
    
    case '1':
      $sql_insert = "INSERT INTO hasil (`idLoker`, `file`, `keterangan`, `status`, `tglInput`, `usrInput`) VALUES (
        '" . $_POST['noLoker'] . "',
        '" . $uploadFiles . "',
        '" . $_POST['ket'] . "',
        '2',
        '" . $tgl . "',
        '" . $_POST['usrInput'] . "')";
      break;

    case '4':
      $sql_insert = "INSERT INTO hasil (`idLoker`, `file`, `keterangan`, `status`, `tglInput`, `usrInput`) VALUES (
        '" . $_POST['noLoker'] . "',
        '" . $uploadFiles . "',
        '" . $_POST['ket'] . "',
        '1',
        '" . $tgl . "',
        '" . $_POST['usrInput'] . "')";
      break;
  }
  $query_insert = mysqli_query($con, $sql_insert) or die(mysqli_connect_error());

  
  if ($query_insert) {
    echo "<script>alert('Simpan Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=hasil'>";
  } else {
    echo "<script>alert('Simpan Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=hasil'>";
  }
}

function updateHasil()
{
  global $con;

  $sql_ubah = "UPDATE hasil SET
        idLoker='" . $_POST['noLoker'] . "',
        keterangan='" . $_POST['ket'] . "'
        WHERE idHasil='" . $_POST['idHasil'] . "'";
  $query_ubah = mysqli_query($con, $sql_ubah);

  if ($query_ubah) {
    echo "<script>alert('Ubah Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=hasil'>";
  } else {
    echo "<script>alert('Ubah Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=hasil'>";
  }
}

function deleteHasil($id)
{
  global $con;
  $cek_hasil = "SELECT `file` FROM hasil WHERE idHasil ='$id'";
  $query = mysqli_query($con, $cek_hasil);
  $row = mysqli_fetch_row($query);
  $files = $row[0];
  unlink('file_data/hasil/' . $files);
  $sql_hapus = "DELETE FROM hasil WHERE idHasil='$id' ";
  $query_hapus = mysqli_query($con, $sql_hapus);

  if ($query_hapus) {
    echo "<script>alert('Hapus Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=hasil''>";
  } else {
    echo "<script>alert('Hapus Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=hasil''>";
  }
}

// function validasiHasil($id)
// {
//   global $con;


//   $sql_no = "SELECT c.noWa FROM pendaftaran_loker a, siswa b, data_anggota c WHERE a.idAnggota=b.idSiswa AND c.nisn=b.nisn AND a.status='4' AND a.idLoker='$id'";
//   $sql_no = "SELECT c.noWa FROM pendaftaran a, siswa b, anggota c WHERE a.idAnggota=b.idSiswa AND c.nisn=b.nisn AND a.status='4' AND a.idLoker='$id'";
//   $query_no = mysqli_query($con, $sql_no);

//   $cekLoker = "SELECT `perusahaan`, `nmLoker` FROM `lowongan` WHERE `idLowongan` = $id";
//   $query = mysqli_query($con, $cekLoker);
//   $row = mysqli_fetch_row($query);

//   $textt = "Kepada Anggota BKK, Selamat anda telah lulus dalam seleksi lowongan $row[1] dari perusahaan $row[0], silahkan cek di website untuk informasi lebih lanjut";
//   $rplc = str_replace(' ', '%20', $textt);

//   foreach ($query_no as $value) {
//     $curl = curl_init();

//     $noWa = $value['noWa'];

//     curl_setopt_array($curl, array(
//       CURLOPT_URL => "https://panel.rapiwha.com/send_message.php?apikey=BVHKMPMKEXZZ0O0GHO2T&number=$noWa&text=$rplc",
//       CURLOPT_RETURNTRANSFER => true,
//       CURLOPT_ENCODING => "",
//       CURLOPT_MAXREDIRS => 10,
//       CURLOPT_TIMEOUT => 30,
//       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//       CURLOPT_CUSTOMREQUEST => "GET",
//     ));

//     $response = curl_exec($curl);
//     $err = curl_error($curl);

//     curl_close($curl);

//     if ($err) {
//       echo "cURL Error #:" . $err;
//     } else {
//         $sql_validasi = "UPDATE hasil SET
        // status = '2'
//         WHERE idHasil='$id'";
        
//         $query_validasi = mysqli_query($con, $sql_validasi);

//         if ($query_validasi) {
//           echo "<script>alert('Validasi Berhasil')</script>";
//           echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=hasil''>";
//         } else {
//           echo "<script>alert('Validasi Gagal')</script>";
//           echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=hasil''>";
//         }
//     }
//   }
// }


function validasiHasil($id)
{
  global $con;

  $sql_validasi = "UPDATE hasil SET
        status = '2'
        WHERE idHasil='$id'";
  $query_validasi = mysqli_query($con, $sql_validasi);

  if ($query_validasi) {
    echo "<script>alert('Validasi Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=hasil''>";
  } else {
    echo "<script>alert('Validasi Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=hasil''>";
  }
}

function uploadBerkas($namePost, $nmLoker)
{
  $name = $_SESSION["ses_nama"];
  $namaPengirim = str_replace(' ', '_', $name);
  $namaLowongan = str_replace(' ', '_', $nmLoker);
  
  $date = date('Y-m-d');
  $ekstensi_diperbolehkan  = array('jpg', 'png', 'jpeg', 'pdf');
  $nama = $_FILES[$namePost]['name'];
  
  $x = explode('.', $nama);
  $ekstensi = strtolower(end($x));
  $namas = 'Daftar_' . $namaLowongan . "_" . $namaPengirim . "_" . $date ."." . $ekstensi;
  $ukuran  = $_FILES[$namePost]['size'];
  $file_tmp = $_FILES[$namePost]['tmp_name'];
  

  if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    if ($ukuran < 41943040) {
      $destination_path = getcwd().DIRECTORY_SEPARATOR . 'file_data\pendaftaran' . '/';

      $target_path = $destination_path . $namas;

      @move_uploaded_file($file_tmp, $target_path);
      return $namas;
    } else {
      return;
    }
  } else {
    return;
  }
}

function insertDaftar($uploadFiles)
{
  global $con;
  $tgl = date('Y-m-d H:i:s');
  // $sql_cek = "SELECT idDaftar FROM pendaftaran WHERE idLoker ='" . $_POST['idLoker'] . "' AND idAnggota = '" . $_POST['idDaftar'] . "'";
  $sql_cek = "SELECT idDaftar FROM pendaftaran_loker WHERE idLoker ='" . $_POST['idLoker'] . "' AND idAnggota = '" . $_POST['idDaftar'] . "'";
  $query = mysqli_query($con, $sql_cek);
  $row = mysqli_fetch_row($query);
  $idDaftar = $row[0];
  if($idDaftar == NULL){
            // $sql_insert = "INSERT INTO pendaftaran (`idLoker`, `idAnggota`, `berkas`, `status`, `tglDaftar`) VALUES (
            $sql_insert = "INSERT INTO pendaftaran_loker (`idLoker`, `idAnggota`, `berkas`, `status`, `tglDaftar`) VALUES (
              '" . $_POST['idLoker'] . "',
              '" . $_POST['idDaftar'] . "',
              '" . $uploadFiles . "',
              '1',
              '" . $tgl . "')";
            $query_insert = mysqli_query($con, $sql_insert) or die(mysqli_connect_error());
            if ($query_insert) {
              echo "<script>alert('Pendaftaran Berhasil')</script>";
              echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=history'>";
            } else {
              echo "<script>alert('Pendaftaran Gagal')</script>";
              echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=lowongan'>";
            }
    }else{
      echo "<script>alert('Maaf Anda telah melakukan pendaftaran sebelumnya, Tunggu Informasi lebih lanjut !!')</script>";
      echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=lowongan>";
    }
}

function updateDaftar($upload)
{
  global $con;
  // $cekNisn = "SELECT idDaftar, berkas FROM pendaftaran WHERE idDaftar = '" . $_POST['idDaftar'] . "' ";
  $cekNisn = "SELECT idDaftar, berkas FROM pendaftaran_loker WHERE idDaftar = '" . $_POST['idDaftar'] . "' ";
  $query = mysqli_query($con, $cekNisn);
  $row = mysqli_fetch_row($query);
    $idDaftar = $row[0];
    $berkas = $row[1];
    unlink('file_data/pendaftaran/' . $berkas);
  $sql_ubah = "UPDATE pendaftaran SET
        idLoker ='" . $_POST['idLoker'] . "',
        berkas ='" . $upload . "',
        keterangan='" . $_POST['ket'] . "'
        WHERE idDaftar='" . $_POST['idHasil'] . "'";
  $query_ubah = mysqli_query($con, $sql_ubah);

  if ($query_ubah) {
    echo "<script>alert('Ubah Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=daftar'>";
  } else {
    echo "<script>alert('Ubah Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=daftar'>";
  }
}

function deleteDaftar($id)
{
  global $con;
  $cek_daftar = "SELECT berkas FROM pendaftaran_loker WHERE idDaftar='$id'";
  // $cek_daftar = "SELECT berkas FROM pendaftaran WHERE idDaftar='$id'";
  $query = mysqli_query($con, $cek_daftar);
  $row = mysqli_fetch_row($query);
  $berkas = $row[0];
  
  unlink('file_data/pendaftaran/' . $berkas);
  
  
  $idLevel = $_SESSION["ses_idLevel"];
  // $sql_hapus = "DELETE FROM pendaftaran WHERE idDaftar='$id' ";
  $sql_hapus = "DELETE FROM pendaftaran_loker WHERE idDaftar='$id' ";
  $query_hapus = mysqli_query($con, $sql_hapus);

  if($idLevel == 2){
        if ($query_hapus) {
          echo "<script>alert('Hapus Berhasil')</script>";
          echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=history''>";
        } else {
          echo "<script>alert('Hapus Gagal')</script>";
          echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=history''>";
        }
      }else{
        if ($query_hapus) {
          echo "<script>alert('Hapus Berhasil')</script>";
          echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=daftar''>";
        } else {
          echo "<script>alert('Hapus Gagal')</script>";
          echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=daftar''>";
        }
  }
}

function validasiAdministrasi($id)
{
  global $con;

  // $sql_validasi = "UPDATE pendaftaran SET
  $sql_validasi = "UPDATE pendaftaran_loker SET
        status = '3'
        WHERE idDaftar='$id'";
  $query_validasi = mysqli_query($con, $sql_validasi);

  if ($query_validasi) {
    echo "<script>alert('Validasi Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=daftar'>";
  } else {
    echo "<script>alert('Validasi Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=daftar'>";
  }
}

function validasiLulus($id)
{
  global $con;

  // $sql_validasi = "UPDATE pendaftaran SET
  $sql_validasi = "UPDATE pendaftaran_loker SET
        status = '4'
        WHERE idDaftar='$id'";
  $query_validasi = mysqli_query($con, $sql_validasi);

  if ($query_validasi) {
    echo "<script>alert('Validasi Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=daftar'>";
  } else {
    echo "<script>alert('Validasi Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=daftar'>";
  }
}

function gagalLulus($id)
{
  global $con;

  // $sql_validasi = "UPDATE pendaftaran SET
  $sql_validasi = "UPDATE pendaftaran_loker SET
        status = '5'
        WHERE idDaftar='$id'";
  $query_validasi = mysqli_query($con, $sql_validasi);

  if ($query_validasi) {
    echo "<script>alert('Validasi Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=daftar'>";
  } else {
    echo "<script>alert('Validasi Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=daftar'>";
  }
}

function gagalAdm($id)
{
  global $con;

  // $sql_validasi = "UPDATE pendaftaran SET
  $sql_validasi = "UPDATE pendaftaran_loker SET
        status = '2'
        WHERE idDaftar='$id'";
  $query_validasi = mysqli_query($con, $sql_validasi);

  if ($query_validasi) {
    echo "<script>alert('Validasi Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=daftar'>";
  } else {
    echo "<script>alert('Validasi Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=daftar'>";
  }
}

function perusahaan()
{
  global $con;
  // $sql ="SELECT * FROM `perusahaan`";
  $sql ="SELECT * FROM `data_perusahaan`";
  $query = mysqli_query($con, $sql);
  return $query;
}

function upload_logo($namePost, $codePost)
{
  $ekstensi_diperbolehkan  = array('jpg', 'png', 'jpeg');
  $nmPerusahaan = str_replace(' ', '_', $_POST[$codePost]);
  $nama = $_FILES[$namePost]['name'];
  $x = explode('.', $nama);
  $ekstensi = strtolower(end($x));
  $namas = 'Logo_' . $nmPerusahaan. "." . $ekstensi;
  $ukuran = $_FILES[$namePost]['size'];
  $file_tmp = $_FILES[$namePost]['tmp_name'];
  if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    if ($ukuran < 41943040) {
      $destination_path = getcwd().DIRECTORY_SEPARATOR . 'file_data\logo' . '/';

      $target_path = $destination_path . $namas;

      @move_uploaded_file($file_tmp, $target_path);
      return $namas;
    } else {
      return;
    }
  } else {
    return;
  }
}
function insertPerusahaan($upload)
{
  global $con;
  $date = date('Y-m-d');
  $cekIdDaftar = "SELECT `AUTO_INCREMENT` as idDaftar FROM INFORMATION_SCHEMA.TABLES
  WHERE TABLE_SCHEMA = 'bkkmuh' AND TABLE_NAME = 'data_perusahaan' ";
  // WHERE TABLE_SCHEMA = 'bkkmuh' AND TABLE_NAME = 'perusahaan' ";
  $query = mysqli_query($con, $cekIdDaftar);
  $row = mysqli_fetch_row($query);
  $idDaftar = $row[0];

  // $sql_insert = "INSERT INTO perusahaan (`nmPerusahaan`, `email`, `stsPerusahaan`, `noTelp`, `tglKerjasama`, `logo`, `tglDaftar`) VALUES (
  $sql_insert = "INSERT INTO data_perusahaan (`nmPerusahaan`, `email`, `stsPerusahaan`, `noTelp`, `tglKerjasama`, `tglDaftar`) VALUES (
					'" . $_POST['nmPerusahaan'] . "',
          '" . $_POST['email'] . "',
					'" . $_POST['statusPer'] . "',
					'" . $_POST['telepon'] . "',
					'" . $_POST['tglKerjasama'] . "',
					'$upload',
          '$date')";

  $query_insert = mysqli_query($con, $sql_insert) or die(mysqli_connect_error());

  $sql_insertUser = "INSERT INTO user (`nama`,`username`, `password`, `idLevel`, `idDaftar`, `status`, `tglDaftar`) VALUES (
					'" . $_POST['nmPerusahaan'] . "',
					'" . $_POST['username'] . "',
          '" . $_POST['password'] . "',
					'4',
					'" . $idDaftar . "',
					'1',
          '$date')";

  $query_insertUser = mysqli_query($con, $sql_insertUser) or die(mysqli_connect_error());

  if ($query_insert && $query_insertUser) {
    echo "<script>alert('Simpan Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=perusahaan'>";
  } else {
    echo "<script>alert('Simpan Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=perusahaan'>";
  }
}

function updatePerusahaan($upload)
{
  global $con;
  $cekNisn = "SELECT logo FROM data_perusahaan WHERE idPerusahaan = '" . $_POST['idPerusahaan'] . "' ";
  // $cekNisn = "SELECT idDaftar, berkas FROM pendaftaran_loker WHERE idDaftar = '" . $_POST['idDaftar'] . "' ";
  $query = mysqli_query($con, $cekNisn);
  $row = mysqli_fetch_row($query);
    $berkas = $row[0];
    // unlink('file_data/logo/' . $berkas);
  // $sql_ubah = "UPDATE perusahaan SET
  $sql_ubah = "UPDATE data_perusahaan SET
        nmPerusahaan = '" . $_POST['nmPerusahaan'] . "',
        email = '" . $_POST['email'] . "',
        stsPerusahaan = '" . $_POST['status'] . "',
        noTelp = '" . $_POST['telepon'] . "',
        tglKerjasama = '" . $_POST['tglKerjasama'] . "',
        logo = '" . $upload . "'
        WHERE idPerusahaan ='" . $_POST['idPerusahaan'] . "'";
  $query_ubah = mysqli_query($con, $sql_ubah);

  if ($query_ubah) {
    echo "<script>alert('Ubah Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=perusahaan'>";
  } else {
    echo "<script>alert('Ubah Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=perusahaan'>";
  }
}
function deletePerusahaan($id)
{
  global $con;

  // $sql_hapus = "DELETE FROM perusahaan WHERE idPerusahaan='$id' ";
  $sql_hapus = "DELETE FROM data_perusahaan WHERE idPerusahaan='$id' ";
  $query_hapus = mysqli_query($con, $sql_hapus);

  $sql_hapusUser = "DELETE FROM user WHERE idDaftar='$id' AND idLevel ='4' ";
  $query_hapusUser = mysqli_query($con, $sql_hapusUser);

  if ($query_hapus && $query_hapusUser) {
    echo "<script>alert('Hapus Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=perusahaan''>";
  } else {
    echo "<script>alert('Hapus Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=perusahaan''>";
  }
}

function UsrGroup()
{
  global $con;
  $sql ="SELECT * FROM `usrgrup`";
  $query = mysqli_query($con, $sql);
  return $query;
}

function insertUsrGroup()
{
  global $con;
  $sql_insert = "INSERT INTO usrgrup (nmGroup, ket) VALUES (
					'" . $_POST['nmGroup'] . "',
          '" . $_POST['ket'] . "')";

  $query_insert = mysqli_query($con, $sql_insert) or die(mysqli_connect_error());
  if($query_insert) {
    echo '<script> 
    swal({
      title: "Berhasil !!!",
      text: "Menambahkan User Group",
      icon: "success"
    })
    .then((done) => {
      window.location = "indexAdm.php?pages=usrgroup";
    }); 
    </script>';
  } else {
    echo '<script type="text/javascript"> alert("gagal") </script>';
  }
  // if ($query_insert) {
  //   echo "<script>alert('Simpan Berhasil')</script>";
  //   echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=usrgroup'>";
  // } else {
  //   echo "<script>alert('Simpan Gagal')</script>";
  //   echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=usrgroup'>";
  // }
}

function updateUsrGroup()
{
  global $con;

  $sql_ubah = "UPDATE usrgrup SET
        nmGroup='" . $_POST['nmGroup'] . "',
        ket='" . $_POST['ket'] . "'
        WHERE idGroup='" . $_POST['idGroup'] . "'";
  $query_ubah = mysqli_query($con, $sql_ubah);

  if ($query_ubah) {
    echo "<script>alert('Ubah Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=usrgroup'>";
  } else {
    echo "<script>alert('Ubah Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=usrgroup'>";
  }
}
function deleteUsrGroup($id)
{
  global $con;

  $sql_hapus = "DELETE FROM usrgrup WHERE idGroup='$id' ";
  $query_hapus = mysqli_query($con, $sql_hapus);

  if ($query_hapus) {
    echo "<script>alert('Hapus Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=usrgroup''>";
  } else {
    echo "<script>alert('Hapus Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=usrgroup''>";
  }
}

function selectUser()
{
  global $con;
  $sql ="SELECT * FROM `user` `a` JOIN `usrgrup` `b` ON a.idLevel=b.idGroup";
  $query = mysqli_query($con, $sql);
  return $query;
}

function insertUser()
{
  global $con;
  

  $pass = $_POST['password'];
  $repass = $_POST['rePassword'];
  
  $tgl = date('Y-m-d H:i:s');
  if($pass != $repass){
    echo "<script>alert('Password tidak sama, Simpan Gagal !!')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=user'>";
    
  }else
      {
        $sql_insert = "INSERT INTO user (nama, username, password, idLevel, idDaftar, status, tglDaftar) VALUES (
          '" . $_POST['nmUser'] . "',
          '" . $_POST['username'] . "',
          '" . $_POST['password'] . "',
          '" . $_POST['idGroup'] . "',
          '0',
          '1',
          '" . $tgl . "')";
    
          $query_insert = mysqli_query($con, $sql_insert) or die(mysqli_connect_error());
          if ($query_insert) {
            echo "<script>alert('Simpan Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=user'>";
          } else {
            echo "<script>alert('Simpan Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=user'>";
          }
      }
}

function updateUser()
{
  global $con;

  $sql_ubah = "UPDATE user SET
        nama='" . $_POST['editNm'] . "',
        username='" . $_POST['editUsername'] . "',
        password='" . $_POST['editPass'] . "',
        idLevel='" . $_POST['level'] . "',
        status='" . $_POST['status'] . "'
        WHERE idUser='" . $_POST['editId'] . "'";
  $query_ubah = mysqli_query($con, $sql_ubah);

  if ($query_ubah) {
    echo "<script>alert('Ubah Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=user'>";
  } else {
    echo "<script>alert('Ubah Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=user'>";
  }
}
function updateAlumni(){
  global $con;

  $sql_ubah = "UPDATE alumni SET
        nisn = '" . $_POST['nisn'] . "',
        status = '" . $_POST['status'] . "',
        nmInstansi = '" . $_POST['nmInstansi'] . "',
        mulai = '" . $_POST['mulai'] . "',
        pekerjaan = '" . $_POST['pekerjaan'] . "',
        waktu = '" . $_POST['waktu'] . "',
        jnsPerusahaan = '" . $_POST['jnsPerusahaan'] . "',
        gaji = '" . $_POST['gaji'] . "',
        thnLulus = '" . $_POST['tahun'] . "'
        WHERE idAlumni = '" . $_POST['editId'] . "'";
  $query_ubah = mysqli_query($con, $sql_ubah);

  if ($query_ubah) {
    echo "<script>alert('Ubah Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=user'>";
  } else {
    echo "<script>alert('Ubah Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=user'>";
  }
}
function deleteUser($id)
{
  global $con;

  $sql_hapus = "DELETE FROM user WHERE idUser='$id' ";
  $query_hapus = mysqli_query($con, $sql_hapus);

  if ($query_hapus) {
    echo "<script>alert('Hapus Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=user''>";
  } else {
    echo "<script>alert('Hapus Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=user''>";
  }
}

function deleteKerja($id)
{
  global $con;

  $sql_hapus = "DELETE FROM alumni WHERE idAlumni='$id' ";
  $query_hapus = mysqli_query($con, $sql_hapus);

  if ($query_hapus) {
    echo "<script>alert('Hapus Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=kerja''>";
  } else {
    echo "<script>alert('Hapus Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=kerja''>";
  }
}

function deleteStudi($id)
{
  global $con;

  $sql_hapus = "DELETE FROM alumni WHERE idAlumni='$id' ";
  $query_hapus = mysqli_query($con, $sql_hapus);

  if ($query_hapus) {
    echo "<script>alert('Hapus Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=studi''>";
  } else {
    echo "<script>alert('Hapus Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0; url=indexAdm.php?pages=studi''>";
  }
}

function confirmUser()
{
  global $con;
  if (isset($_GET['kode'])) {
    $sql_arsip = "UPDATE user SET status = 'Aktif' where id = '" . $_GET['kode'] . "'";
    $query_arsip = mysqli_query($con, $sql_arsip);

    if ($query_arsip) {
      echo "<script>alert('Akun Diaktifkan')</script>";
      echo "<meta http-equiv='refresh' content='0; url=?page=user'>";
    } else {
      echo "<script>alert('Akun Gagal Diaktifkan')</script>";
      echo "<meta http-equiv='refresh' content='0; url=?page=user'>";
    }
  }
}
