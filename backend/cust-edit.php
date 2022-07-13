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
	if (isset($_REQUEST['nombre'])) {

		$id=$_POST['id'];

		$nom = stripslashes($_REQUEST['nombre']);
		$nom = mysqli_real_escape_string($conn,$nom);

		$ant = stripslashes($_REQUEST['antena']);
		$ant = mysqli_real_escape_string($conn,$ant);

		$rou = stripslashes($_REQUEST['router']);
		$rou = mysqli_real_escape_string($conn,$rou);

		$tel = stripslashes($_POST['telefono']);
		$tel = mysqli_real_escape_string($conn,$tel);

		$con = stripslashes($_POST['contacto']);
		$con = mysqli_real_escape_string($conn,$con);

		$ubi = stripslashes($_REQUEST['ubicacion']);
		$ubi = mysqli_real_escape_string($conn,$ubi);

		$fecP= stripslashes($_POST['pago']);
		$fecP= mysqli_real_escape_string($conn,$fecP);

		$query = $db->connect()->prepare("UPDATE clientes SET nombre = '$nom', antena = '$ant', router = '$rou', telefono = '$tel', contacto = '$con', ubicacion = '$ubi', pago = '$fecP' WHERE id = '$id'");
		$result=$query->execute();

		if (!$result) {
			die('Query Failed.');
		}
		echo "Cambio Guardado con exito";
	}

?>