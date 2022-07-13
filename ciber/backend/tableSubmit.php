<?php

	
	//session_start();
	

	include('database.php');
	
	$db = new Database();
	//Se realiza la conexión a la base de datos
	$conn = mysqli_connect($db->getHost(),$db->getUser(),$db->getPassword(),$db->getDb());		
	// Check connection
	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL:  ".mysqli_connect_error()); 
	}

	$query = $db->connect()->prepare('SELECT * FROM ciber_item');
	$query->execute();
	$rows = $query->fetchAll();
	$i=0;
	//Mostrar  
	if(!(count($rows)==0))
	{
		while ($i < count($rows)) {
			
?>				
			<tr idItem="<?php echo $rows[count($rows)-1-$i]['id']; ?>">
			<td><?php echo $rows[count($rows)-1-$i]['id']; ?></td>
			<td><?php echo $rows[count($rows)-1-$i]['item_date_sta']; ?></td>
			<td><?php echo $rows[count($rows)-1-$i]['custom_name']; ?></td>
			<td><?php echo $rows[count($rows)-1-$i]['custom_phone']; ?></td>
			<td><?php echo $rows[count($rows)-1-$i]['user']; ?></td>
			<td><?php echo $rows[count($rows)-1-$i]['item_brand']; ?></td>
			<td><?php echo $rows[count($rows)-1-$i]['item_date_end']; ?></td>
			<td style=" border: inset 0pt">
				<button class="item-submit btn btn-success" 
				<?php 
					if($rows[count($rows)-1-$i]['item_status']=="Entregado"){
						echo ' disabled';
					}
				?> 
				>Entregar</button>
			</td>
			</tr>
<?php
		$i++;
		}
	}
?>