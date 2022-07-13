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

		die("Failed to connect to MySQL:  ".mysqli_connect_error()); 

	}

	date_default_timezone_set("America/Mexico_City");

	$query = $db->connect()->prepare('SELECT * FROM clientes');

	$query->execute();

	$row = $query->fetchAll();

	if(!(count($row)==0))
		$fecha_actual=date("Y-n-j");
		$fecha_actual_e=explode('-',$fecha_actual);

	{

		$json = array();

		for ($i=count($row)-1; $i > -1; $i--) { 
			$fecha_registro=$row[$i]['pago'];
			$fecha_registro_e=explode('-',$fecha_registro);
			$fechaFormato=$fecha_actual_e[0].'-';
			if(strlen($fecha_actual_e[1])==1)
			{
				$fechaFormato=$fechaFormato.'0'.$fecha_actual_e[1].'-';
			}else{
				$fechaFormato=$fechaFormato.$fecha_actual_e[1].'-';
			}

			if(strlen($fecha_registro_e[2])==1)
			{
				$fechaFormato=$fechaFormato.'0'.$fecha_registro_e[2];
			}else{
				$fechaFormato=$fechaFormato.$fecha_registro_e[2];
			}
			$json[]=array(
				'id' => $row[$i]['id'],
				'nombre' => $row[$i]['nombre'],
				'telefono' => $row[$i]['telefono'],
				'ubicacion' => $row[$i]['ubicacion'],
				'fecha_pago' => $fechaFormato
				
			);
		}

		



		$jsonstring = json_encode($json);

		echo $jsonstring;

	}

	

?>