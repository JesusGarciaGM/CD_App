<a class="btn btn-success mb-3 remark-Adm" id="buttonCan" role="button" href="ciberAvance.php">
	Regresar
</a>
<a class="btn btn-success mb-3 remark-User" id="buttonCan" role="button" href="avance.php">
	Regresar
</a>

<div class="input-group ver_item_progress">
	<span class="input-group-text" style="width: 16.666%;">Nombre del cliente</span> 	
	<span class="input-group-text" style="width: 16.666%;">Telefono del cliente</span>
	<span class="input-group-text" style="width: 16.666%;">Registrado por</span> 	
	<span class="input-group-text" style="width: 16.666%;">Marca del artículo</span>
	<span class="input-group-text" style="width: 16.666%;">Fecha de registro</span> 	
	<a class="input-group-text item-status" style="width: 16.666%;" href="#"><b>Status</b></a>				
</div>
<div class="input-group ver_item_progress mb-4">
	<span id="nameCustomer" class="input-group-text" style="width: 16.666%;"></span> 	
	<span  id="phoneCustomer"class="input-group-text" style="width: 16.666%;"></span>
	<span  id="nameEmployee"class="input-group-text" style="width: 16.666%;"></span> 	
	<span  id="brandItem"class="input-group-text" style="width: 16.666%;"></span>
	<span  id="dateItem"class="input-group-text" style="width: 16.666%;"></span> 	
	<span id="statusItem" class="input-group-text" style="width: 16.666%;">
	</span>						
</div>

<div class="input-group mb-3" id="whereItem">
  <label class="input-group-text" for="stockItem">Donde se encuentra</label>
  <select class="form-select" id="stockItem">
    <option selected>Lugar...</option>
    <option value="ciber">En el local</option>
    <option value="taller">En el taller</option>
    <option value="otro">En otro lugar</option>
  </select>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<div class="mb-2">
					<label class="input-group-text">Avance</label>
					<input class="form-control"  id="progressItem"></input>	
				</div>
				<button class="item-submit btn btn-primary" >
						Agregar
				</button>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<div class="mb-2">
					<label class="input-group-text">Notificación</label>
					<input class="form-control"  id="notificationItem"></input>	
				</div>
				<button class="item-notif btn btn-primary" >
						Agregar
				</button>
			</div>
		</div>
	</div>
</div>