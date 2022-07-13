$(document).ready(function(){


	'use strict'
	$("#payment_add").hide();
	$('.payment_precioM').hide();
	$('.payment-cust-Modif').hide();
	$('.payment-cust-cancel').hide();
	$('#linkPayR').attr('class','active');

	$('#linkPayment').attr('aria-expanded','true');



	$("#sidebar").mCustomScrollbar({

        theme: "minimal"

    });


    $('#sidebarCollapse').on('click', function () {

	    $('#sidebar, #content').toggleClass('active');

	    $('.collapse.in').toggleClass('in');

	    $('a[aria-expanded=true]').attr('aria-expanded', 'false');

	    $('#linkPayment').attr('aria-expanded','true');

    });

    let cust={};
    let custS = -1;
    paymentListCust();
	function comprobamosSesion()

	{

		$.ajax({

			url: '../backend/sesionOkC.php',

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

	$('.my-search').select2({
		placeholder: "Seleccione un cliente",
    	allowClear: true

	});

	$('#tablePayment').DataTable({
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
	    lengthMenu: [ 10, 20, 30]

	});

	function paymentListCust(){
		$.ajax({
			url: '../backend/getListCust.php',
			type: 'GET',
			success: function(response){
				cust = JSON.parse(response); 
				$.each(cust, function(index, obj) {
					if(index==0){
						$('.my-search').append(
						`	<option value="0">Seleccione el cliente</option>
							<option value="${index}">${obj.nombre} / ${obj.ubicacion}</option>
						`
					);
					}else{
						$('.my-search').append(
						`<option value="${index}">${obj.nombre} / ${obj.ubicacion}</option>
						`
					);
					}
					
				});


			}
		});
	}

	$(document).on('change', '.my-search', function(event) {
    	custS=$(".my-search option:selected").val();
    	let precio= $("#payment_precio").val();
    	$('#payment_fechaP').val(cust[custS].fecha_pago);
    	console.log(cust[custS].fecha_pago);
    	if(precio==''){
    		$("#payment_precio").val("300");
    	}

	});

	$(document).on('click', '#payment_newB', function(event) {
		$('#payment_precio').val("");
		$('#payment_fechaP').val("");

		$("#payment_add").show();
	});

	$(document).on('click', '#payment_addB', function(event) {
		let data = {
			cliente: "",
			ubicacion: "",
			telefono: "",
			precio: $("#payment_precio").val(),
			fecha_pago: $('#payment_fechaP').val()
		};
		if(data.precio=="" || data.fecha_pago=="")
		{
			alert("Datos incorrectos: Favor de validar la información");
		}else{
			data.cliente = cust[custS].nombre;
			data.ubicacion = cust[custS].ubicacion;
			data.telefono = cust[custS].telefono;
			$.post('../backend/payment-cust_add.php',data,function(response){
				alert("Registro Exitoso");
				location.reload();
			});
		}
		
	});


	$(document).on('click', '#payment_actualB', function(event) {
		$.ajax({
			url: '../backend/actualPaymentM.php',
			type: 'GET',
			success: function(response){
				alert("Los meses de adeudo se han actualizado");
				location.reload();
			}
		});
		
	});
	
	$(document).on('click', '.payment-cust', function(event) {
		let element = $(this)[0].parentElement.parentElement;
		let id = $(element).attr('payCustId');
		let valM=$(element).find('.paymentMesesP');
		let meses_pagar=valM.val();
		//console.log(meses_pagar);
		if(meses_pagar>0)
		{
			$.post('../backend/payment-month_pay.php',{id,meses_pagar},function(response){
				alert("Pago Exitoso");
				window.open('imprimirRecibo.php',"_blank");
				location.reload();
			});
			//console.log("Pagando "+id);
		}else{
			alert("Error: Numero de meses a pagar invalido");
		}

	});

	$(document).on('click', '.payment-cust-edit', function(event) {
		let elementButton = $(this)[0].parentElement;
		let element = $(this)[0].parentElement.parentElement;

		let valA=$(element).find('.payment_precioA');
		let valM=$(element).find('.payment_precioM');
		valM.val(valA.text());
		valM.show();
		$(elementButton).find('.payment-cust-Modif').show();
		$(elementButton).find('.payment-cust-cancel').show();
		/*$('.payment_precioM').show();
		$('.payment-cust-Modif').show();
		$('.payment-cust-cancel').show();

		$('.payment_precioA').hide();
		$('.payment-cust').hide();
		$('.payment-cust-edit').hide();*/
		valA.hide();
		$(elementButton).find('.payment-cust').hide();
		$(elementButton).find('.payment-cust-edit').hide();
	});
	$(document).on('click', '.payment-cust-cancel', function(event) {
		let elementButton = $(this)[0].parentElement;
		let element = $(this)[0].parentElement.parentElement;

		let valA=$(element).find('.payment_precioA');
		let valM=$(element).find('.payment_precioM');

		valM.val('');
		valM.hide();
		$(elementButton).find('.payment-cust-Modif').hide();
		$(elementButton).find('.payment-cust-cancel').hide();
		/*$('.payment_precioM').show();
		$('.payment-cust-Modif').show();
		$('.payment-cust-cancel').show();

		$('.payment_precioA').hide();
		$('.payment-cust').hide();
		$('.payment-cust-edit').hide();*/
		valA.show();
		$(elementButton).find('.payment-cust').show();
		$(elementButton).find('.payment-cust-edit').show();
	});

	$(document).on('click', '.payment-cust-Modif', function(event) {

		let element = $(this)[0].parentElement.parentElement;

		let valM=$(element).find('.payment_precioM').val();
		let id = $(element).attr('payCustId');
		
		if(valM>0)
		{
			$.post('../backend/payment-modif_pay.php',{id,valM},function(response){
				alert("Cambio realizado exitosamente");
				location.reload();
			});
			
		}else{
			alert("Error: Valor del precio invalido");
		}

		



	});
});