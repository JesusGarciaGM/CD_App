$(document).ready(function(){
	'use strict'
	$('#linkInf').attr('class','active');
	$('.numRegistros').hide();
	$("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

	$('#sidebarCollapse').on('click', function () {
	    $('#sidebar, #content').toggleClass('active');
	    $('.collapse.in').toggleClass('in');
	    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });

	start();

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

	function start(){
		$.ajax({
			url: '../backend/ciberStart.php',
			type: 'GET',
			success: function(response){
				const datos = JSON.parse(response);
				//console.log(datos);
				$('#numUsu').html(datos['numUsu']);
				$('#numTot').html(datos['numTot']);
				$('#numEnt').html(datos['numEnt']);
				$('#numTer').html(datos['numTer']);
				$('#numEPr').html(datos['numEPr']);
				if (datos['antiguos'].length>2) {
					$('#numMan').html(datos['antiguos'][0]['dias']+" días");
					$('#numMan').attr('idItem',datos['antiguos'][0]['id']);

					$('#numMas_1').html("<a class='itemVer' href='#'> 💠 CD_ID = "+datos['antiguos'][0]['id']+"</a>");
					$('#numMas_1').attr('idItem',datos['antiguos'][0]['id']);

					$('#numMas_2').html("<a class='itemVer' href='#'> 💠 CD_ID = "+datos['antiguos'][1]['id']+"</a>");
					$('#numMas_2').attr('idItem',datos['antiguos'][1]['id']);

					$('#numMas_3').html("<a class='itemVer' href='#'> 💠 CD_ID = "+datos['antiguos'][2]['id']+"</a>");
					$('#numMas_3').attr('idItem',datos['antiguos'][2]['id']);
				}else{
					if(datos['antiguos'].length>1){
						$('#numMan').html(datos['antiguos'][0]['dias']+" días");
						$('#numMan').attr('idItem',datos['antiguos'][0]['id']);

						$('#numMas_1').html("<a class='itemVer' href='#'> 💠 CD_ID = "+datos['antiguos'][0]['id']+"</a>");
						$('#numMas_1').attr('idItem',datos['antiguos'][0]['id']);

						$('#numMas_2').html("<a class='itemVer' href='#'> 💠 CD_ID = "+datos['antiguos'][1]['id']+"</a>");
						$('#numMas_2').attr('idItem',datos['antiguos'][1]['id']);
					}else{
						if (datos['antiguos'].length==1) {
							$('#numMan').html(datos['antiguos'][0]['dias']+" días");
							$('#numMan').attr('idItem',datos['antiguos'][0]['id']);

							$('#numMas_1').html("<a class='itemVer' href='#'> 💠 CD_ID = "+datos['antiguos'][0]['id']+"</a>");
							$('#numMas_1').attr('idItem',datos['antiguos'][0]['id']);
						}
					}
				}
			}
		});
	}

	$(document).on('click','.itemVer',function(){
		let element = $(this)[0].parentElement;
		let itemId = $(element).attr('idItem');
		console.log(itemId);
		$.post('../backend/ciberItemShow.php',{itemId},function(response){
			location.href = 'ciberVerAdm.php';
		});
	});

});