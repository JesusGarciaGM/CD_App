<div class="row" id="showItem">
	<div class="card">
		<div class="card-body">
			<form id="show-form">
				<p class="text-center"> Información del Cliente</p>
				<div class="input-group">
					<span class="input-group-text" style="width: 50%;"><b>Nombre</b> </span>
					<span class="input-group-text" style="width: 50%;"><b>Teléfono</b></span>
				</div>
				<div class="input-group">
					<input type="text" id="nameCustomer" placeholder="Nombre" class="form-control" required>
					<input type="text" id="phoneCustomer" placeholder="Teléfono" class="form-control">	
				</div>	
				<p class="text-center mt-2"> Información del Empleado</p>
				<div class="input-group">
					<input type="text" id="nameEmployee" placeholder="Nombre" class="form-control" disabled>
				</div>
				<p class="text-center mt-2"> Información del Artículo</p>
				<div class="input-group">
					<span class="input-group-text" style="width: 25%;"><b>CD_ID</b></span>
					<span class="input-group-text" style="width: 25%;"><b>Marca</b></span>
					<span class="input-group-text" style="width: 25%;"><b>Modelo</b></span>
					<span class="input-group-text" style="width: 25%;"><b>Contraseña</b></span>
				</div>
				<div class="input-group">
					<input type="text" id="itemId" placeholder="CD_ID" class="form-control" disabled>
					<input type="text" id="brandItem" placeholder="Marca" class="form-control">
					<input type="text" id="modelItem" placeholder="Modelo" class="form-control">
					<input type="text" id="passItem" placeholder="Contraseña" class="form-control">	
				</div>
				<div class="tAreaI input-group mt-3" >
					<div style="width: 50%;">
						<label class="input-group-text"><b>Detalles de la falla</b></label>
						<textarea class="form-control"  id="detailsItem" style="height: 100px;"></textarea>
						
					</div>
					<div style="width: 50%;">
						<label class="input-group-text"><b>Obervaciones</b></label>
						<textarea class="form-control"  id="remarkItem" style="height: 100px;"></textarea>
						
					</div>	
				</div>
				<div class="textI input-group mt-3" hidden="true">
					<div style="width: 50%;">
						<label class="input-group-text"><b>Detalles de la falla</b></label>
						<p class="form-control"  id="detailsItemText" style="height: 100px;"></p>
						
					</div>
					<div style="width: 50%;">
						<label class="input-group-text"><b>Obervaciones</b></label>
						<p class="form-control"  id="remarkItemText" style="height: 100px;"></p>
						
					</div>	
				</div>
				<div class="input-group mt-3">
					<span class="input-group-text">Fecha de recepción</span>
					<input type="text" id="dateItem" class="form-control" disabled="">
				</div>

				<p class="text-center mt-2"> Información del Pago</p>
				<div class="input-group">
					<span class="input-group-text" style="width: 33.33%;"><b>Costo</b></span>
					<span class="input-group-text" style="width: 33.33%;"><b>Anticipo</b></span>
					<span class="input-group-text" style="width: 33.33%;"><b>Faltante</b></span>
				</div>
				<div class="input-group mb-3">
					<input type="text" id="costItem" placeholder="Costo" class="form-control">
					<input type="text" id="advancePItem" placeholder="Anticipo" class="form-control">	
					<input type="text" id="missingItem" placeholder="Faltante" class="form-control" disabled>	
				</div>
				
				<button type="submit" class="btn btn-success " id="buttonAct">
					Actualizar
				</button>
				<button type="button" class="btn btn-warning" id="buttonBack">Volver</button>
				<button type="button" class="btn btn-info" id="buttonImp">Imprimir</button>
			</form>
		</div>
	</div>
	<div class="alertCust mt-3" hidden="true">
		*No nos hacemos responsables por equipos de más de 30 días.<b> NO CONTAMOS CON BODEGA.</b>
	</div>
</div>