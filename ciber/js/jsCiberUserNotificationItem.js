$(document).ready(function(){
	'use strict'
	$('#linkItem').attr('aria-expanded','true');
	$('.remark-Adm').hide();
	$('#whereItem').hide();
	let val="Lugar...";
	$("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

	$('#sidebarCollapse').on('click', function () {
	    $('#sidebar, #content').toggleClass('active');
	    $('.collapse.in').toggleClass('in');
	    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
	    $('#linkItem').attr('aria-expanded','true');
    });
	getItem();
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

	function getItem(){
		$.ajax({
			url: '../backend/ciberGetItem.php',
			type: 'GET',
			success: function(response){
				//console.log(response);
				const item = JSON.parse(response);
				$('#nameCustomer').text(item[0]['nameCustomer']);
				$('#phoneCustomer').text(item[0]['phoneCustomer']);
				$('#nameEmployee').text(item[0]['nameEmployee']);
				$('#brandItem').text(item[0]['brandItem']);
				$('#dateItem').text(item[0]['dateItem']);
				$('#statusItem').text(item[0]['statusItem']);
				$('#stockItem').val(item[0]['stockItem']);
				val = $('#stockItem').val();
				if (!(item[0]['statusItem']=="Entregado")) {
					$('#whereItem').show();
				}
				
			}
		});

	}

	$(document).on('click','.item-submit',function(){
		//Avance
		const value=$('#progressItem').val();
		if(value!="")
		{
			$.post('../backend/ciberPushProgress.php',{value},function(response){
				if(response!=0)
				{
					alert("Avance Agregado Exitosamente");
					location.reload();
				}
			});
		}else{
			alert("Contenido vacio");
		}
		
		
	});

	$(document).on('click','.item-notif',function(){
		//Notificaciones
		const value = $('#notificationItem').val();
		if(value!=""){
			$.post('../backend/ciberPushNotification.php',{value},function(response){
				if(response!=0)
				{
					alert("Notificación Agregada Exitosamente");
					location.reload();
				}
				
			});
		}else{
			alert("Contenido vacio");
		}
		
	});

	$(document).on('click','.item-status',function(){
		let status=$('#statusItem').text();
		if(!(status=="Entregado")){
			window.open('status.php', 'popup', 'top=100,left=100,height=400,width=700,toolbar=no,resizable=no,location=no,menubar=no,titlebar=no,status=no');
		}
		
	});
	$(document).on('change', '#stockItem', function(event) {

     	if (!($('#stockItem').val()=="Lugar...")) {
     		val = $('#stockItem').val();
     		$.post('../backend/ciberStock.php',{val},function(response){
     			location.reload();
     			alert("Cambio registrado exitosamente");
     		});
     	}else{
     		$('#stockItem').val(val);
     	}
     	
	});
});