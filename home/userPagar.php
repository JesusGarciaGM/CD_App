<?php



	//Inicio de sesion

	session_start();

	

	//Validar si el usuario es Administrador

	if (!isset($_SESSION['rol'])) {

		//Si no hay rol esntonces mandar a logear

		header('location: login.php');

	}else {

		//Si el rol no es el adecuando entonces cerrar sesion y mandar a logear

		if ($_SESSION['rol'] != 3) {

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

	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="../myStyle/stAdmin.css"/>
	<link rel="stylesheet" type="text/css" href="../myStyle/stSelect2.css"/>

	<link rel="icon"  href="../img/logoLG.ico" type="image/ico">



	<title>Pagos</title>

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

						

			<h2 class="page-title">Pagos</h2>

			

			<?php include('paymentTemp.php'); ?>

					

					

		</div>

			<!-- END CONTENT -->

	</div>

		<?php include('libs.php'); ?>

		<script type="text/javascript" src="../myJs/userPagos.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

		

</body>

</html>