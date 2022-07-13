<div class="row" id="newItem">
	<div>
		<div class="card">
			<div class="card-body">
				<form id="new-form">
					<p class="text-center"> Información del Cliente</p>
					<div class="input-group">
						<input type="text" id="nameCustomer" placeholder="Nombre" class="form-control" required>
						<input type="text" id="phoneCustomer" placeholder="Teléfono" class="form-control">	
					</div>	
					<p class="text-center mt-2"> Información del Artículo</p>
					<div class="input-group">
						<input type="text" id="brandItem" placeholder="Marca" class="form-control">
						<input type="text" id="modelItem" placeholder="Modelo" class="form-control">
						<input type="text" id="passItem" placeholder="Contraseña" class="form-control">	
					</div>
					<div class="input-group">
						<div style="width: 50%;">
							<label class="input-group-text">Detalles de la falla</label>
							<textarea class="form-control"  id="detailsItem" style="height: 100px;"></textarea>
  						
						</div>
						<div style="width: 50%;">
							<label class="input-group-text">Obervaciones</label>
							<textarea class="form-control"  id="remarkItem" style="height: 100px;"></textarea>
  						
						</div>	
					</div>
					<div class="input-group">
						<span class="input-group-text">Fecha de recepción</span>
						<input type="text" id="dateItem" class="form-control" disabled>
					</div>

					<p class="text-center mt-2"> Información del Pago</p>
					<div class="input-group mb-3">
						<input type="text" id="costItem" placeholder="Costo" class="form-control">
						<input type="text" id="advancePItem" placeholder="Anticipo" class="form-control">	
						<!-- <input type="text" id="missingItem" placeholder="Faltante" class="form-control"> -->	
					</div>
					
					<button type="submit" class="btn btn-success " id="buttonAct">
						Guardar
					</button>
					<button type="button" class="btn btn-warning" id="buttonCan">Cancelar</button>
				</form>
			</div>
		</div>
	</div>