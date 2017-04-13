<?php
$koneksi = mysql_connect('localhost', 'root', '') or die(mysql_error());
mysql_select_db('rental_kendaraan', $koneksi) or die(mysql_error());
?>