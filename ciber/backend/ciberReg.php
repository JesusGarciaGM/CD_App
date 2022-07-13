<?php
	$banReg = 0;
	include_once 'database.php';
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

	if (isset($_REQUEST['user']) && strcmp($_REQUEST['pass1'],$_REQUEST['pass2']) == 0) {

		//removes backslashes
		$user = stripslashes($_REQUEST['user']);
		//escapes special characters in a string
		$user = mysqli_real_escape_string($conn,$user);
		//$id = stripslashes($_REQUEST['id']);
		//$id = mysqli_real_escape_string($conn,$id);

		$pass = stripslashes($_REQUEST['pass1']);
		$pass = mysqli_real_escape_string($conn,$pass);
		$type = 2;

		//Insertar elemento
		//Se usan prepare y execute para realizar la insersion de un nuevo elemento
		$query = $db->connect()->prepare("INSERT into ciberuser (user, pass, type) VALUES ('$user','".md5($pass)."','$type')");
		$result=$query->execute();
		if ($result) {
			$banReg=1;
		}

	}

	echo $banReg;
?>