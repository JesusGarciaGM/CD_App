<?php
	
	function Entregados($items)
	{
		$numEnt=0;

		foreach ($items as $item) {
			if ($item['item_status']=="Entregado") {
				$numEnt+=1;
			}
		}

		return $numEnt;
	}

	function Terminados($items)
	{
		$numTer=0;

		foreach ($items as $item) {
			if ($item['item_status']=="Terminado") {
				$numTer+=1;
			}
		}

		return $numTer;
	}

	function Proceso($items)
	{
		$numEPr=0;

		foreach ($items as $item) {
			if ($item['item_status']=="En proceso") {
				$numEPr+=1;
			}
		}

		return $numEPr;
	}
	function MisRegistros($user_id,$items){
		$numReg=0;

		foreach ($items as $item) {
			if ($item['user_id']==$user_id) {
				$numReg+=1;
			}
		}

		return $numReg;
	}

	function Antiguos($items)
	{
		$antiguosDias = array();
		$antiguos = array();

		$num=0;

		foreach ($items as $item) {
			if (!($item['item_status']=="Entregado")) {
				$antiguosDias[$num]['dias']=DiasActual($item['item_date_sta']);
				$antiguosDias[$num]['id']=$item['id'];
				$num++;
			}
		}
		array_multisort($antiguosDias,SORT_DESC);

		if($num>3)
		{
			for($i=0;$i<3;$i++)
			{
				$antiguos[$i]['dias']=$antiguosDias[$i]['dias'];
				$antiguos[$i]['id']=$antiguosDias[$i]['id'];
			}
		}else{
			$antiguos=$antiguosDias;
		}

		return $antiguos;
	}

	function DiasActual($fechaIni)
	{
		$dias=0;
		date_default_timezone_set("America/Mexico_City");
		$today = getdate();
		$day = $today['year'].'-'.$today['mon'].'-'.$today['mday'];

		$datetime1 = date_create($fechaIni);
    	$datetime2 = date_create($day);

		$dias = date_diff($datetime1, $datetime2);
		return $dias->days;
	}

?>