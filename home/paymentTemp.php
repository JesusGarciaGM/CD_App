<div class="row mt-4">

	<div class="btn-group col-3" role="group" aria-label="Agregar Cliente">
  		<button id="payment_newB" type="button" class="btn btn-success col-6">Nuevo</button>
  		<button id="payment_addB" type="button" class="btn btn-primary col-6">Agregar</button>
	</div>

	<div id="payment_add" class="input-group mt-3">
		<select class="form-control my-search" aria-label="Customer-place" >
		</select>
  		<input id="payment_precio" type="number" step="0.01" class="form-control" placeholder="Precio del servicio" aria-label="precio">
  		<span class="input-group-text">Fecha de pago</span>
  		<input id="payment_fechaP" type="date" class="form-control" placeholder="Fecha de pago" aria-label="Server">
  		
	</div>
	<div style="margin-top: 50px;">
		<div><h4>Control de pagos</h4></div>
		<button id="payment_actualB" type="button" class="btn btn-warning col-3 mb-4">Actualizar Calendario</button>
		<table id="tablePayment" class="table table-sm" >

			<thead class="thead-light">

				<tr>
					<th>#</th>
					<th>Cliente</th>
					<th>Ubicación</th>
					<th>Telefono</th>
					<th>Precio del servicio</th>
					<th>Último mes pagado</th>
					<th>Fecha de pago</th>
					<th>Fecha limite pago</th>
					<th>Meses de atraso</th>
					<th>Meses a pagar</th>
					<th class="payC"></th>

				</tr>

			</thead>

			<tbody id="payment_t">

				<?php include('../backend/tablePayment.php'); ?>

			</tbody>

		</table>
	</div>

</div>