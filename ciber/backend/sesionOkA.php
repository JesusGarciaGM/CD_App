<?php
	session_start();

	$sesionOk=1;
	//Validar si el usuario es Administrador
	if (!isset($_SESSION['rol'])) {
		//Si no hay rol esntonces mandar a logear
		$sesionOk=0;
	}else {
		//Si el rol no es el adecuando entonces cerrar sesion y mandar a logear
		if ($_SESSION['rol'] != 1) {
			$sesionOk=0;
		}else {
			//Si se trata de un administrador validar que este activo por lo menos 10 minutos de lo contrario cerrar sesion
			$fechaIni=$_SESSION['fecha'];
			$fechaAct = date("Y-n-j H:i:s");
			if ((strtotime($fechaAct)-strtotime($fechaIni)) > $_SESSION['timeOff']) {
				$sesionOk=0;
			}
		}
	}
	echo $sesionOk;

?>