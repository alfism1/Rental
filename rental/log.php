<?php
session_start();
include 'koneksi.php';

if (isset($_GET['act']) && $_GET['act']=='daftar') {
	extract($_POST);

	$logo = $_FILES['logo'] ? $_FILES['logo']['name'] : null;

	$query = mysql_query("INSERT INTO rental(username, password, nama_rental, telp_rental, logo, lokasi, daerah, lat, lng) VALUES('$username', '".md5($password)."', '$nama_rental', '$telp_rental', '$logo', '$lokasi', '$daerah', '$lat', '$lng')");
	if ($query) {
		// upload gambar
		// upload logo
		if (isset($_FILES['logo']['name']) && !empty($_FILES['logo']['name'])) {
			include "function_upload.php";
			upload_image('image/', 'logo');	
		}		
		
		// redirect
		header("location:login.php?daftar=1");
	}
	else{
		echo mysql_error();
	}
}
else{
	// login
	extract($_POST);

	$query = mysql_query("SELECT id, username, nama_rental, logo FROM rental WHERE username='$username' AND password='".md5($password)."'");
	if (mysql_num_rows($query)) {
		$h = mysql_fetch_array($query);
		$_SESSION["id"] = $h["id"];
		$_SESSION["username"] = $h["username"];
		$_SESSION["nama_rental"] = $h["nama_rental"];
		$_SESSION["logo"] = $h["logo"];

		header("location:rental.php");
	}
	else{
		header("location:login.php?error=1");
	}
}
?>