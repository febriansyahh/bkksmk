<?php
ini_set("session.auto_start", 0);
include_once("__DIR__ .  ../../../../koneksi.php");
include_once("__DIR__ .  ../../../../fpdf/fpdf.php");

if (isset($_POST['submit'])) {
  $status = $_POST['status'];
  $tahun = $_POST['tahun'];
  }
$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,2,2,2);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Image('logos.png', 14, 1, 2, 'C');
$pdf->Cell(25.5,0.7,"Laporan Alumni",0,10,'C');
$pdf->Cell(25.5,0.7,"SMK Muhmmadiyah Kudus",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Printed On : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
//Tidak berpengaruh dengan database hanya sebagai keterangan pada tabel nantinya
$pdf->Cell(1, 0.8, 'No', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'NISN', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Nama', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Jenis Kelamin', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Status', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Instansi', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Tahun Lulus', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
if($status == 'NULL'){
if($tahun == 'NULL'){
  // echo 'Ini tanpa status dan tanpa tahun';
$query=mysqli_query($con,"SELECT a.*, b.nama, b.jekel FROM alumni a, siswa b WHERE a.nisn=b.nisn ORDER BY a.thnLulus ASC");
}else{
  // echo 'Ini tanpa status tapi dengan tahun';
$query=mysqli_query($con,"SELECT a.*, b.nama, b.jekel FROM alumni a, siswa b WHERE a.nisn=b.nisn AND a.thnLulus = '$tahun' ORDER BY a.thnLulus DESC");
}
}else{
if($tahun == 'NULL'){
  // echo 'Ini dengan status dan tanpa tahun';
$query=mysqli_query($con,"SELECT a.*, b.nama, b.jekel FROM alumni a, siswa b WHERE a.nisn=b.nisn AND a.status = '$status' ORDER BY a.thnLulus ASC");
}else{
  // echo 'Ini dengan status dan tahun';
$query=mysqli_query($con,"SELECT a.*, b.nama, b.jekel FROM alumni a, siswa b WHERE a.nisn=b.nisn AND a.status = '$status' AND a.thnLulus = '$tahun' ORDER BY a.thnLulus DESC");
}
}
while($lihat=mysqli_fetch_array($query)){
$pdf->Cell(1, 0.8, $no, 1, 0, 'L');
$pdf->Cell(3, 0.8, $lihat['nisn'], 1, 0,'L');
$pdf->Cell(5, 0.8, $lihat['nama'], 1, 0,'L');
$pdf->Cell(4, 0.8, $lihat['jekel'],1, 0, 'L');
$pdf->Cell(3, 0.8, $lihat['status'],1, 0, 'L');
$pdf->Cell(5, 0.8, $lihat['nmInstansi'], 1, 0,'L');
$pdf->Cell(3, 0.8, $lihat['thnLulus'], 1, 1,'L');

$no++;
}
$pdf->ln(1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(40.5,0.7,"Mengetahui,",0,10,'C');

$pdf->ln(1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(40.5,0.7,"Ketua BKK",0,10,'C');
if($status == 'NULL'){
$pdf->Output("Laporan Alumni.pdf","I");
}else{
$pdf->Output("Laporan Alumni ". $status .".pdf","I");
}
?>