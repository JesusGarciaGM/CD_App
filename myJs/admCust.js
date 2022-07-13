$(document).ready(function(){
	let edit=false;
	
	$('#linkCust').attr('class','active');
	$('#buttonCan').hide();
	DateAuto();

	$("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

	$('#sidebarCollapse').on('click', function () {
	    $('#sidebar, #content').toggleClass('active');
	    $('.collapse.in').toggleClass('in');
	    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
    
	function comprobamosSesion()
	{
		$.ajax({
			url: '../backend/sesionOkA.php',
			type: 'GET',
			success: function(response){
				//console.log(response);
				if(response==0)
				{
					alert("la sesion no es valda!");// <-- Aquí sabemos que no es válida
        			clearInterval(sesion_ok);
        			location.reload();
				}
			}
		});
	}
	const sesion_ok = setInterval(() => {
  	comprobamosSesion();
	}, 120000);

	function DateAuto() {
		
		var now = new Date();

		var day = ("0" + now.getDate()).slice(-2);
		var month = ("0" + (now.getMonth() + 1)).slice(-2);
		var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
  		
  		$('#fecP').val(today);
	}
	$('#tableC').DataTable({
		 language: {
	        processing:     "Procesando...",
	        search:         "Buscar:",
	        lengthMenu:    "Mostrar _MENU_ registros",
	        info:           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
	        infoEmpty:      "Mostrando registros del 0 al 0 de un total de 0 registros",
	        infoFiltered:   "(filtrado de un total de _MAX_ registros)",
	        infoPostFix:    "",
	        loadingRecords: "Cargando...",
	        zeroRecords:    "No se encontraron resultados",
	        emptyTable:     "Ningún dato disponible en esta tabla",
	        paginate: {
	            first:      "Primero",
	            previous:   "Anterior",
	            next:       "Siguiente",
	            last:       "Último"
	        },
	        aria: {
	            sortAscending:  ": Activar para ordenar la columna de manera ascendente",
	            sortDescending: ": Activar para ordenar la columna de manera descendente"
	        }
	    },
	    order: [[0,'desc']],
	    lengthMenu: [ 5, 10, 20]

	});

	$(document).on('click','.cust-delete',function(){
		if (confirm('¿ Esta seguro de que quiere eliminar al cliente?')) {
			let element = $(this)[0].parentElement.parentElement;
			let id = $(element).attr('custId');
			$.post('../backend/cust-delete.php',{id},function(response){
				location.reload();
			});
		}
	});

	$(document).on('click','#buttonCan',function(){
		$('#buttonCan').hide();
		$('#cust-form').trigger('reset');
		DateAuto();
		edit = false;
	});

	$(document).on('click','.cust-item',function(){
		$('#buttonCan').show();
		$('#buttonAct').html('Actualizar');
		
		let element = $(this)[0].parentElement.parentElement;
		let id = $(element).attr('custId');
		$.post('../backend/cust-single.php',{id},function(response){

			const cust = JSON.parse(response);
			$('#custId').val(cust[0].id);
			$('#cust').val(cust[0].nombre);
			$('#ant').val(cust[0].antena);
			$('#rou').val(cust[0].router);
			$('#tel').val(cust[0].telefono);
			$('#con').val(cust[0].contacto);
			$('#ubi').val(cust[0].ubicacion);
			$('#fecP').val(cust[0].pago);
			edit = true;
			
		});
	});

	
	$('#cust-form').submit(function(e){
		const postData = {
			id: $('#custId').val(),
			nombre: $('#cust').val(),
			antena: $('#ant').val(),
			router: $('#rou').val(),
			telefono: $('#tel').val(),
			contacto: $('#con').val(),
			ubicacion: $('#ubi').val(),
			pago: $('#fecP').val()
		};
		//Metodo POST mas corto usando JQUERY
		// Parametros requeridos
		//1.- URL del servidor
		//2.- Datos a enviar
		//3.- Funcion o metodo para manejar la solicitud
		$('#buttonCan').hide();
		let url = edit === false ? '../backend/cust-add.php' : '../backend/cust-edit.php';
		$.post(url,postData,function(response){
			$('#cust-form').trigger('reset');
			edit = false;
			location.reload();
		});
		e.preventDefault();
	});
});