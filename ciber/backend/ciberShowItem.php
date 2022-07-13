<?php
	//Cada acción actualizará la fecha inicial
	session_start();
	$_SESSION['fecha']=date("Y-n-j H:i:s");
	//Con estos dos comandas se actualiza
	$itemId=$_SESSION['item'];
	$ban = 0;
	if (isset($itemId)) {
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
		
		//Insertar elemento
		//Se usan prepare y execute para realizar la insersion de un nuevo elemento
		$query = $db->connect()->prepare("UPDATE ciber_item SET custom_name = '$customName', custom_phone = '$customPhone', item_brand = '$itemBrand', item_model = '$itemModel', item_pass = '$itemPass', item_details = '$itemDetails', item_remark = '$itemRemark', pay_cost = '$payCost', pay_advance = '$payAdvance', pay_missing = '$payMissing' WHERE id = '$itemId'");
		$result=$query->execute();
		if ($result) {
			$ban=1;
		}
	}
	echo $ban;
?>