<?php
ini_set("session.auto_start", 0);
include_once("__DIR__ .  ../../../../koneksi.php");
include_once("__DIR__ .  ../../../../fpdf/fpdf.php");

if (isset($_POST['submit'])) {
  $tahun = $_POST['tahun'];
  $id = $_POST['idPerusahaan'];
  }
$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Rekrutemen SMK MUHAMMADIYAH",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Printed On : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
//Tidak berpengaruh dengan database hanya sebagai keterangan pada tabel nantinya
$pdf->Cell(1, 0.8, 'No', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'Perusahaan', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Pekerjaan', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'Jenis', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'Tanggal', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Pengirim', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
if($tahun == 'NULL'){
$query=mysqli_query($con,"SELECT * FROM lowongan a, user b WHERE a.usrInput=b.idUser AND b.idLevel ='4' AND a.usrInput = '$id' ORDER BY a.idLowongan DESC");
}else{
  
$query=mysqli_query($con,"SELECT * FROM lowongan a, user b WHERE a.usrInput=b.idUser AND b.idLevel ='4' AND a.usrInput = '$id' AND YEAR(a.tglInput) = '$tahun' ORDER BY a.idLowongan DESC");
}
while($lihat=mysqli_fetch_array($query)){
$pdf->Cell(1, 0.8, $no, 1, 0, 'L');
$pdf->Cell(6, 0.8, $lihat['perusahaan'], 1, 0,'L');
$pdf->Cell(5, 0.8, $lihat['nmLoker'], 1, 0,'L');
$pdf->Cell(4.5, 0.8, $lihat['jekel'],1, 0, 'L');
$pdf->Cell(4.5, 0.8, date('d-m-Y', strtotime($lihat['tglInput'])),1, 0, 'L');
$pdf->Cell(5, 0.8, $lihat['sumber'], 1, 1,'L');

$no++;
}
$pdf->ln(1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(40.5,0.7,"Approve",0,10,'C');

$pdf->ln(1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(40.5,0.7,"Technician Name",0,10,'C');
//Nama file ketika di print
$pdf->Output("Laporan Lowongan Perusahaan.pdf","I");
?>