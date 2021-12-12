<?php
include_once("__DIR__ .  ../../../../koneksi.php");

if (isset($_POST['btnSimpan'])) {
	insertSiswa();
} elseif (isset($_POST['btnUBAH'])) {
  updateSiswa();
} else {
	if (isset($_GET['kode'])) {
    deleteSiswa($_GET['kode']);
	}
}