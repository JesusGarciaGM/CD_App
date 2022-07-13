<!DOCTYPE html>
<html>
<head>
	<?php include('meta.php');?>
	<link rel="icon"  href="../img/logoLG.ico" type="image/ico">
	<title>Estado del Trabajo</title>
	<style type="text/css">
		body{
			background-color: #AED6F1;
		}
		.wrapper{
			margin-top: 12%;
			margin-left: 7%;
			margin-right: auto;
			width: 600px;
			border: 2px solid white;

		}
		.res{
			margin-left: 40%;
			margin-right: auto;
			margin-top: 3%;
			padding-bottom: 10px;
		}
		h3{
			margin-left: 4%;
			margin-right: auto;

		}
	</style>
</head>
<body>

	<div class="wrapper">
		<h3>¿Se ha concluido con la reparación del artículo?</h3>
		<div class="res">	
			<a id="status_yes" href="#" class="btn btn-primary" role="button" style="width: 80px;">Si</a>
			<a id="status_no" href="#" class="btn btn-warning" role="button" style="width: 80px;">No</a>
		</div>
	</div>
	
	
	<?php include('libs.php');?>
	<script type="text/javascript" src="../js/jsCiberStatus.js"></script>
</body>
</html>