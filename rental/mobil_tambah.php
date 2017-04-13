<?php
include "belum_login.php";
include "koneksi.php";

$breadcrumb = '<li><a href="#"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg></a></li><li class="active">Mobil</li>';
$pageHeader = 'Tambah Mobil';
include "template/template-top.php";
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
					<input type="hidden" name="aksi" value="tambah">
					<div class="row">
						<div class="form-group col-md-12">
							<label>Nama Mobil</label>
							<input class="form-control" name="nama_mobil" type="text" autofocus="" required>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label>Jenis Mobil</label>
							<select class="form-control" name="jenis_mobil" required>
								<option value="">Pilih Jenis Mobil</option>
								<option value="Matic">Matic</option>
								<option value="Manual">Manual</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label>Warna Mobil</label>
							<select class="form-control" name="warna" required>
								<option value="">Pilih Warna Mobil</option>
								<option value="Hitam">Hitam</option>
								<option value="Putih">Putih</option>
								<option value="Merah">Merah</option>
								<option value="Silver">Silver</option>
								<option value="Biru">Biru</option>
								<option value="Kuning">Kuning</option>
								<option value="Hijau">Hijau</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label>Harga/Jam</label>
							<input class="form-control" name="harga" type="text" required>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label>Jumlah Stok</label>
							<input class="form-control" name="jumlah_stok" type="text" required>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label>Gambar</label>
							<input class="form-control" name="gambar" type="file">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="form-group col-md-12">				
							<button type="submit" class="btn btn-primary">Tambah</button>
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