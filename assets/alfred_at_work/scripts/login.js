function login(){
	var open_gate = true,
		email = $('input#input_email').val(),
		password = $('input#input_password').val();

	if( email == '' ){
		open_gate=false;
		$('input#input_email').addClass('wrong');
		Internal_notification_center({ type: 'create', message: 'The email cannot be empty !', status: 'error', duration: 5000});  
	}
	if( (email.indexOf("@")<=0) || (email.indexOf(".")<=0) ){
		open_gate=false;
		$('input#revovery_email').addClass('wrong');
		Internal_notification_center({ type: 'create', message: 'The email address you enter is incorect.', status: 'error', duration: 5000});
	}
	if( password == '' ){
		open_gate=false;
		$('input#input_password').addClass('wrong');
		Internal_notification_center({ type: 'create', message: 'The password cannot be empty !', status: 'error', duration: 5000});
	}

	if( open_gate == true ){
		var input_datas = "email=" + email + '&password=' + password;
    
		$.ajax({
			url : BASEURL + "alfredatwork/login/auth",
			cache: false,
			type : 'POST',
			data : input_datas,
			dataType : 'html',
			success : function( reponse ){
				console.log( reponse );
				var json_reponse = JSON.parse(reponse);
				if( json_reponse.status == 'success' ){ window.location.href = BASEURL + 'alfredatwork/dashboard'; }
				Internal_notification_center({ type: 'create', message: json_reponse.message, status: json_reponse.status, duration: 2000});
			},
			error : function(resultat, statut, erreur){
				console.log(resultat, statut, erreur);
				Internal_notification_center({ type: 'create', message: erreur, status: 'error', duration: 5000});
			}
		});
	}
}

