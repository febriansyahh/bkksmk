<?php
include_once("__DIR__ .  ../../../../koneksi.php");

if (isset($_GET['kodes'])) {
  // echo $_GET['kodes'];
  // die();
	deleteKerja($_GET['kodes']);
} elseif (isset($_GET['kode'])) {
	deleteStudi($_GET['kode']);
}