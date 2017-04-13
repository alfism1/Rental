<?php
include "belum_login.php";
include "koneksi.php";

// data
$query = mysql_query("SELECT * FROM rental WHERE id='$_SESSION[id]'");
$h = mysql_fetch_array($query);

$breadcrumb = '<li><a href="#"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg></a></li><li class="active">Rental</li>';
$pageHeader = $h['nama_rental'];
include "template/template-top.php";
?>

<!-- content is here -->
<!-- <div class="row"> -->
<!-- <div class="col-n"> -->		
<!-- </div> -->
<!-- </div> -->

<form role="form" action="rental_aksi.php" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="aksi" value="update">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Username</label>
						<input class="form-control" name="username" type="text" value="<?= $h['username'] ?>" autofocus="">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Password</label>
						<small><i>(Kosongkan jika tidak diubah)</i></small>
						<input class="form-control" name="password" type="password">
					</div>
				</div>
				
			</div>		
			<br>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Nama Rental</label>
						<input class="form-control" name="nama_rental" type="text" value="<?= $h['nama_rental'] ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Nomor HP/Telp Rental</label>
						<input class="form-control" name="telp_rental" type="text" value="<?= $h['telp_rental'] ?>">
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Logo</label>
						<small><i>(Kosongkan jika tidak diubah)</i></small>
						<br>
						<?php
						$logo = !empty($h['logo']) ? $h['logo'] : 'empty.gif';
						?>
						<img src="image/<?= $logo ?>" style="height: 150px;">
						<input type="file" name="logo" class="form-control">
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="lokasi">Lokasi</label>
						<small><i>(Tarik penanda ke lokasi anda)</i></small>
						<div id="map" style="width:100%;height:500px"></div>
						<br>
						<input id="lokasi" class="form-control" name="lokasi" type="text" value="<?= $h['lokasi'] ?>" readonly>
						<input id="daerah" type="hidden" name="daerah" value="<?= $h['daerah'] ?>">
						<input id="lat" type="hidden" name="lat" value="<?= $h['lat'] ?>">
						<input id="lng" type="hidden" name="lng" value="<?= $h['lng'] ?>">
					</div>
				</div>
			</div>

			<button type="submit" class="btn btn-primary">Update</button>			
		</div>
	</div>
</form>	

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
	function myMap() {			
		var mapCanvas = document.getElementById("map");
		var mapOptions = {
			center: new google.maps.LatLng(<?= $h['lat'] ?>, <?= $h['lng'] ?>),
			zoom: 13
		}
		var map = new google.maps.Map(mapCanvas, mapOptions);

			// on click
			google.maps.event.addListener(map, 'click', function( event ){
				//alert( "Latitude: "+event.latLng.lat()+" "+", longitude: "+event.latLng.lng() );
				var point = new google.maps.LatLng(event.latLng.lat(), event.latLng.lng());				
			});
			
			var marker = new google.maps.Marker({
				position: new google.maps.LatLng(<?= $h['lat'] ?>, <?= $h['lng'] ?>),
				map: map,
				title: 'Lokasi Rental anda',
				draggable: true,
			})
			
			// map dragged
			google.maps.event.addListener(map, 'dragend', function() {
				// event
				marker.setPosition(map.getCenter());
			});
			
			// marker draged
			google.maps.event.addListener(marker, 'dragend', function(event) { 
				//alert( "Latitude: "+event.latLng.lat()+" "+", longitude: "+event.latLng.lng() );
				//console.log( "Latitude: "+event.latLng.lat()+" "+", longitude: "+event.latLng.lng() );
				
				var url = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+event.latLng.lat()+","+event.latLng.lng()+"&key=AIzaSyApjJwyQOUVxgC8ynnUzPqYlJdEv7U2P2s";
				$.ajax({
					dataType: "json",
					url: url,
				  //data: data,
				  success: function(e){
				  	$("#lokasi").val(e.results[0].formatted_address);
				  	$("#daerah").val(e.results[0].address_components[2].short_name);
				  	$("#lat").val(event.latLng.lat());
				  	$("#lng").val(event.latLng.lng());

				  	$("#lokasi").focus();
					// console.log(e.results[0].address_components[2].long_name);
				}
			});
			});
		}
	</script>
	
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApjJwyQOUVxgC8ynnUzPqYlJdEv7U2P2s&callback=myMap"></script>

	<?php
	include "template/template-bottom.php";
	?>