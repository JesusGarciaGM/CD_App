<?php

	//Cada acción actualizará la fecha inicial
	session_start();
	$_SESSION['fecha']=date("Y-n-j H:i:s");
	//Con estos dos comandas se actualiza

	//Se manda llamar el constructor de la base de datos
	include_once '../backend/database.php';
	//Se crea un objeto Database
	$db = new Database();
	//Se realiza la conexión a la base de datos
	$conn = mysqli_connect($db->getHost(),$db->getUser(),$db->getPassword(),$db->getDb());

	
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL:  ".mysqli_connect_error();
	}

	date_default_timezone_set("America/Mexico_City");
	//If form submitted, insert  values into the database.
	if (isset($_REQUEST['nombre'])) {

		$nom = stripslashes($_REQUEST['nombre']);
		$nom = mysqli_real_escape_string($conn,$nom);

		$ant = stripslashes($_REQUEST['antena']);
		$ant = mysqli_real_escape_string($conn,$ant);

		$rou = stripslashes($_REQUEST['router']);
		$rou = mysqli_real_escape_string($conn,$rou);

		$tel = stripslashes($_POST['telefono']);
		$tel = mysqli_real_escape_string($conn,$tel);

		$con = stripslashes($_POST['contacto']);
		$con = mysqli_real_escape_string($conn,$con);

		$ubi = stripslashes($_REQUEST['ubicacion']);
		$ubi = mysqli_real_escape_string($conn,$ubi);

		$fecP= stripslashes($_POST['pago']);
		$fecP= mysqli_real_escape_string($conn,$fecP);

		//Insertar elemento
		//Se usan prepare y execute para realizar la insersion de un nuevo elemento
		$query = $db->connect()->prepare("INSERT into clientes (nombre, antena, router, telefono, contacto, ubicacion, pago) VALUES ('$nom','$ant','$rou','$tel','$con','$ubi','$fecP')");
		$result=$query->execute();
		if (!$result) {
			die('Query failed.');
		}
		echo "Registro Exitoso";
	}
?>