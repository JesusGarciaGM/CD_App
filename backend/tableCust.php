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

	$i=0;

	if(!(count($rows)==0))

	{

		while ($i < count($rows)) {

?>

			<tr custId="<?php echo $rows[count($rows)-1-$i]['id']; ?>">

			<td><?php echo $rows[count($rows)-1-$i]['id']; ?></td>

			<td class="tableNom">

				<a href="#" class="cust-item"><?php echo $rows[count($rows)-1-$i]['nombre']; ?></a>

			</td>

			<td><?php echo $rows[count($rows)-1-$i]['router']; ?></td>

			<td><?php echo $rows[count($rows)-1-$i]['telefono']; ?></td>

			<td><?php echo $rows[count($rows)-1-$i]['ubicacion']; ?></td>

			<td class="deleteUser" style=" border: inset 0pt">

				<button class="cust-delete btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
</button>

			</td>

			</tr>

<?php

		$i++;

		}

	}

?>