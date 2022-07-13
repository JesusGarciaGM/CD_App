<div class="row" id="listU">

	<div class="col-md-4">

		<div class="card">

			<div class="card-body">

				<form id="cust-form">

					<input type="hidden" id="custId">

					<div class="form-group">

						<input type="text" id="cust" placeholder="Cliente" class="form-control" required>							

					</div>	

					<div class="form-group">

						<input type="text" id="ant" placeholder="IP Antena" class="form-control">					

					</div>

					<div class="form-group">

						<input type="text" id="rou" placeholder="Wan del Router" class=" form-control">					

					</div>

					<div class="form-group">

						<input type="text" id="tel" placeholder="Telefono" class=" form-control">					

					</div>

					<div class="form-group">

						<input type="text" id="con" placeholder="Contacto de referencia" class=" form-control">					

					</div>

					<div class="input-group">

					  <label class="input-group-text" for="ubi">Ubicación</label>

					  <select class="form-select" id="ubi">

					    <option value="Salamanca">Salamanca</option>

					    <option value="Valtierrilla">Valtierrilla</option>

					    <option value="Cardenas">Cárdenas</option>

					    <option value="El Carmen">El Carmen</option>

					    <option value="Granja Torres">Granja Torres</option>

					    <option value="El Gallo">El Gallo</option>

					    <option value="La Compañia">La Compañia</option>

					    <option value="El sauz">El sauz</option>

					    <option value="San Isidro">San Isidro</option>

					    <option value="La Haciendita">La Haciendita</option>

					    <option value="El Garaje">El Garaje</option>

					    <option value="Doña Rosa">Doña Rosa</option>

					    <option value="Las Conejas">Las Conejas</option>

					    <option value="Los Cenizos">Los Cenizos</option>

					    <option value="Los locos">Los locos</option>

					    <option value="Los loquitos">Los loquitos</option>

					    <option value="Otros...">Otros...</option>

					  </select>

					</div>

					<!-- <div class="form-group">

						<input type="text" id="ubi" placeholder="Ubicacion" class=" form-control" required>					

					</div> -->

					<div class="form-group mb-2">

						<input type="date" id="fecP" placeholder="Fecha de pago" class=" form-control">					

					</div>

					<button type="submit" class="btn btn-success" id="buttonAct">

						Guardar

					</button>

					<button type="button" class="btn btn-warning" id="buttonCan">Cancelar</button>

				</form>

			</div>

		</div>

	</div>

	<div class="col-md-8">

		

		<table id="tableC" class="table table-sm " >

			<thead class="thead-light">

				<tr>

					<th>#</th>

					<th>Cliente</th>

					<th>Wan Router</th>

					<th>Telefono</th>

					<th>Ubicacion</th>

					<th class="deleteUser"></th>

				</tr>

			</thead>

			<tbody id="usuarios">

				<?php include('../backend/tableCust.php'); ?>

			</tbody>

		</table>

	</div>

</div>