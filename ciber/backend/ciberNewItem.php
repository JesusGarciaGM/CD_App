<?php
	//Cada acción actualizará la fecha inicial
	session_start();
	$_SESSION['fecha']=date("Y-n-j H:i:s");
	//Con estos dos comandas se actualiza
	$id=$_SESSION['id'];
	$user=$_SESSION['name'];
	$ban = 0;
	if (isset($id)) {
		include('database.php');
		$db = new Database();
		//Se realiza la conexión a la base de datos
		$conn = mysqli_connect($db->getHost(),$db->getUser(),$db->getPassword(),$db->getDb());

		
		// Check connection
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL:  ".mysqli_connect_error();
		}

		$customName= stripslashes($_REQUEST['customName']);
		$customName= mysqli_real_escape_string($conn,$customName);

		$customPhone= stripslashes($_POST['customPhone']);
		$customPhone= mysqli_real_escape_string($conn,$customPhone);

		$itemBrand= stripslashes($_POST['itemBrand']);
		$itemBrand= mysqli_real_escape_string($conn,$itemBrand);

		$itemModel= stripslashes($_POST['itemModel']);
		$itemModel= mysqli_real_escape_string($conn,$itemModel);

		$itemPass= stripslashes($_POST['itemPass']);
		$itemPass= mysqli_real_escape_string($conn,$itemPass);

		$itemDetails= stripslashes($_POST['itemDetails']);
		$itemDetails= mysqli_real_escape_string($conn,$itemDetails);

		$itemRemark= stripslashes($_POST['itemRemark']);
		$itemRemark= mysqli_real_escape_string($conn,$itemRemark);

		$itemDate= stripslashes($_POST['itemDate']);
		$itemDate= mysqli_real_escape_string($conn,$itemDate);

		$payCost= $_POST['payCost'];

		$payAdvance= $_POST['payAdvance'];
		
		$payMissing= $_POST['payMissing'];

		$itemStatus = "En proceso";

		$itemStock = "ciber";
		
		//Insertar elemento
		//Se usan prepare y execute para realizar la insersion de un nuevo elemento
		$query = $db->connect()->prepare("INSERT into ciber_item (user_id, user, custom_name, custom_phone, item_brand, item_model, item_pass, item_details, item_remark, item_date_sta, pay_cost, pay_advance, pay_missing, item_status, item_stock) VALUES ('$id','$user','$customName','$customPhone','$itemBrand','$itemModel','$itemPass','$itemDetails','$itemRemark','$itemDate','$payCost','$payAdvance','$payMissing', '$itemStatus', '$itemStock')");
		$result=$query->execute();
		if ($result) {
			$ban=1;
		}
	}
	echo $ban;
?>