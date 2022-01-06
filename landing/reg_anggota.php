<?php
include_once('../koneksi.php');

if (isset($_POST['btnSimpan'])) {
  // echo'<pre>';
  // echo $_POST['nisn'];
  // echo '<br>';
  // echo "+" . $_POST['no_wa'];
  // echo '<br>';
  // echo $_POST['username'];
  // echo '<br>';
  // echo $_POST['password'];
  // echo'</pre>';
  // die();
	registrasiDatas();
}