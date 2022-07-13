<div id="search-new-adm" class="mb-5 mt-3">
	<a class="btn btn-primary" role="button" href="ciberNuevo.php">Agregar</a>

</div>
<div id="search-new-user" class="mb-5 mt-3">
	<a class="btn btn-success" role="button" href="nuevo.php">Agregar</a>

</div>

<table id="tableSearch" class="table table-sm ">
	<thead class="thead-light">
		<tr>
			<th>CD_ID</th>
			<th>Nombre del cliente</th>
			<th>Teléfono del cliente</th>
			<th>Registrado por</th>
			<th>Marca del artículo</th>
			<th>Fecha de registro</th>
			<th>Status</th>
			<th class="title-delete"></th>
		</tr>
	</thead>
	<tbody id="items">
		<?php include('../backend/tableSearch.php'); ?>
	</tbody>
</table>