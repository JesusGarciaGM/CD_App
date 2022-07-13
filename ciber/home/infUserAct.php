<div class="container" style="width: 300px;">
	<div>		
		<h4 class="page-title">Informacion de Usuario</h4>
	</div>
	<form id="userAct-form">
		<div class="form-group">
			<input type="text" id="name" placeholder="Usuario" class="form-control" required>							
		</div>	
		<div class="form-group input-group">
			<input type="password" id="passN" placeholder="Nueva Contraseña" class="form-control" required>	
			<button id="show_passN" class="btn btn-primary" type="button"> <span class="fa fa-eye-slash iconN"></span> </button>				
		</div>
		<div class="form-group input-group mb-3">
			<input type="password" id="passNC" placeholder="Confirmar Contraseña" class="form-control" required>	
			<button id="show_passNC" class="btn btn-primary" type="button"> <span class="fa fa-eye-slash iconNC"></span> </button>			
		</div>
		
		<button type="submit" class="btn btn-success" id="buttonAct">
			Guardar
		</button>
		<button type="button" class="btn btn-warning" id="buttonCan">Cancelar</button>
	</form>
	</div>