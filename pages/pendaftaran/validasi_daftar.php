<?php
include_once("__DIR__ .  ../../../../koneksi.php");

if(isset($_GET['kodes'])){
  validasiAdministrasi($_GET['kodes']);

} elseif (isset($_GET['kodeLulus'])) {
	validasiLulus($_GET['kodeLulus']);

} else {
	if (isset($_GET['kodeGagalUjian'])) {
    gagalLulus($_GET['kodeGagalUjian']);

	}else{
		if(isset($_GET['kodeGagal'])){
			gagalAdm($_GET['kodeGagal']);
      
		}
	}
}