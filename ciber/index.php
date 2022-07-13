<?php
	
	//Inicio de sesion
	session_start();

	//Validar si hay sesion iniciada. 
	if (isset($_SESSION['rol'])) {
		//Si hay una sesion se destruye
		session_unset();
		session_destroy();
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<!-- -----------------------------config --------------------------------------->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS CDN -->
	<link rel="stylesheet" href="style/config/bootstrap.min.css">
	<!-- Scrollbar Custom CSS -->
	 <link rel="stylesheet" href="style/config/jquery.mCustomScrollbar.min.css">
	 <!-- Font Custom CSS -->
	<link rel="stylesheet" type="text/css" href="style/styleCiberLog.css">
	<link rel="icon"  href="img/logoLG.ico" type="image/ico">
	<title>Inicar sesión</title>
</head>
<body>

	<div class="wrapper">
		<div id="ciberLog">
			<h2>CD Internet</h2>
			<br>


			<form id="ciberLog-form">
				<div class="form-group">
					<input type="text" id="ciberUser" placeholder="Usuario" class="form-control" required>							
				</div>	
				<div class="form-group input-group mb-3">
					<input type="password" id="ciberPass" placeholder="Contraseña" class="form-control" required>	
					<button id="show_pass" class="btn btn-primary" type="button"> <span class="fa fa-eye-slash iconN"></span> </button>				
				</div>
		
		<button type="submit" class="btn btn-success">
			Iniciar sesión
		</button>
		<a class="btn btn-primary" href="home/ciberRegis.php" role="button">Registrese</a>
	</form>

			
		</div>
	</div>

	<!-- -------------------------------------config --------------------------------------->
	<!-- Font Awesome JS -->
	<script type="text/javascript" src="js/config/solid.js"></script>
	<script type="text/javascript" src="js/config/fontawesome.js"></script>
	 <!-- jQuery CDN  -->
	<script type="text/javascript" src="js/config/jquery.min.js"></script>
	<!-- Popper.JS -->
	<script type="text/javascript" src="js/config/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script type="text/javascript" src="js/config/bootstrap.min.js"></script>
	<!-- jQuery Custom Scroller CDN -->
	 <script type="text/javascript" src="js/config/jquery.mCustomScrollbar.concat.min.js"></script>

	 <!-- -------------------------------------My config js --------------------------------------->
	<script type="text/javascript" src="js/jsCiberLog.js"></script>
</body>
</html>