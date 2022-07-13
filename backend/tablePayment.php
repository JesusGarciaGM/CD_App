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


	$query = $db->connect()->prepare('SELECT * FROM pagos');

	$query->execute();

	$rows = $query->fetchAll();

	$i=0;

	

		while ($i < count($rows)) {

?>

			<tr payCustId="<?php echo $rows[count($rows)-1-$i]['id']; ?>">
				<td><?php echo count($rows)-$i; ?></td>
				<td class="tableNom"><?php echo $rows[count($rows)-1-$i]['cliente']; ?>	</td>
				<td><?php echo $rows[count($rows)-1-$i]['ubicacion']; ?></td>
				<td><?php echo $rows[count($rows)-1-$i]['telefono']; ?></td>

				<td><span class="payment_precioA"><?php echo $rows[count($rows)-1-$i]['precio']; ?></span>
					<input type="number" name="precio servicio" step="1" class="payment_precioM" style="width:100%;"></td>
				<td><?php echo $rows[count($rows)-1-$i]['fecha_pago']; ?></td>
				<td><?php 
					$fecha_actual=date("Y-n-j");
					$fecha_registro=$rows[count($rows)-1-$i]['fecha_pago'];
					$fecha_actual_e=explode('-',$fecha_actual);
					$fecha_registro_e=explode('-',$fecha_registro);
					$fechaAP="";
					$banTime=0;
					if(intval($fecha_actual_e[0])>intval($fecha_registro_e[0]))
					{
						$fechaAP=$fecha_actual_e[0].'-'.$fecha_actual_e[1].'-';
					}else{

						if(intval($fecha_actual_e[0])==intval($fecha_registro_e[0]))
						{
							if(intval($fecha_actual_e[1])<=intval($fecha_registro_e[1])){
								$fechaAP=$fecha_registro_e[0].'-'.$fecha_registro_e[1].'-';
								$banTime=1;
							}else{

								$fechaAP=$fecha_actual_e[0].'-'.$fecha_actual_e[1].'-';

							}
						}else{
							$fechaAP=$fecha_registro_e[0].'-'.$fecha_registro_e[1].'-';
							$banTime=1;
						}

					}
					$fechaAP=$fechaAP.$fecha_registro_e[2];
					
					if($banTime==0)
					{
						$fecha_actual_pago = date_create($fechaAP);
						
					}else{
						$fecha_pagada=date_create($fechaAP);
						date_add($fecha_pagada, date_interval_create_from_date_string("1 month"));
						$fecha_actual_pago=date_create(date_format($fecha_pagada,"Y-m-d"));
					}
					echo date_format($fecha_actual_pago,"Y-m-d"); 
				?></td>
				<td><?php 
					$fecha_limite = $fecha_actual_pago;
					date_add($fecha_limite, date_interval_create_from_date_string("5 days"));
					
					echo date_format($fecha_limite,"Y-m-d");
					

				?></td>
				<td><?php echo $rows[count($rows)-1-$i]['meses_atras']; ?></td>
				<td><input class="paymentMesesP" type="number" step="1" name="paymentMesesPagar" value="1" style="width: 70%;"></td>

				<td style=" border: inset 0pt">

					<button class="payment-cust btn btn-outline-success"><i class="fa fa-money" aria-hidden="true"></i>
</button>
					<button class="payment-cust-edit btn btn-outline-primary"><i class="fa fa-pencil-square" aria-hidden="true"></i></button>
					<button class="payment-cust-Modif btn btn-outline-success"><i class="fa fa-check-square" aria-hidden="true"></i></button>
					<button class="payment-cust-cancel btn btn-outline-warning"><i class="fa fa-window-close" aria-hidden="true"></i></button>

				</td>

			</tr>

<?php

		$i++;

		}


?>