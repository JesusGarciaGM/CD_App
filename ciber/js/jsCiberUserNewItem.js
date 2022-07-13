$(document).ready(function(){
	'use strict'
	$('#linkNew').attr('class','active');
	$('#linkItem').attr('aria-expanded','true');
	fechaAct();

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

	function fechaAct(){
		const hoy = new Date();
		$('#dateItem').val(formatoFecha(hoy,"yaya/mm/dd"));	
	}

	function formatoFecha(fecha, formato) {
	    const map = {
	        dd: fecha.getDate(),
	        mm: fecha.getMonth() + 1,
	        yy: fecha.getFullYear().toString().slice(-2),
	        yaya: fecha.getFullYear()
	    }

	    return formato.replace(/dd|mm|yy|yaya/gi, matched => map[matched]);
	}

	$(document).on('click','#buttonCan',function(){
		$('#new-form').trigger('reset');
		fechaAct();
	});

	$('#new-form').submit(function(e){
		const hoy = new Date();

		e.preventDefault();
		const postData = {
			customName: $('#nameCustomer').val(),
			customPhone: $('#phoneCustomer').val(),
			itemBrand: $('#brandItem').val(),
			itemModel: $('#modelItem').val(),
			itemPass: $('#passItem').val(),
			itemDetails: $('#detailsItem').val(),
			itemRemark: $('#remarkItem').val(),
			itemDate: formatoFecha(hoy,"yaya-mm-dd"),
			payCost: Number($('#costItem').val()),
			payAdvance: Number($('#advancePItem').val()),
			payMissing:Number($('#costItem').val())-Number($('#advancePItem').val())
		};
		$('#new-form').trigger('reset');
		$.post('../backend/ciberNewItem.php',postData,function(response){
			if(response!=0)
			{
				alert('Artículo realizado con éxito');
				location.href ="buscar.php";
			}else{
				alert('Error: Vuelva a intentar');
			}
			
		});
		
	});

});