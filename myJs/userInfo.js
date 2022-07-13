$(document).ready(function(){

	$('#linkInfU').attr('class','side-nav-link active');
	$('#linkCustU').attr('class','side-nav-link');
	$("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

	$('#sidebarCollapse').on('click', function () {
	    $('#sidebar, #content').toggleClass('active');
	    $('.collapse.in').toggleClass('in');
	    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
	dashboard();
	function comprobamosSesion()
	{
		$.ajax({
			url: '../backend/sesionOkU.php',
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

	function dashboard (){
		const postData = {
			salamanca: 'salamanca',
			valtierrilla: 'valtierrilla',
			cardenas: 'cardenas',
			carmen: 'carmen',
			granja: 'granja torres',
			gallo: 'gallo',
			compania: 'compañia',
			sauz: 'sauz',
			isidro: 'san isidro',
			haciendita: 'haciendita',
			garaje: 'garaje',
			rosa: 'doña rosa',
			conejas: 'conejas',
			cenizos: 'cenizos'
		}

		$.post('../backend/getCust.php',postData,function(response){
			let numCust=JSON.parse(response);
			$('#numTo').html(numCust['total']);
			$('#numSa').html(numCust['salamanca']);
			$('#numVa').html(numCust['valtierrilla']);
			$('#numCa').html(numCust['cardenas']);
			$('#numCG').html(numCust['carmen']+numCust['granja']);
			$('#numGa').html(numCust['gallo']);
			$('#numCo').html(numCust['compania']);
			$('#numSz').html(numCust['sauz']);
			$('#numSi').html(numCust['isidro']);
			$('#numHa').html(numCust['haciendita']);
			$('#numRC').html(numCust['rosa']+numCust['conejas']);
			$('#numCe').html(numCust['cenizos']);

		});
	}
	
});
