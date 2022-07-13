<?php
	//Cada acción actualizará la fecha inicial
	//session_start();
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

	$query = $db->connect()->prepare('SELECT * FROM clientes');
	$query->execute();
	$rows = $query->fetchAll();

	$numUbi= array();
	$numUbi['total']=count($rows);
	$numUbi['salamanca']= 0 ;
	$numUbi['valtierrilla']= 0 ;
	$numUbi['cardenas']= 0 ;
	$numUbi['carmen']= 0 ;
	$numUbi['granja']= 0 ;
	$numUbi['gallo']= 0 ;
	$numUbi['compania']= 0 ;
	$numUbi['sauz']= 0 ;
	$numUbi['isidro']= 0 ;
	$numUbi['haciendita']= 0 ;
	$numUbi['garaje']= 0 ;
	$numUbi['rosa']= 0 ;
	$numUbi['conejas']= 0 ;
	$numUbi['cenizos']= 0 ;

	$com = '';

	foreach ($rows as $row) {
		$com = stripos($row['ubicacion'], $_POST['salamanca']);
		if (!($com===false))
			$numUbi['salamanca']+=1;

		$com = stripos($row['ubicacion'], $_POST['valtierrilla']);
		if (!($com===false))
			$numUbi['valtierrila']+=1;

		$com = stripos($row['ubicacion'], $_POST['cardenas']);
		if (!($com===false))
			$numUbi['cardenas']+=1;

		$com = stripos($row['ubicacion'], $_POST['carmen']);
		if (!($com===false))
			$numUbi['carmen']+=1;

		$com = stripos($row['ubicacion'], $_POST['granja']);
		if (!($com===false))
			$numUbi['granja']+=1;

		$com = stripos($row['ubicacion'], $_POST['gallo']);
		if (!($com===false))
			$numUbi['gallo']+=1;

		$com = stripos($row['ubicacion'], $_POST['compania']);
		if (!($com===false))
			$numUbi['compania']+=1;

		$com = stripos($row['ubicacion'], $_POST['sauz']);
		if (!($com===false))
			$numUbi['sauz']+=1;

		$com = stripos($row['ubicacion'], $_POST['isidro']);
		if (!($com===false))
			$numUbi['isidro']+=1;

		$com = stripos($row['ubicacion'], $_POST['haciendita']);
		if (!($com===false))
			$numUbi['haciendita']+=1;

		$com = stripos($row['ubicacion'], $_POST['garaje']);
		if (!($com===false))
			$numUbi['garaje']+=1;

		$com = stripos($row['ubicacion'], $_POST['rosa']);
		if (!($com===false))
			$numUbi['rosa']+=1;

		$com = stripos($row['ubicacion'], $_POST['conejas']);
		if (!($com===false))
			$numUbi['conejas']+=1;
	}
	$numUbi['cenizos']=$numUbi['total']-($numUbi['salamanca']+$numUbi['valtierrilla']+$numUbi['cardenas']+$numUbi['carmen']+$numUbi['granja']+$numUbi['gallo']+$numUbi['compania']+$numUbi['sauz']+$numUbi['isidro']+$numUbi['haciendita']+$numUbi['garaje']+$numUbi['rosa']+$numUbi['conejas']);

    	echo json_encode($numUbi);
?>