<?php
include_once('koneksi.php');

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
	registrasiData();
}elseif(isset($_POST['btnAlumniReg']))
{
  regAlumni();
}
else {
	if (isset($_POST['btnSimpans'])) {
      // echo'<pre>';
      // echo $_POST['namaper'];
      // echo '<br>';
      // echo $_POST['email'];
      // echo '<br>';
      // echo $_POST['status'];
      // echo '<br>';
      // echo $_POST['noTelp'];
      // echo '<br>';
      // echo $_POST['username'];
      // echo '<br>';
      // echo $_POST['password'];
      // echo'</pre>';
      // die();
    registrasiPer();
	}
}