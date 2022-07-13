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
	$id_r=$_SESSION['id_record'];

	date_default_timezone_set("America/Mexico_City");

	$query = $db->connect()->prepare("SELECT * FROM record WHERE id='$id_r'");

	$query->execute();
	$row = $query->fetchAll();

	if(!(count($row)==0))
	{
		$fecha=$row[0]['fecha'];
		$fecha_e=explode(' ',$fecha);
		$row[0]['fecha']=$fecha_e[0];
		$jsonstring = json_encode($row[0]);
		echo $jsonstring;
	}



?>