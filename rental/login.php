<?php
include "sudah_login.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>

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
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Rental | Masuk</div>
				<div class="panel-body">
					<?php
					if (isset($_GET['daftar']) && $_GET['daftar']==1) {
						
					?>
					<div class="alert bg-success" role="alert">
						Pendaftaran Rental berhasil. Silahkan login.
					</div>
					<?php
					}
					else if(isset($_GET['error']) && $_GET['error']==1){
					?>
					<div class="alert bg-danger" role="alert">
					Login gagal. Username atau password salah.
					</div>
					<?php
					}
					?>
					<form role="form" action="log.php" method="POST">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<div class="checkbox">
								<a href="daftar.php">Belum punya akun? Daftar sekarang!</a>
							</div>
							<button type="submit" class="btn btn-primary">Login</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
</body>

</html>
