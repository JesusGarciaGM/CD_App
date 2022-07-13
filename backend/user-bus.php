<?php

	//Cada acción actualizará la fecha inicial
	session_start();
	$_SESSION['fecha']=date("Y-n-j H:i:s");
	//Con estos dos comandas se actualiza
	
	include('database.php');

	$search = $_POST['search'];

	$db = new Database();
	//Se realiza la conexión a la base de datos
	$conn = mysqli_connect($db->getHost(),$db->getUser(),$db->getPassword(),$db->getDb());		
	// Check connection
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL:  ".mysqli_connect_error()); 
	}

	$query = $db->connect()->prepare('SELECT * FROM users');
	$query->execute();
	$row = $query->fetchAll();

	if(!(count($row)==0))
	{
		$json = array();

		foreach ($row as $i) {
			$comp = stripos($i['username'], $search);
			if (!($comp===false)) {
				$json[]=array(
					'id' => $i['id'],
					'username' => $i['username'],
					'tipo' => $i['tipo']
				);
			}
			
		}

		$jsonstring = json_encode($json);
		echo $jsonstring;
	}
		
?>