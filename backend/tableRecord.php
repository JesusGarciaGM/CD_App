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

	date_default_timezone_set("America/Mexico_City");

	$query = $db->connect()->prepare('SELECT * FROM record');

	$query->execute();

	$rows = $query->fetchAll();

	$i=0;


		while ($i < count($rows)) {
		
?>

			<tr recordId="<?php echo $rows[count($rows)-1-$i]['id']; ?>">
			<td><?php echo count($rows)-$i?></td>
			<td class="tableNom"><?php echo $rows[count($rows)-1-$i]['empleado']; ?></td>
			<td><?php echo $rows[count($rows)-1-$i]['fecha']; ?></td>
			<td><?php echo $rows[count($rows)-1-$i]['cliente']; ?></td>
			<td><?php echo $rows[count($rows)-1-$i]['ubicacion']; ?></td>
			<td><?php echo $rows[count($rows)-1-$i]['meses']; ?></td>

			</tr>

<?php

		$i++;

		}


?>