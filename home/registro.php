<!DOCTYPE html>

<html lang="es">

<head>

	<?php include('meta.php');?>

	<link rel="stylesheet" type="text/css" href="../myStyle/stRegistro.css">

	<link rel="icon"  href="../img/logoLG.ico" type="image/ico">

	<title>Registro</title>

</head>

<body>



	<div class="wrapper">

		<div class="alert alert-succes">



			<?php

				//Se manda llamar el constructor de la base de datos

				include_once '../backend/database.php';

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

				

				if (isset($_REQUEST['username'])) {

					//removes backslashes

					$user = stripslashes($_REQUEST['username']);

					//escapes special characters in a string

					$user = mysqli_real_escape_string($conn,$user);

					//$id = stripslashes($_REQUEST['id']);

					//$id = mysqli_real_escape_string($conn,$id);



					$pass = stripslashes($_REQUEST['password']);

					$pass = mysqli_real_escape_string($conn,$pass);

					$t = 3;



					//Insertar elemento

					//Se usan prepare y execute para realizar la insersion de un nuevo elemento

					$query = $db->connect()->prepare("INSERT into users (username, password, tipo) VALUES ('$user','".md5($pass)."','$t')");

					$result=$query->execute();

		

					

					//La propiedad errno regresa 0 si la ultima consulta fue satisfactoria y un codigo numerico si ocurrio algun problema

					if ($result) {

						echo '<script language="javascript">alert("Su registro fue realizado satisfactoriamente.");</script>';

						//$url="http://localhost/CD/login.php";

						$url="login.php";

						$te=0.2;

						//header("refresh: $te; url=$url");
						echo '<script language="javascript">window.open("login.php","_self");</script>';

					}else{

						echo '<script language="javascript">alert("Su registro No fue realizado");</script>';

						//$url="http://localhost/CD/login.php";

						$url="registro.php";

						$te=0.2;

						//header("refresh: $te; url=$url");
						echo '<script language="javascript">window.open("registro.php","_self");</script>';

					}

					

				}else {

			?>

					

					<div id="stLog">

						<h1>Registro</h1>

						<form class="form-horizontal" name="registration" action="#" method="post">

							<input type="text" class="form-control" name="username" placeholder="Usuario" required><br>

							<div class="form-group input-group">

								<input id="txtPassword" type="password" class="form-control" name="password" placeholder="Password" required>

								

            					<button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>

          						

          					</div>

							<br>

							<input type="submit" name="submit" value="Registrar" class="btn btn-success">

						</form>

					</div>

				<?php

					}

				?>

		</div>

	</div>



	<?php include('libs.php');?>

	<script type="text/javascript" src="../myJs/myJs.js"></script>

</body>

</html>