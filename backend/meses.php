<?php

	function CalcularMeses($mes1,$mes2)
	{
		$date1 = new DateTime($mes1);
		$date2 = new DateTime($mes2);
		$result = $date1->diff($date2);

		return intval($result->days/30);
	}

//Fecha1 Registro Fecha2 Actual
	function YearM21($fecha1,$fecha2)
	{

		$fecha1_e=explode('-',$fecha1);
		$fecha2_e=explode('-',$fecha2);
		$mayor=1;

		if(intval($fecha2_e[0])<intval($fecha1_e[0]))
		{
			$mayor=-1;
		}else{
			if(intval($fecha2_e[0])==intval($fecha1_e[0]))
			{
				if(intval($fecha2_e[1])<intval($fecha1_e[1])){
					$mayor=-1;
				}
			}
		}

		return $mayor;
	}
?>