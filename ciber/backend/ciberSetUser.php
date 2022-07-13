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
	if (isset($_REQUEST['tipo'])) {

		$tipo= stripslashes($_REQUEST['tipo']);
		$tipo= mysqli_real_escape_string($conn,$tipo);
		$id=$_POST['id'];

		$query = $db->connect()->prepare("UPDATE ciberuser SET type = '$tipo' WHERE id = '$id'");
		$result=$query->execute();
		if (!$result) {
		die('Query Failed.');
		}
	}

?>