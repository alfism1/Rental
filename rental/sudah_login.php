<?php
session_start();
if ( isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['nama_rental']) ) {
	header("location:rental.php");
}
?>