<?php

	//Cada acción actualizará la fecha inicial
	session_start();
	$_SESSION['fecha']=date("Y-n-j H:i:s");
	//Con estos dos comandas se actualiza
	
	include('database.php');

	if (isset($_POST['id'])) {
		
		$id = $_POST['id'];
		/*$query = "DELETE FROM taks WHERE  id = $id";
		$result = mysqli_query($conn,$query);*/
		$db = new Database();
		//Se realiza la conexión a la base de datos
		$conn = mysqli_connect($db->getHost(),$db->getUser(),$db->getPassword(),$db->getDb());

	
		// Check connection
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL:  ".mysqli_connect_error();
		}
		$query = $db->connect()->prepare("DELETE FROM clientes WHERE id = $id");
		$result=$query->execute();
		if (!$result) {
			die('Query Failed.');
		}

		
		echo "Task Deleted seccessfully";
	}
?>