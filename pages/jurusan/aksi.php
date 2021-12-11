<?php
include_once("__DIR__ .  ../../../../koneksi.php");

if (isset($_POST['btnSimpan'])) {
	insertJurusan();
} elseif (isset($_POST['btnUBAH'])) {
  updateJurusan();
} else {
	if (isset($_GET['kode'])) {
    deleteJurusan($_GET['kode']);
	}
}