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

	putUserName();

	function putUserName(){

		

		$('#name').val($('span.account-user-name')[0].outerText); 

	}



	$(document).on('click','#show_passN',function(){

		var cambio = $("#passN")[0];

		if(cambio.type == "password"){

			cambio.type = "text";

			$('.iconN').removeClass('fa fa-eye-slash').addClass('fa fa-eye');

		}else{

			cambio.type = "password";

			$('.iconN').removeClass('fa fa-eye').addClass('fa fa-eye-slash');

		}



	});

	$(document).on('click','#show_passNC',function(){

		var cambio = $("#passNC")[0];

		if(cambio.type == "password"){

			cambio.type = "text";

			$('.iconNC').removeClass('fa fa-eye-slash').addClass('fa fa-eye');

		}else{

			cambio.type = "password";

			$('.iconNC').removeClass('fa fa-eye').addClass('fa fa-eye-slash');

		}



	});

	

	$(document).on('click','#buttonCan',function(){

		$('#userAct-form').trigger('reset');

		putUserName();

	});

	$('#userAct-form').submit(function(e){

		const postData = {

			passN: $('#passN').val(),

			passNC: $('#passNC').val(),

			nombre: $('#name').val()

		};

		

		if (postData['passN']==postData['passNC']) {

			$.post('../backend/updataU.php',postData,function(response){
				alert('Cambios gurdados exitosamente');
				window.location.href = "../backend/cerrarSe.php";

		

			});

		}else

		{

			alert('Error: Verifique su contraseña');

		}



		

		$('#userAct-form').trigger('reset');

		e.preventDefault();

	});

});