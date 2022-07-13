<?php

	//Inicio de sesion
	session_start();

	//Validar si el usuario es Administrador
	if (!isset($_SESSION['rol'])) {
		//Si no hay rol esntonces mandar a logear
		header('location: login.php');
	}else {
		//Si el rol no es el adecuando entonces cerrar sesion y mandar a logear
		if ($_SESSION['rol'] == 1) {
			header('location: editA.php');
		}else{
			header('location: editU.php');
		}
	}
?>