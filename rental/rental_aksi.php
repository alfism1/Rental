<?php
session_start();
include "koneksi.php";

if (isset($_POST['aksi']) && $_POST['aksi']=='update') {
	extract($_POST);

	// cek password
	if (!empty($password)) {
		$password = "password='".md5($password)."',";
	}
	else{
		$password = null;
	}	

	// cek gambar
	if (isset($_FILES['logo']['name']) && !empty($_FILES['logo']['name'])) {
		$logo = "logo='".$_FILES['logo']['name']."',";

		// upload logo
		include "function_upload.php";
		upload_image('image/', 'logo');
	}
	else{
		$logo = null;
	}

	$sql = "UPDATE rental SET
		username='$username',
		$password
		nama_rental='$nama_rental',
		telp_rental='$telp_rental',
		$logo
		lokasi='$lokasi',
		daerah='$daerah',
		lat=$lat,
		lng=$lng
		WHERE id='$_SESSION[id]'";

	echo $sql;

	$query = mysql_query($sql);

	header("location:rental.php");
}
?>