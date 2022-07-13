<?php
	session_start();
	

	include('database.php');
	$json = array();
	if (isset($_SESSION['item'])) {
		$itemId = $_SESSION['item'];

		/*$query = "SELECT * FROM taks WHERE id=$id";
		$result = mysqli_query($conn,$query);*/
		$db = new Database();
		//Se realiza la conexión a la base de datos
		$conn = mysqli_connect($db->getHost(),$db->getUser(),$db->getPassword(),$db->getDb());
		$query = $db->connect()->prepare('SELECT * FROM ciber_item WHERE id=:id');
		$query->execute(['id' => $itemId]);	
		$rows = $query->fetchAll();

		if ($rows == true) {
			
			foreach ($rows as $row) {
				$json[]=array(
					'itemId'=> $itemId,
					'nameCustomer' => $row['custom_name'],
					'phoneCustomer' => $row['custom_phone'],
					'nameEmployee' => $row['user'],
					'brandItem' => $row['item_brand'],
					'modelItem' => $row['item_model'],
					'passItem' => $row['item_pass'],
					'detailsItem' => $row['item_details'],
					'remarkItem' => $row['item_remark'],
					'dateItem' => $row['item_date_sta'],
					'payCost' => $row['pay_cost'],
					'payAdvance' => $row['pay_advance'],
					'payMissing' => $row['pay_missing'],
					'dateItemEnd' => $row['item_date_end'],
					'statusItem'=> $row['item_status'],
					'stockItem' => $row['item_stock']
				);
			}
		}
	}
	$jsonstring = json_encode($json);
	echo $jsonstring;
?>