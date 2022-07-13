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
	<?php include('meta.php');?>
	<link rel="stylesheet" type="text/css" href="../style/styleCiberReg.css">
	<link rel="icon"  href="../img/logoLG.ico" type="image/ico">
	<title>Registro</title>
</head>
<body>

	<div class="wrapper">
		<div id="ciberReg">
			<h2> Registro</h2>
			
			<form id="ciberReg-form">
				<div class="form-group">
					<input type="text" id="ciberUser" placeholder="Usuario" class="form-control" required>							
				</div>	
				<div class="form-group input-group">
					<input type="password" id="ciberPass1" placeholder="Contraseña" class="form-control" required>	
					<button id="show_pass1" class="btn btn-primary" type="button"> <span class="fa fa-eye-slash iconN"></span> </button>				
				</div>
				<div class="form-group input-group mb-3">
					<input type="password" id="ciberPass2" placeholder="Confirmar contraseña" class="form-control" required>	
					<button id="show_pass2" class="btn btn-primary" type="button"> <span class="fa fa-eye-slash iconN1"></span> </button>
				</div>
		
				<button type="submit" class="btn btn-success">
					Guardar
				</button>
				<a class="btn btn-primary" href="../index.php" role="button">Cancelar</a>
			</form>
		</div>
	</div>

	<?php include('libs.php');?>
	<script type="text/javascript" src="../js/jsCiberReg.js"></script>

</body>
</html>