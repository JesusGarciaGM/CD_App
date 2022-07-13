<?php
	$rol = 0;
	include_once 'database.php';


	session_start();
	if (isset($_GET['cerrar_sesion'])){
		session_unset();

		//destroy the session
		session_destroy();
	}
	if (isset($_SESSION['rol'])){
		switch ($_SESSION['rol']){
			case 1:
				header('location: ../home/CiberAdminInfo.php');
				break;
			case 2:
				header('location: ../home/CibeUserInfo.php');
				break;
			default:
				echo "Error: Tipo de usuario no aceptado";
		}
	}
	

	if (isset($_POST['user']) && isset($_POST['pass'])){
		$db = new Database();
		$sql = mysqli_connect($db->getHost(),$db->getUser(),$db->getPassword(),$db->getDb());

		$user = stripslashes($_POST['user']);
		$user = mysqli_real_escape_string($sql,$user);
		$pass2 = stripslashes($_POST['pass']);
		$pass2 = mysqli_real_escape_string($sql,$pass2);
		$pass = md5($pass2);

		$query = $db->connect()->prepare('SELECT *FROM ciberuser WHERE user = :user AND pass = :pass');
		$query->execute(['user' => $user, 'pass' => $pass]);
		$row = $query->fetchAll();
		if($row == true && strcmp($user,$row[0]['user']) == 0){

			$rol = $row[0]['type'];
			$_SESSION['rol'] = $rol;
			$_SESSION['fecha'] = date("Y-n-j H:i:s");
			$_SESSION['name']=$user;
			$_SESSION['id']=$row[0]['id'];
			$_SESSION['timeOff']=900;
		}
		
	}
	echo $rol;
?>