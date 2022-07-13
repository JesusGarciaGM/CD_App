<?php
	//Cada acción actualizará la fecha inicial
	session_start();
	$_SESSION['fecha']=date("Y-n-j H:i:s");
	//Con estos dos comandas se actualiza
	$ban = 0;
	if (isset($_SESSION['item']) && $_POST['value']){

		$itemId= $_SESSION['item'];
		$value = $_POST['value'];
		date_default_timezone_set("America/Mexico_City");
		$today = getdate();
		$day = $today['year'].'-'.$today['mon'].'-'.$today['mday']." ".$today['hours'].":".$today['minutes'].":".$today['seconds'];

		include('database.php');
		$db = new Database();
		//Se realiza la conexión a la base de datos
		$conn = mysqli_connect($db->getHost(),$db->getUser(),$db->getPassword(),$db->getDb());

		
		// Check connection
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL:  ".mysqli_connect_error();
		}
		$query = $db->connect()->prepare("INSERT into ciber_progress (item_id, date_reg, value) VALUES ('$itemId','$day','$value')");
		$result=$query->execute();
		if ($result) {
			$ban=1;
		}
	}
	echo $ban;
?>