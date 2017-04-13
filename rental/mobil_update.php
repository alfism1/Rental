<?php
include "belum_login.php";
include "koneksi.php";

$breadcrumb = '<li><a href="#"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg></a></li><li class="active">Mobil</li>';
$pageHeader = 'Update Mobil';
include "template/template-top.php";

$query = mysql_query("SELECT * FROM mobil WHERE id='$_GET[id]' AND id_rental='$_SESSION[id]'");
$h = mysql_fetch_array($query);

?>

<!-- content is here -->
<!-- <div class="row"> -->
<!-- <div class="col-n"> -->		
<!-- </div> -->
<!-- </div> -->

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Form Mobil				
			</div>
			<div class="panel-body">
				<form role="form" action="mobil_aksi.php" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="aksi" value="update">
					<input type="hidden" name="id" value="<?= $h['id'] ?>">
					<div class="row">
						<div class="form-group col-md-12">
							<label>Nama Mobil</label>
							<input class="form-control" name="nama_mobil" type="text" autofocus="" value="<?= $h['nama_mobil'] ?>" required>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label>Jenis Mobil</label>
							<select class="form-control" name="jenis_mobil" required>
								<option value="">Pilih Jenis Mobil</option>
								<option value="Matic" <?= $h['jenis_mobil']=="Matic" ? 'selected' : '' ?>>Matic</option>
								<option value="Manual" <?= $h['jenis_mobil']=="Manual" ? 'selected' : '' ?>>Manual</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label>Warna Mobil</label>
							<select class="form-control" name="warna" required>
								<option value="">Pilih Warna Mobil</option>
								<option value="Hitam" <?= $h['warna']=="Hitam" ? 'selected' : '' ?>>Hitam</option>
								<option value="Putih" <?= $h['warna']=="Putih" ? 'selected' : '' ?>>Putih</option>
								<option value="Merah" <?= $h['warna']=="Merah" ? 'selected' : '' ?>>Merah</option>
								<option value="Silver" <?= $h['warna']=="Sliver" ? 'selected' : '' ?>>Silver</option>
								<option value="Biru" <?= $h['warna']=="Biru" ? 'selected' : '' ?>>Biru</option>
								<option value="Kuning" <?= $h['warna']=="Kuning" ? 'selected' : '' ?>>Kuning</option>
								<option value="Hijau" <?= $h['warna']=="Hijau" ? 'selected' : '' ?>>Hijau</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label>Harga/Jam</label>
							<input class="form-control" name="harga" type="text" value="<?= $h['harga'] ?>" required>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label>Jumlah Stok</label>
							<input class="form-control" name="jumlah_stok" type="text" value="<?= $h['jumlah_stok'] ?>" required>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label>Gambar</label>
							<small><i>(Kosongkan jika tidak diubah)</i></small>
							<br>
							<img src="image/mobil/<?= $h['gambar'] ?>" style="width: 220px;">
							<input class="form-control" name="gambar" type="file">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="form-group col-md-12">				
							<button type="submit" class="btn btn-primary">Update</button>
							<button type="submit" class="btn btn-warning">Reset</button>
							<div class="pull-right">
								<a href="mobil.php" class="btn btn-primary">Kembali</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>



<?php
include "template/template-bottom.php";
?>