<?php

	//Cada acción actualizará la fecha inicial
	session_start();
	$_SESSION['fecha']=date("Y-n-j H:i:s");

	//Con estos dos comandas se actualiza
	
	include('database.php');
	$db = new Database();

	//Se realiza la conexión a la base de datos

	$conn = mysqli_connect($db->getHost(),$db->getUser(),$db->getPassword(),$db->getDb());

	// Check connection

	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL:  ".mysqli_connect_error();
	}

	date_default_timezone_set("America/Mexico_City");
	
	$idPago=$_POST['id'];
	$precio=$_POST['valM'];

	$query = $db->connect()->prepare("UPDATE pagos SET precio = '$precio' WHERE id = '$idPago'");

	$result=$query->execute();

?>