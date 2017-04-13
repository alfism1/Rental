<?php
include "../koneksi.php";

if (!isset($_GET['id'])) {
	$query = mysql_query("SELECT id, nama_rental, telp_rental, logo, lokasi, daerah, lat, lng FROM rental");

	$mobil = [];
	while ($h = mysql_fetch_assoc($query)) {
		$mobil[] = [
			'id' => $h['id'],
			'nama_rental' => $h['nama_rental'],
			'telp_rental' => $h['telp_rental'],
			'logo' => $h['logo'],
			'lokasi' => $h['lokasi'],
			'daerah' => $h['daerah'],
			'lat' => $h['lat'],
			'lng' => $h['lng']
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
	$query = mysql_query("SELECT id, nama_rental, telp_rental, logo, lokasi, daerah, lat, lng FROM rental WHERE id='$_GET[id]'");

	$mobil = [];
	while ($h = mysql_fetch_assoc($query)) {
		$mobil[] = [
			'id' => $h['id'],
			'nama_rental' => $h['nama_rental'],
			'telp_rental' => $h['telp_rental'],
			'logo' => $h['logo'],
			'lokasi' => $h['lokasi'],
			'daerah' => $h['daerah'],
			'lat' => $h['lat'],
			'lng' => $h['lng']
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