<?php

	//Inicio de sesion
	session_start();
	
	//Validar si el usuario es Administrador
	if (!isset($_SESSION['rol'])) {
		//Si no hay rol esntonces mandar a logear
		header('location: login.php');
	}else {
		//Si el rol no es el adecuando entonces cerrar sesion y mandar a logear
		if ($_SESSION['rol'] != 1) {
			header('location: ../backend/cerrarSe.php');
		}else {
			//Si se trata de un administrador validar que este activo por lo menos 10 minutos de lo contrario cerrar sesion
			$fechaIni=$_SESSION['fecha'];
			$fechaAct = date("Y-n-j H:i:s");

			if ((strtotime($fechaAct)-strtotime($fechaIni)) > $_SESSION['timeOff']) {
				header('location: ../backend/cerrarSe.php');
			}
			else
			{
				$_SESSION['fecha']=$fechaAct;
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<?php include('meta.php'); ?>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="../myStyle/stAdmin.css"/>
	<link rel="icon"  href="../img/logoLG.ico" type="image/ico">

	<title>Administrador</title>
</head>
<body>
	<div class="wrapper">
			<!-- BEGIN CONTENT -->
			<!-- SIDEBAR -->
		<?php include('menu.php')?>
		<!-- PAGE CONTAINER-->
			
		<div id="content">
					<!-- headerTop-->
            <?php include('header.php');?>
						
			<h2 class="page-title">Clientes</h2>
			
			<?php include 'custTemplate.php'; ?>
					
		</div>
			<!-- END CONTENT -->
	</div>
	
	<?php include('libs.php'); ?>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="../myJs/admCust.js"></script>
</body>
</html>