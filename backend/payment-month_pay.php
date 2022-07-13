<?php

	//Cada acción actualizará la fecha inicial
	session_start();
	$_SESSION['fecha']=date("Y-n-j H:i:s");

	//Con estos dos comandas se actualiza
	
	$idUser = $_SESSION['id'];
	$user = $_SESSION['name'];
	include('database.php');
	$db = new Database();

	//Se realiza la conexión a la base de datos

	$conn = mysqli_connect($db->getHost(),$db->getUser(),$db->getPassword(),$db->getDb());

	// Check connection

	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL:  ".mysqli_connect_error();
	}

	date_default_timezone_set("America/Mexico_City");

	
	$idPago=$_POST['id'];
	$meses_pagar=$_POST['meses_pagar'];
	

	//Obtener la fecha del registro de pago
	$query = $db->connect()->prepare("SELECT fecha_pago, cliente, ubicacion, precio FROM pagos WHERE id='$idPago'");
	$query->execute();
	$row = $query->fetchAll();
	if(!(count($row)==0))
	{

		$fecha_pago=$row[0]['fecha_pago'];
		$fecha_pagadaD = date_create($fecha_pago);
		//echo $meses_pagar;
		//Dar formato a la cadena que agrega los meses a pagar

		if(intval($meses_pagar)>1)
		{
			$meses_pagados=$meses_pagar." months";
		}else{
			$meses_pagados="1 month";
		}
		
		//Suma los meses pagados a la fecha registrada
		date_add($fecha_pagadaD, date_interval_create_from_date_string($meses_pagados));
		$fecha_actualizada=date_format($fecha_pagadaD,"Y-m-d");
		//La fecha resultante se guarda en la base de datos

		//Se calcula los meses de adeudo o adelanto
		$fecha_actual=date("Y-n-j");
	
		include_once('meses.php');

		$months=CalcularMeses($fecha_actualizada,$fecha_actual);
		$months=$months+YearM21($fecha_actualizada,$fecha_actual);
		//Se valida si tiene adeudo o se adelanto

		//Guardar los valores del cliente y su ubicacion
		$cliente=$row[0]['cliente'];
		$ubicacion=$row[0]['ubicacion'];
		$precio_mes=$row[0]['precio'];
			
			// Se actualiza la base de datos con los nuevos valores antes calculados
		$queryU = $db->connect()->prepare("UPDATE pagos SET fecha_pago = '$fecha_actualizada', meses_atras='$months' WHERE id = '$idPago'");

		$resultU=$queryU->execute();

		//Se realiza el registro de la accion en el historial

		$today = getdate();
		$fecha_hoy = $today['year'].'-'.$today['mon'].'-'.$today['mday']." ".$today['hours'].":".$today['minutes'].":".$today['seconds'];

		$query = $db->connect()->prepare("INSERT into record (empleado, cliente, ubicacion, meses, fecha, precio) VALUES ('$user','$cliente','$ubicacion','$meses_pagar','$fecha_hoy','$precio_mes')");

		$result=$query->execute();

		if (!$result) {

			die('Query failed.');

		}

		$query = $db->connect()->prepare('SELECT id FROM record WHERE id = (SELECT MAX(id) FROM record)');
		$query->execute();
		$row = $query->fetchAll();

		$_SESSION['id_record']=$row[0]['id'];


	}

?>