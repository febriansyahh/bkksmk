<?php
include_once("__DIR__ .  ../../../../koneksi.php");

if (isset($_POST['btnSimpan'])) {
	insertPerusahaan();
} elseif (isset($_POST['btnUBAH'])) {
  updatePerusahaan();
} else {
	if (isset($_GET['kode'])) {
    deletePerusahaan($_GET['kode']);
	}
}