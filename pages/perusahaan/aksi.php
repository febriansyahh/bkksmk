<?php
include_once("__DIR__ .  ../../../../koneksi.php");

if (isset($_POST['btnSimpan'])) {
	// print_r($_FILES['fileLogo']);
	// echo 'AAA'; 
	// echo '<br>';
	// echo $_POST['nmPerusahaan'];
	// die();
	insertPerusahaan(upload_logo('fileLogo', 'nmPerusahaan'));
} elseif (isset($_POST['btnUBAH'])) {
  updatePerusahaan(upload_logo('logo','nmPerusahaan'));
} else {
	if (isset($_GET['kode'])) {
    deletePerusahaan($_GET['kode']);
	}
}