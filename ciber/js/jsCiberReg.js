$(document).ready(function(){
	$(document).on('click','#show_pass1',function(){
		var cambio = $("#ciberPass1")[0];
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.iconN').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.iconN').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}

	});
	$(document).on('click','#show_pass2',function(){
		var cambio = $("#ciberPass2")[0];
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.iconN1').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.iconN1').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}

	});

	$('#ciberReg-form').submit(function(e){
		const postData = {
			user: $('#ciberUser').val(),
			pass1: $('#ciberPass1').val(),
			pass2: $('#ciberPass2').val()
		};

		$.post('../backend/ciberReg.php',postData,function(response){
			console.log(response);
			if(response!=0)
			{
				alert('Registro realizado con éxito');
				location.href ="../index.php";
			}else{
				alert('Error: Vuelva a intentar');
			}
		});

		$('#ciberReg-form').trigger('reset');
		e.preventDefault();
	});
});