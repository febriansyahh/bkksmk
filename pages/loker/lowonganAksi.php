<?php
include_once("__DIR__ .  ../../../../koneksi.php");
// print_r("A");
// die();
if (isset($_POST['btnSimpan'])) {
  // echo $_POST['noLoker'];
	// echo '<br>';
  // echo $_POST['perusahaan'];
	// echo '<br>';
	// print_r($_FILES['fileLoker']);
  // // echo $_POST['file'];
	// echo '<br>';
  // echo $_POST['nmloker'];
	// die();
	insertLowongan(Upload_Files('fileLoker', 'noLoker'));
} elseif (isset($_POST['btnUBAH'])) {
	// print_r("C");
	// die();
  updateLowongan();
} else {
	// print_r("A");
	// die();
	if (isset($_GET['kode'])) {
    deleteLowongan($_GET['kode']);
	}else{
		if(isset($_GET['kodes'])){
			validasiLowongan($_GET['kodes']);
		}
	}
}