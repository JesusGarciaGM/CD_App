<?php

	//Cada acción actualizará la fecha inicial
	session_start();
	$_SESSION['fecha']=date("Y-n-j H:i:s");
	//Con estos dos comandas se actualiza
	
	include('database.php');
	$json = array();
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
		/*$query = "SELECT * FROM taks WHERE id=$id";
		$result = mysqli_query($conn,$query);*/
		$db = new Database();
		//Se realiza la conexión a la base de datos
		$conn = mysqli_connect($db->getHost(),$db->getUser(),$db->getPassword(),$db->getDb());
		$query = $db->connect()->prepare('SELECT * FROM ciberuser WHERE id=:id');
		$query->execute(['id' => $id]);	
		$rows = $query->fetchAll();
		
		if ($rows == true) {
			
			foreach ($rows as $row) {
				$json[]=array(
					'id' => $row['id'],
					'user' => $row['user'],
					'type' => $row['type']
				);
			}
		}
		
	
	}
	
	$jsonstring = json_encode($json);
	echo $jsonstring;

?>