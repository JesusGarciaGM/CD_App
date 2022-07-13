<?php



	//Cada acción actualizará la fecha inicial
	
	session_start();

	$_SESSION['fecha']=date("Y-n-j H:i:s");

	//Con estos dos comandas se actualiza



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

	$cliente= $_POST['cliente'];
	$ubicacion = $_POST['ubicacion'];
	$telefono = $_POST['telefono'];
	$precio = $_POST['precio'];
	$fecha_pago = $_POST['fecha_pago'];
	$fecha_actual=date("Y-n-j");
	$dateP=  new DateTime($fecha_pago);
	$dateA= new DateTime($fecha_actual);
	$diff= $dateP->diff($dateA);
	$meses_atras=$diff->m;

	//Insertar elemento

	//Se usan prepare y execute para realizar la insersion de un nuevo elemento

	$query = $db->connect()->prepare("INSERT into pagos (cliente, ubicacion, telefono, precio, fecha_pago, meses_atras) VALUES ('$cliente','$ubicacion','$telefono','$precio','$fecha_pago','$meses_atras')");

	$result=$query->execute();

	if (!$result) {

		die('Query failed.');

	}

	echo "Registro Exitoso";

?>