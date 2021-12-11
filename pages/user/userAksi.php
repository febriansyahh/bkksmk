<?php
include_once("__DIR__ .  ../../../../koneksi.php");

if (isset($_POST['btnSimpan'])) {
  // echo'<pre>';
  // echo $_POST['nmUser'];
  // echo $_POST['username'];
  // echo $_POST['password'];
  // echo $_POST['idGroup'];
  // echo $_POST['idDaftar'];
  // echo'</pre>';
  die();
	insertUser();
} elseif (isset($_POST['btnUBAH'])) {
  updateUser();
} else {
	if (isset($_GET['kode'])) {
    deleteUser($_GET['kode']);
	}
}