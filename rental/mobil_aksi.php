<?php
session_start();
include "koneksi.php";

if (isset($_POST['aksi']) && $_POST['aksi']=='tambah') {
	extract($_POST);

	// cek gambar
	if (isset($_FILES['gambar']['name']) && !empty($_FILES['gambar']['name'])) {
		$gambar = $_FILES['gambar']['name'];

		// // upload logo
		include "function_upload.php";
		upload_image('image/mobil/', 'gambar');
	}
	else{
		$gambar = null;
	}

	$sql = "INSERT INTO mobil(nama_mobil, jenis_mobil, warna, harga, jumlah_stok, gambar, id_rental) VALUES('$nama_mobil', '$jenis_mobil', '$warna', '$harga', '$jumlah_stok', '$gambar', '$_SESSION[id]')";
	mysql_query($sql);

	header("location:mobil.php");
}
else if(isset($_POST['aksi']) && $_POST['aksi']=='update'){
	extract($_POST);

	// cek gambar
	if (isset($_FILES['gambar']['name']) && !empty($_FILES['gambar']['name'])) {
		$gambar = ", gambar='".$_FILES['gambar']['name']."'";

		// upload logo
		include "function_upload.php";
		upload_image('image/mobil/', 'gambar');
	}
	else{
		$gambar = null;
	}

	$sql = "UPDATE mobil SET nama_mobil='$nama_mobil', jenis_mobil='$jenis_mobil', warna='$warna', harga='$harga', jumlah_stok='$jumlah_stok' $gambar WHERE id='$id' AND id_rental='$_SESSION[id]'";
	$query = mysql_query($sql);

	header("location:mobil.php");
}
else if(isset($_GET['aksi']) && $_GET['aksi']=='hapus'){
	$id = $_GET['id'];	
	$query = mysql_query("DELETE FROM mobil WHERE id='$id' AND id_rental='$_SESSION[id]'");
	if ($query) {
		// hapus gambar
		$gambar = $_GET['gambar'];
		unlink("image/mobil/$gambar");

		header("location:mobil.php");
	}
}
?>