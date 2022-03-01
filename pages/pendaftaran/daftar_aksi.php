<?php
include_once("__DIR__ .  ../../../../koneksi.php");
// print_r("A");
// die();
if (isset($_POST['btnSimpan'])) {
  // echo $_POST['noLoker'];
	// echo '<br>';
  // echo $_POST['atasNama'];
	// echo '<br>';
  // echo $_POST['perusahaan'];
	// echo '<br>';
	// print_r($_FILES['berkasDaftar']);
	// echo '<br>';
	// print_r($_FILES['skck']);
	// echo '<br>';
	// print_r($_FILES['cv']);
	// echo '<br>';
	// print_r($_FILES['foto']);
	// echo '<br>';
  // echo $_POST['nmloker'];
	// die();
	insertDaftar(uploadBerkas('berkasDaftar', $_POST['nmloker']), uploadSKCK('skck', $_POST['nmloker']), uploadCV('cv', $_POST['nmloker']), uploadFotoD('foto', $_POST['nmloker']));
} elseif (isset($_POST['btnUBAH'])) {
	// print_r("C");
	// die();
  updateDaftar(uploadBerkas('berkasDaftar', $_POST['nmloker']), uploadSKCK('skck', $_POST['nmloker']), uploadCV('cv', $_POST['nmloker']), uploadFotoD('foto', $_POST['nmloker']));
} else {
	if (isset($_GET['kode'])) {
    deleteDaftar($_GET['kode']);
	}
}