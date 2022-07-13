<?php

	//Inicio de sesion
	session_start();
	
	//Validar si el usuario es Administrador
	if (!isset($_SESSION['rol'])) {
		//Si no hay rol esntonces mandar a logear
		header('location: ../index.php');
	}else {
		//Si el rol no es el adecuando entonces cerrar sesion y mandar a logear
		if ($_SESSION['rol'] != 1) {
			header('location: ../backend/ciberCerrarSe.php');
		}else {
			//Si se trata de un administrador validar que este activo por lo menos 10 minutos de lo contrario cerrar sesion
			$fechaIni=$_SESSION['fecha'];
			$fechaAct = date("Y-n-j H:i:s");

			if ((strtotime($fechaAct)-strtotime($fechaIni)) > $_SESSION['timeOff']) {
				header('location: ../backend/ciberCerrarSe.php');
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
	<?php include('meta.php');?>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="../style/styleCiberAdm.css">
	<link rel="icon"  href="../img/logoLG.ico" type="image/ico">
	<title>Home</title>
</head>
<body>

	<div class="wrapper">
        <!-- Sidebar  -->

        <?php include('sideBarAdm.php')?>

        <!-- Page Content  -->
        <div id="content">

            <!-- headerTop-->
            <?php include('headerTop.php');?>

            <h2>Control de Entrega</h2>

            <div id="dash">
				<?php include('submitTemp.php'); ?>
			</div>
            
        </div>
    </div>

	<?php include('libs.php');?>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="../js/jsCiberAdmSubmitItem.js"></script>


</body>
</html>