<?php
	
	//Cada acción actualizará la fecha inicial
	session_start();
	$_SESSION['fecha']=date("Y-n-j H:i:s");
	//Con estos dos comandas se actualiza

	if (isset($_POST['itemId'])) {

		$itemId=$_POST['itemId'];

		include('database.php');
		$db = new Database();
		//Se realiza la conexión a la base de datos
		$conn = mysqli_connect($db->getHost(),$db->getUser(),$db->getPassword(),$db->getDb());

		
		// Check connection
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL:  ".mysqli_connect_error();
		}
		date_default_timezone_set("America/Mexico_City");
		$today = getdate();
		$day = $today['year'].'-'.$today['mon'].'-'.$today['mday']." ".$today['hours'].":".$today['minutes'].":".$today['seconds'];

		$query = $db->connect()->prepare("UPDATE ciber_item SET item_date_end = '$day', item_status = 'Entregado' WHERE id = '$itemId'");
		$result=$query->execute();

		if (!$result) {
		die('Query Failed.');
		}

		//Agregar Un elemento en la tabla ciber_progress indicando que se ha entregado el artículo 
		$value= "Artículo entregado por el empleado ".$_SESSION['name'].". Con id = ".$_SESSION['id'].".";
		$query = $db->connect()->prepare("INSERT into ciber_progress (item_id, date_reg, value) VALUES ('$itemId', '$day','$value')");
		$result=$query->execute();
	}

	
?>