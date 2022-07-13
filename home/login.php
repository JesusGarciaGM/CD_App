<?php

	

	//Inicio de sesion

	session_start();



	//Validar si hay sesion iniciada. 

	if (isset($_SESSION['rol'])) {

		//Si hay una sesion se destruye

		session_unset();

		session_destroy();

	}

?>





<!DOCTYPE html>

<html lang="es">

<head>

	<?php include('meta.php');?>

	<link rel="stylesheet" type="text/css" href="../myStyle/myStyle.css">

	<link rel="icon"  href="../img/logoLG.ico" type="image/ico">

	<title>CD Internet</title>

</head>

<body>



	<?php



		include_once '../backend/database.php';



		//session_start();

		if (isset($_GET['cerrar_sesion'])){

			session_unset();



			//destroy the session

			session_destroy();

		}

		if (isset($_SESSION['rol'])){

			switch ($_SESSION['rol']){

				case 1:

				//	header('location: adminInfo.php');

					

					echo '<script language="javascript">window.location.replace("adminInfo.php");</script>';

					break;

				case 2:

				//	header('location: userInfo.php');

					echo '<script language="javascript">window.location.replace("userInfo.php");</script>';

					break;
				case 3:
					echo '<script language="javascript">window.location.replace("userPagar.php");</script>';
					break;

				default:

					echo "Error: Tipo de usuario no aceptado";

			}

		}



		if (isset($_POST['username']) && isset($_POST['password'])){

			





			$db = new Database();

			$sql = mysqli_connect($db->getHost(),$db->getUser(),$db->getPassword(),$db->getDb());



			$username = stripslashes($_POST['username']);

			$username = mysqli_real_escape_string($sql,$username);

			$password2 = stripslashes($_POST['password']);

			$password2 = mysqli_real_escape_string($sql,$password2);

			$password = md5($password2);





			$query = $db->connect()->prepare('SELECT *FROM users WHERE username = :username AND password = :password');

			$query->execute(['username' => $username, 'password' => $password]);





			$row = $query->fetch(PDO::FETCH_NUM);

			

			if($row == true && strcmp($username,$row[1]) == 0){

				$rol = $row[3];

				$_SESSION['rol'] = $rol;

				$_SESSION['fecha'] = date("Y-n-j H:i:s");

				$_SESSION['name']=$username;

				//$_SESSION['pass']=$password;

				$_SESSION['id']=$row[0];

				$_SESSION['timeOff']=1200;

				switch ($rol) {

					case 1:

					    echo '<script language="javascript">window.location.replace("adminInfo.php");</script>';

						

						break;

					case 2:

					    echo '<script language="javascript">window.location.replace("userInfo.php");</script>';

						break;
					case 3:
						echo '<script language="javascript">window.location.replace("userPagar.php");</script>';
						break;

					default:	

				}

			}else{

				/*echo "Nombre de usuario o contraseña incorrecta";*/

				echo '<script language="javascript">alert("Nombre de usuario o contraseña incorrecta");</script>';

			}



		}

	?>



	<div class="wrapper">

		<div id="log">

			<h2>CD Internet</h2>

			<br>





			<form class="form-horizontal" action="#" method="POST"><b>

				Username: </b><br/>

				<input type="text" style="width: 220px" class="form-control" name="username" required><br/><b>

				Password: </b><br/>

				<div class="form-group input-group" style="width: 220px">

					<input id="txtPassword" type="password"  class="form-control" name="password" required>

					

            		<button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>

          			

          		</div>

				<br/>

				<input type="submit" value="Iniciar sesión" class="btn btn-success">

			</form>



			<br>

			<a class="btn btn-primary" href="registro.php" role="button">Registrese</a>

		</div>

	</div>



	<?php include('libs.php');?>

	<script type="text/javascript" src="../myJs/myJs.js"></script>

</body>

</html>