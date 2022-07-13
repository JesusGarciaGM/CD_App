<?php



	//Inicio de sesion

	session_start();

	

	//Validar si el usuario es Administrador

	if (!isset($_SESSION['rol'])) {

		//Si no hay rol esntonces mandar a logear

		header('location: login.php');

	}else {

		//Si el rol no es el adecuando entonces cerrar sesion y mandar a logear

		if ($_SESSION['rol'] != 3){

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
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="../myStyle/stAdmin.css"/>
	<link rel="icon"  href="../img/logoLG.ico" type="image/ico">



	<title>Historial de registro de Pagos</title>

</head>

<body>

	<div class="wrapper">

			<!-- BEGIN CONTENT -->

			<!-- SIDEBAR -->

		<?php include('menuPagar.php')?>

		<!-- PAGE CONTAINER-->

			

		<div id="content">

					<!-- headerTop-->

            <?php include('header.php');?>

						

			<h2 class="page-title">Historial de registro de pagos</h2>
		
			<?php include('recordTemp.php'); ?>
		</div>

			<!-- END CONTENT -->

	</div>

		<?php include('libs.php'); ?>

		<script type="text/javascript" src="../myJs/userRecord.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

		

</body>

</html>