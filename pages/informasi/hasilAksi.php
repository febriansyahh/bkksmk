<?php
include_once("__DIR__ .  ../../../../koneksi.php");

if (isset($_POST['btnSimpan'])) {
	// echo $_POST['usrInput'];
	// print_r($_FILES["fileHasil"]);
	// die();
	insertHasil(uploadHasil('fileHasil'));
} elseif (isset($_POST['btnUBAH'])) {
  updateHasil();
} else {
	if (isset($_GET['kode'])) {
    deleteHasil($_GET['kode']);
	}else{
		if(isset($_GET['kodes'])){
			validasiHasil($_GET['kodes']);
		}
	}
}