<?php
	
	session_start();
	include('database.php');
	$json = array();

	$db = new Database();
	//Se realiza la conexión a la base de datos
	$conn = mysqli_connect($db->getHost(),$db->getUser(),$db->getPassword(),$db->getDb());
	$query = $db->connect()->prepare('SELECT * FROM ciberuser');
	$query->execute();	
	$users = $query->fetchAll();
	//Numero de usuarios Total
	$json['numUsu']=count($users);

	$query = $db->connect()->prepare('SELECT * FROM ciber_item');
	$query->execute();	
	$items = $query->fetchAll();
	// Numero de elementos Total
	$json['numTot']=count($items);
	$user_id= $_SESSION['id'];


	//Mis funciones
	include('misFunciones.php');

	//Mis registros
	$json['numReg']=MisRegistros($user_id,$items);
	//Numero de elementos entregados
	$json['numEnt']=Entregados($items);
	//Numero de elementos Terminados
	$json['numTer']=Terminados($items);
	//Numero de elementos en proceso
	$json['numEPr']=Proceso($items);
	//Más antiguos
	$antiguos = array();
	$antiguos= Antiguos($items);
	$json['antiguos']=$antiguos;



	$jsonstring = json_encode($json);
	echo $jsonstring;
?>