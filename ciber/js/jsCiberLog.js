$(document).ready(function(){


	$(document).on('click','#show_pass',function(){
		var cambio = $("#ciberPass")[0];
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.iconN').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.iconN').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}

	});

	$('#ciberLog-form').submit(function(e){
		const postData = {
			user: $('#ciberUser').val(),
			pass: $('#ciberPass').val()
		};

		$.post('backend/ciberlogin.php',postData,function(response){
			let rol=response;
			
			if(rol!=0)
			{	
				
				switch (rol) {
					case '1':
						location.href ="home/ciberAdminInfo.php";
						break;
					case '2':
						location.href ="home/ciberUserInfo.php";
						break;
					default:
							
				}	
			}else{
				alert("Nombre de usuario o contraseña incorrecta");
			}
		});


		$('#ciberLog-form').trigger('reset');
		e.preventDefault();
	});
});
