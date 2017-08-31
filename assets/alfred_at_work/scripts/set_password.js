function set_password(){
	var open_gate = true,
		password = $('input#input_password').val(),
		password_confirmation = $('input#input_password_confirmation').val(),
		token = $('input#token').val();

	if( password == '' ){
		open_gate=false;
		$('input#input_password').addClass('wrong');
		Internal_notification_center({ type: 'create', message: 'The password cannot be empty !', status: 'error', duration: 5000});  
	}
	if( password_confirmation == '' ){
		open_gate=false;
		$('input#input_password_confirmation').addClass('wrong');
		Internal_notification_center({ type: 'create', message: 'The confirmation password cannot be empty !', status: 'error', duration: 5000});
	}
	if( password != password_confirmation ){
		$('input#input_password, input#input_password_confirmation').addClass('wrong');
		Internal_notification_center({ type: 'create', message: 'The password does not match.', status: 'error', duration: 5000});
	}
	if( token == '' ){
		open_gate=false;
		Internal_notification_center({ type: 'create', message: 'The token is invalid, please request a new forgot password email.', status: 'error', duration: 5000});  
	}

	if( open_gate == true ){
		var input_datas = "token=" + token + "&password="  + password + "&password_confirmation="  + password_confirmation;
		$('section#set_password div#from_container a.input_button.blue').css('background-color', '#cccccc');
		$('section#set_password div#from_container a.input_button.blue').text('Waiting ...');
    
		$.ajax({
			url : BASEURL + "alfredatwork/set-password/update-password",
			cache: false,
 			type : 'POST',
			data : input_datas,
			dataType : 'html',
			success : function( reponse ){
				console.log( reponse );
				var json_reponse = JSON.parse(reponse);
				Internal_notification_center({ type: 'create', message: json_reponse.message, status: json_reponse.status, duration: 10000});
				$('section#set_password div#from_container a.input_button.blue').css('background-color', 'rgb(95, 170, 239)');
				$('section#set_password div#from_container a.input_button.blue').text('Set Password');
			},
			error : function(resultat, statut, erreur){
				console.log(resultat, statut, erreur);
				Internal_notification_center({ type: 'create', message: erreur, status: 'error', duration: 5000});
				$('section#set_password div#from_container a.input_button.blue').css('background-color', 'rgb(95, 170, 239)');
				$('section#set_password div#from_container a.input_button.blue').text('Send recovery email');
			}
		});
	}
}