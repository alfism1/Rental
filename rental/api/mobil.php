<?php
include "../koneksi.php";
include "../function_rupiah.php";

if (!isset($_GET['id'])) {

	if (isset($_GET['id_rental'])) {
		$query = mysql_query("SELECT m.id, m.nama_mobil, m.gambar, m.harga, r.nama_rental, m.jumlah_stok, m.jumlah_dipesan, r.id as id_rental FROM mobil AS m JOIN rental AS r ON m.id_rental=r.id AND r.id='$_GET[id_rental]'");				
	}
	else{
		$query = mysql_query("SELECT m.id, m.nama_mobil, m.gambar, m.harga, r.nama_rental, m.jumlah_stok, m.jumlah_dipesan, r.id as id_rental FROM mobil AS m JOIN rental AS r ON m.id_rental=r.id");
	}


	$mobil = [];
	while ($h = mysql_fetch_assoc($query)) {
		$mobil[] = [
			'id' => $h['id'],
			'nama_mobil' => $h['nama_mobil'],
			'gambar' => $h['gambar'],
			'harga' => rupiah($h['harga']),
			'status' => $h['jumlah_dipesan'] < $h['jumlah_stok'] ? 'Tersedia' : 'Kosong',
			'nama_rental' => $h['nama_rental'],
			'id_rental' => $h['id_rental']
		];
	}

	$response = [
		'status' => 'success',
		'result' => $mobil
	];

	header('Content-Type: application/json');
	echo json_encode($response);	
}
else if (isset($_GET['id'])) {
	$query = mysql_query("SELECT m.id, m.nama_mobil, m.gambar, m.harga, r.nama_rental, m.jumlah_stok, m.jumlah_dipesan, r.id as id_rental FROM mobil AS m JOIN rental AS r ON m.id_rental=r.id AND m.id='$_GET[id]'");

	$mobil = [];
	while ($h = mysql_fetch_assoc($query)) {
		$mobil[] = [
			'id' => $h['id'],
			'nama_mobil' => $h['nama_mobil'],
			'gambar' => $h['gambar'],
			'harga' => rupiah($h['harga']),
			'status' => $h['jumlah_dipesan'] < $h['jumlah_stok'] ? 'Tersedia' : 'Kosong',
			'nama_rental' => $h['nama_rental'],
			'id_rental' => $h['id_rental']
		];
	}

	$response = [
		'status' => 'success',
		'result' => $mobil
	];

	header('Content-Type: application/json');
	echo json_encode($response);
}
?>