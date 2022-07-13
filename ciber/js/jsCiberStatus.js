$(document).ready(function(){
	'use strict'

	$(document).on('click','#status_no',function(){
		 $.ajax({
			url: '../backend/ciberIncompletedWork.php',
			type: 'GET',
			success: function(response){
				window.opener.location.reload();
				window.close();
			}
		});
	});
	$(document).on('click','#status_yes',function(){
		$.ajax({
			url: '../backend/ciberCompletedWork.php',
			type: 'GET',
			success: function(response){
				window.opener.location.reload();
				window.close();
			}
		});
		
	});
});