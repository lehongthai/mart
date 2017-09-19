$(document).ready(function () {
	$('#changeLanguage').change(function(){
		var locale = $(this).val();
		var _token = $('input[name=_token]').val();


		$.ajax({

			url: '/laravel/mart/public/language',
			type: 'POST',
			data: {locales: locale, _token: _token},
			dataType: 'json',
			success: function(data){

			},
			error: function(data){

			},
			beforeSend: function(){

			},
			complete: function(data){
				window.location.reload(true);
			}
		});
	});
})