<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Daftar</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Rental | Daftar</div>
				<div class="panel-body">
					<form role="form" action="log.php?act=daftar" method="post" enctype="multipart/form-data">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="text" autofocus="" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" required>
							</div>
							<br>							
							<div class="form-group">
								<input class="form-control" placeholder="Nama Rental" name="nama_rental" type="text" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Nomor HP/Telp Rental" name="telp_rental" type="text" required>
							</div>
							<br>
							<div class="form-group">
								<label for="logo">Logo Rental</label>
								<input id="logo" class="form-control" name="logo" type="file">
							</div>
							<br>
							<div class="form-group">								
								<label for="lokasi">Lokasi</label>
								<small><i>(Tarik penanda ke lokasi anda)</i></small>
								<div id="map" style="width:100%;height:500px"></div>
								<br>
								<input id="lokasi" class="form-control" name="lokasi" type="text" readonly>
								<input id="daerah" type="hidden" name="daerah">
								<input id="lat" type="hidden" name="lat">
								<input id="lng" type="hidden" name="lng">
							</div>
							<div class="checkbox">
								<a href="login.php">Sudah punya akun? Login sekarang!</a>
							</div>
							<button type="submit" class="btn btn-primary">Daftar</button>
							<button type="reset" class="btn btn-warning">Reset</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script>
		function myMap() {			
			var mapCanvas = document.getElementById("map");
			var mapOptions = {
				center: new google.maps.LatLng(-7.980481060423052, 112.63069967773436),
				zoom: 13
			}
			var map = new google.maps.Map(mapCanvas, mapOptions);
			
			// on click
			google.maps.event.addListener(map, 'click', function( event ){
				//alert( "Latitude: "+event.latLng.lat()+" "+", longitude: "+event.latLng.lng() );
				var point = new google.maps.LatLng(event.latLng.lat(), event.latLng.lng());				
			});
			
			var marker = new google.maps.Marker({
				position: new google.maps.LatLng(-7.980481060423052, 112.63069967773436),
				map: map,
				title: 'This is Cool!!!',
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
				  	$("#daerah").val(e.results[0].address_components[2].short_name);	// disini daerah.
				  	$("#lat").val(event.latLng.lat());
				  	$("#lng").val(event.latLng.lng());

				  	$("#lokasi").focus();
					// alert(e.results[0].formatted_address);
				  }
				});
			});
		}
	</script>
	
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApjJwyQOUVxgC8ynnUzPqYlJdEv7U2P2s&callback=myMap"></script>

</body>

</html>
