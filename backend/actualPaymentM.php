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
	date_default_timezone_set("America/Mexico_City");
	
	$query = $db->connect()->prepare('SELECT  id, fecha_pago FROM pagos');
	$query->execute();
	$row = $query->fetchAll();

	if(!(count($row)==0))
	{
		$fecha_actual=date("Y-n-j");

		foreach ($row as $i) {
			$id=$i['id'];
			$fecha_pago=$i['fecha_pago'];

			include_once('meses.php');

			$months=CalcularMeses($fecha_pago,$fecha_actual);
			$meses_atras=$months*YearM21($fecha_pago,$fecha_actual);

			$queryU = $db->connect()->prepare("UPDATE pagos SET meses_atras = '$meses_atras' WHERE id = '$id'");

	        $resultU=$queryU->execute();

		}
		
	}

?>