<?php
	$host="localhost";
	$user="root";
	$pass="";
	$database="spk_kamera";
	$koneksi=new mysqli($host,$user,$pass,$database);
	if (mysqli_connect_errno()) {
	  trigger_error('Koneksi ke database gagal: '  . mysqli_connect_error(), E_USER_ERROR);
	}
?>
