<?php
if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
	include "../koneksi.php";
	
	// extract($_POST);



	$response = [
		'status' => 'success',
		'result' => $_POST
	];

	header('Content-Type: application/json');
	echo json_encode($response);
}
else{
	$response = [
		'status' => 'fail',
		'result' => 'Method doesnt match'
	];

	header('Content-Type: application/json');
	echo json_encode($response);
}
?>