
<!DOCTYPE html>
<html lang="es">
<head>

	<?php include('meta.php');?>
	<link rel="stylesheet" type="text/css" href="../myStyle/imprimirR.css">
	<link rel="icon"  href="../img/logoLG.ico" type="image/ico">
	<title>Imprimir Recibo</title>

</head>
<body>
	<div class="wrapper">
		<div class="container">
			<div class="form-group input-group mb-3">
				<img src="../img/logoSM.jpg">
				<h4  class="titulo">CD Internet</h4>
			</div>
			<div class="form-group input-group cabecera">
				<div class="col-sm-9">
					<h6>Servicio de internet</h6>
					<div>Ricardo Abraham López Ahumada</div>
					<div>LOAR040306BI5</div>
					<div>Av. Faja de oro 501-a. San Gonzalo</div>
				</div>
				<div class="col-sm-3 infoFecha">
					<div>Fecha</div>
					<div id="fecha"></div>
					<div>Folio</div>
					<div id="folio"></div>
				</div>
			</div>
			
			
			<div class="contenido">
				<div class="form-group input-group renContenido">
					<div class="col-sm-3">
						<div>Cantidad</div>
						<div id="cantidad"></div>
					</div>
					<div class="col-sm-6 colConcepto">
						<div>Concepto</div>
						<div id="Concepto"></div>
					</div>
					<div class="col-sm-3">
						<div>Precio</div>
						<div id="precio"></div>
					</div>
				</div>
				<div class="form-group input-group renTotal">
					
						<div class="col-sm-6 spanTotal">Total</div>
						<div id="total" class="col-sm-3"></div>
					
				</div>
				
			</div>
			<div class="mt-4"><em>Nota: Este no es un documento fiscal.</em></div>
		</div>
	</div>
	



	<?php include('libs.php');?>
	<script type="text/javascript" src="../myJs/recibo.js"></script>
</body>
</html>