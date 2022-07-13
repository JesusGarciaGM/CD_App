$(document).ready(function(){
	let data;

	ini();
	function ini(){
		$.ajax({
			url: '../backend/imprimirR.php',
			type: 'GET',
			success: function(response){
				data=JSON.parse(response);

				$('#fecha').append(
					`${data['fecha']}
					`
				);
				$('#folio').append(
					`${data['id']}
					`
				);
				$('#cantidad').append(
					`${data['meses']}
					`
				);
				$('#Concepto').append(
					`Pago de servicio de internet.<br>
						Cliente: <b>${data['cliente']}</b>, <br>
						de la comunidad de <b>${data['ubicacion']}</b>.
					`
				);
				$('#precio').append(
					`$${data['precio']}
					`
				);
				$('#total').append(
					`$${data['meses']*data['precio']}
					`
				);
				window.print();
			}
		});

	}

});