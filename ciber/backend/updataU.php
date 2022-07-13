<?php
	
	//Cada acción actualizará la fecha inicial
	session_start();
	$_SESSION['fecha']=date("Y-n-j H:i:s");
	//Con estos dos comandas se actualiza

	$id = $_SESSION['id'];
	
	include('database.php');
	$db = new Database();
	//Se realiza la conexión a la base de datos
	$conn = mysqli_connect($db->getHost(),$db->getUser(),$db->getPassword(),$db->getDb());

	
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL:  ".mysqli_connect_error();
	}
	if (isset($id)) {

		$user= stripslashes($_REQUEST['nombre']);
		$user= mysqli_real_escape_string($conn,$user);
		$pass = stripslashes($_REQUEST['passN']);
		$pass = mysqli_real_escape_string($conn,$pass);
		$pass = md5($pass);

		$query = $db->connect()->prepare("UPDATE ciberuser SET user = '$user', pass = '$pass' WHERE id = '$id'");
		$result=$query->execute();
		if (!$result) {
		die('Query Failed.');
		}
		$_SESSION['name']=$user;
		
	}

	
?>