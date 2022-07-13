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

						

			<h2 class="page-title">Información</h2>

			

			<?php include('infoTemp.php'); ?>

					

					

		</div>

			<!-- END CONTENT -->

	</div>

		<?php include('libs.php'); ?>

		<script type="text/javascript" src="../myJs/admInfo.js"></script>

		

</body>

</html>