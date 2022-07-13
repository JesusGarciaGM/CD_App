$(document).ready(function(){
	'use strict'
	$('#linkState').attr('class','active');
	$('#linkItem').attr('aria-expanded','true');
	

	$("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

	$('#sidebarCollapse').on('click', function () {
	    $('#sidebar, #content').toggleClass('active');
	    $('.collapse.in').toggleClass('in');
	    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
	    $('#linkItem').attr('aria-expanded','true');
    });

    function comprobamosSesion()
	{
		$.ajax({
			url: '../backend/sesionOkU.php',
			type: 'GET',
			success: function(response){
				//console.log(response);
				if(response==0)
				{
					alert("La sesión no es valida!");// <-- Aquí sabemos que no es válida
        			clearInterval(sesion_ok);
        			location.reload();
				}
			}
		});
	}
	const sesion_ok = setInterval(() => {
  	comprobamosSesion();
	}, 120000);

	$('#tableProgress').DataTable({
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
	$(document).on('click','.item-notif',function(){
		let element = $(this)[0].parentElement.parentElement;
		let itemId = $(element).attr('idItem');

		$.post('../backend/ciberItemShow.php',{itemId},function(response){
			location.href = 'notificacion.php';
		});
	});
	
});