$(document).ready(function(){

	'use strict'
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
	star();
    function comprobamosSesion()
	{
		$.ajax({
			url: '../backend/sesionOkA.php',
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

	function star(){
		$.ajax({
			url: '../backend/ciberGetItem.php',
			type: 'GET',
			success: function(response){
				const item = JSON.parse(response);
				$('#itemId').val("CD_ID "+item[0]['itemId']);
				$('#nameCustomer').val(item[0]['nameCustomer']);
				$('#phoneCustomer').val(item[0]['phoneCustomer']);
				$('#nameEmployee').val(item[0]['nameEmployee']);
				$('#brandItem').val(item[0]['brandItem']);
				$('#modelItem').val(item[0]['modelItem']);
				$('#passItem').val(item[0]['passItem']);
				$('#detailsItem').val(item[0]['detailsItem']);
				$('#remarkItem').val(item[0]['remarkItem']);
				$('#dateItem').val(item[0]['dateItem']);
				if (item[0]['payCost']==0) {
					$('#costItem').val('--');
					$('#advancePItem').val('--');
					$('#missingItem').val('--');
				}else{
					$('#costItem').val(item[0]['payCost']);
					$('#advancePItem').val(item[0]['payAdvance']);
					$('#missingItem').val(item[0]['payMissing']);
				}
				
				
			}
		});
	}
	$(document).on('click','#buttonBack',function(){
		location.href = 'ciberBuscar.php';
	});

	$('#show-form').submit(function(e){

		e.preventDefault();
		const postData = {
			customName: $('#nameCustomer').val(),
			customPhone: $('#phoneCustomer').val(),
			itemBrand: $('#brandItem').val(),
			itemModel: $('#modelItem').val(),
			itemPass: $('#passItem').val(),
			itemDetails: $('#detailsItem').val(),
			itemRemark: $('#remarkItem').val(),
			itemDate: $('#dateItem').val(),
			payCost: Number($('#costItem').val()),
			payAdvance: Number($('#advancePItem').val()),
			payMissing: Number($('#costItem').val())-Number($('#advancePItem').val())
		};
		$.post('../backend/ciberShowItem.php',postData,function(response){
			if(response!=0)
			{
				alert('Artículo realizado con éxito');
				$('#show-form').trigger('reset');
				location.reload();
			}else{
				alert('Error: Vuelva a intentar');
			}
			
		});
		
	});

	$(document).on('click','#buttonImp',function(){
		window.open('imprimir.php', '_blank');
	});
});