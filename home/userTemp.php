<!--<div class="box">
  <div class="container-4">
      <span class="icon"><i class="fa fa-search"></i></span>
      <input type="text" id="search" placeholder="Buscar...">
  </div>
</div>-->
<div class="row" id="listU">
	<div class="col-md-4 col-xs-3">
		<div class="card">
			<div class="card-body">
				<form id="user-form">
					<input type="hidden" id="userId">
					<div class="form-group">
						<input type="text" id="name" placeholder="Usuario" class="form-control" disabled>							
					</div>	
					<div class="form-group">
						<input type="text" id="pass" placeholder="Contraseña" class="form-control" disabled>					
					</div>
					<div class="form-group mb-2">
						<input type="text" id="tipo" placeholder="Tipo de Usuario" class=" form-control" disabled>					
					</div>
					<button type="submit" class="btn btn-success" id="buttonAct" disabled>
						Guardar
					</button>
					<button type="button" class="btn btn-warning" id="buttonCan">Cancelar</button>
				    <button type="button" class="btn btn-primary" id="buttonDb" hidden>Backup</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-8 col-xs-9">
		
		<table id="tableU" class="table table-sm ">
			<thead class="thead-light">
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Tipo</th>
					<th></th>
				</tr>
			</thead>
			<tbody id="usuarios">
				<?php include('../backend/tableUser.php'); ?>
			</tbody>
		</table>
	</div>
</div>
