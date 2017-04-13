<?php
include "belum_login.php";
include "koneksi.php";

$breadcrumb = '<li><a href="#"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg></a></li><li class="active">Mobil</li>';
$pageHeader = 'Mobil';
include "template/template-top.php";
include "function_rupiah.php";
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
				Daftar Mobil
				<div class="pull-right">
					<a href="mobil_tambah.php" class="btn btn-primary"><svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg>Tambah Mobil</a>
				</div>
			</div>
			<div class="panel-body">
				<?php
				$query = mysql_query("SELECT * FROM mobil WHERE id_rental='$_SESSION[id]'");
				if (mysql_num_rows($query)) {
				?>
				<table class="table table-responsive">
					<tr>
						<th>Nama Mobil</th>
						<th>Jenis</th>
						<th>Warna</th>
						<th>Harga/jam</th>
						<th>Jumlah Mobil</th>
						<th>Jumlah Dipesan</th>
						<th>Gambar</th>
						<th>Aksi</th>
					</tr>
					<?php					
					while ($h = mysql_fetch_array($query)) {
						?>
						<tr>
							<td><?= $h['nama_mobil'] ?></td>
							<td><?= $h['jenis_mobil'] ?></td>
							<td><?= $h['warna'] ?></td>
							<td><?= rupiah($h['harga']) ?></td>
							<td><?= $h['jumlah_stok'] ?></td>
							<td><?= $h['jumlah_dipesan'] ?></td>
							<td>
								<?php
								$gambar = !empty($h['gambar']) ? 'mobil/'.$h['gambar'] : 'empty.gif';
								?>
								<img src="image/<?= $gambar ?>" style="width: 50px;">
							</td>
							<td>
								<a href="mobil_update.php?id=<?= $h['id'] ?>" class="btn btn-primary">Edit</a>
								<a href="mobil_aksi.php?aksi=hapus&id=<?= $h['id'] ?>&gambar=<?= $h['gambar'] ?>" class="btn btn-danger">Hapus</a>
							</td>
						</tr>
						<?php
					}
					?>
				</table>
				<?php	
				}
				else{
					echo '<center><i>Anda belum memiliki data mobil</i></center>';
				}
				?>				
			</div>
		</div>
	</div>
</div>



<?php
include "template/template-bottom.php";
?>