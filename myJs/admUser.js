$(document).ready(function(){


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


	
	$('#linkUser').attr('class','active');
	$('#buttonCan').hide();
	

	$(document).on('click','.user-item',function(){
		$('#tipo').prop('disabled',false);
		$('#tipo').prop('required',true);
		$('#buttonAct').prop('disabled',false);
		$('#search').prop('disabled',true);
		$('#buttonCan').show();
		let element = $(this)[0].parentElement.parentElement;
		let id = $(element).attr('userId');
		$.post('../backend/user-single.php',{id},function(response){

			const user = JSON.parse(response);
			$('#userId').val(user[0].id);
			$('#name').val(user[0].username);
			$('#pass').val('********');
			$('#tipo').val(user[0].tipo);
			
		});
	});

	$(document).on('click','#buttonCan',function(){
		$('#tipo').prop('required',false);
		$('#tipo').prop('disabled',true);
		$('#buttonAct').prop('disabled',true);
		$('#buttonCan').hide();
		$('#user-form').trigger('reset');
	});
    	$(document).on('click','#buttonDb',function(){
    	    $.ajax({
			    url: '../backend/get_db_backup.php',
			    type: 'GET',
			    success: function(response){
			       
			        nombreDB='../backend/';
			        nombreDB+=response;
			        console.log(nombreDB);
			        window.location.href = nombreDB;
				    alert("Respaldo Exitoso");
			    }
		    });
    	});
    

	$('#user-form').submit(function(e){
	
		if($('#tipo').val()==1 || $('#tipo').val()==2)
		{
			const postData = {
			tipo: $('#tipo').val(),
			id: $('#userId').val()
			};
			$('#buttonCan').hide();

			$.post('../backend/user-edit.php',postData,function(response){
				
				if (response==1) {
					$('#tipo').prop('required',false);
					$('#tipo').prop('disabled',true);
					$('#buttonAct').prop('disabled',true);
					$('#search').prop('disabled',false);
					$('#buttonCan').hide();
					$('#user-form').trigger('reset');
					
				}
				location.reload();
			});
		}else
		{
			alert('El tipo es incorrecto');
		}
		e.preventDefault();
	});

	$(document).on('click','.user-delete',function(){
		if (confirm('¿ Esta seguro de que quiere eliminar este usuario?')) {
			let element = $(this)[0].parentElement.parentElement;
			let id = $(element).attr('userId');
			$.post('../backend/user-delete.php',{id},function(response){
				location.reload();
			});
		}
	});
	$('#tableU').DataTable({
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
	    lengthMenu: [ 5, 10, 20]

	});
	
});