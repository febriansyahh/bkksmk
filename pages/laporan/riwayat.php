<?php
ini_set("session.auto_start", 0);
include_once("__DIR__ .  ../../../../koneksi.php");
include_once("__DIR__ .  ../../../../fpdf/fpdf.php");

if (isset($_POST['submit'])) {
  $loker = $_POST['loker'];
  }
$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,2,2,2);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->ln(1);
$pdf->SetFont('Arial','B',13);
$pdf->Image('logos.png', 14, 1, 2, 'C');
$pdf->Cell(25.5,0.7,"Riwayat Pendaftaran Lowongan SMK MUHAMMADIYAH",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Printed On : ".date("D-d/M/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
//Tidak berpengaruh dengan database hanya sebagai keterangan pada tabel nantinya
$pdf->Cell(1, 0.8, 'No', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'NISN', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'Nama', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Jurusan', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'Perusahaan', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Lowongan', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Status', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
if($loker == 'NULL'){
$query=mysqli_query($con,"SELECT a.idDaftar, b.nisn, b.nama, d.nmJurusan, c.perusahaan, c.nmLoker, a.status FROM pendaftaran a, siswa b, lowongan c, jurusan d WHERE a.idAnggota=b.idSiswa AND a.idLoker=c.idLowongan AND b.jurusan=d.idJurusan AND a.status='4' ORDER BY c.idLowongan ASC");
}else{
  
$query=mysqli_query($con,"SELECT a.idDaftar, b.nisn, b.nama, d.nmJurusan, c.perusahaan, c.nmLoker, a.status FROM pendaftaran a, siswa b, lowongan c, jurusan d WHERE a.idAnggota=b.idSiswa AND a.idLoker=c.idLowongan AND b.jurusan=d.idJurusan AND a.status='4' AND c.idLowongan = '$loker' ORDER BY c.idLowongan ASC");
}
while($lihat=mysqli_fetch_array($query)){
$pdf->Cell(1, 0.8, $no, 1, 0, 'L');
$pdf->Cell(3, 0.8, $lihat['nisn'], 1, 0,'L');
$pdf->Cell(6, 0.8, $lihat['nama'], 1, 0,'L');
$pdf->Cell(4, 0.8, $lihat['nmJurusan'],1, 0, 'L');
$pdf->Cell(6, 0.8, $lihat['perusahaan'] ,1, 0, 'L');
$pdf->Cell(5, 0.8, $lihat['nmLoker'], 1, 0,'L');
switch ($lihat['status']) {
case '1':
$pdf->Cell(2, 0.8, 'Proses', 1, 1,'L');
break;
case '2':
$pdf->Cell(2, 0.8, 'Gagal Administrasi', 1, 1,'L');
break;
case '3':
$pdf->Cell(2, 0.8, 'Lolos Administrasi', 1, 1,'L');
break;
case '4':
$pdf->Cell(2, 0.8, 'Lulus', 1, 1,'L');
break;
case '5':
$pdf->Cell(2, 0.8, 'Tidak Lulus', 1, 1,'L');
break;
}

$no++;
}
$pdf->ln(1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(40.5,0.7,"Mengetahui",0,10,'C');

$pdf->ln(1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(40.5,0.7,"Kepala BKK",0,10,'C');
$pdf->Cell(40.5,0.7,"SMK MUHAMMADIYAH",0,10,'C');
//Nama file ketika di print
$nmLoker = "SELECT nmLoker FROM lowongan WHERE idLowongan = '$loker' ";
$query = mysqli_query($con, $nmLoker);
$row = mysqli_fetch_row($query);
$nama = $row[0];

if($loker == 'NULL'){
$pdf->Output("Laporan Riwayat Lowongan.pdf","I");
}else{
$pdf->Output("Laporan Riwayat Lowongan ". $nama .".pdf","I");
}
?>