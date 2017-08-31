function sidemenu(){
	$('#hamburger_icon').toggleClass('active');
	$('#left_menu').toggleClass('active');
}

function save_email_to_mailchimp(){
	var open_door = true;
	var email = $('#newsletter_input').val();

	if( email == '' ){
		open_door = false;
		alert('The email is required.');
		return false;
	}

	if( (email.indexOf("@")==0) && (email.indexOf(".")==0) ){
		open_door = false;
		alert('The email is incorrect.');
		return false;
	}

	if( open_door ){
		var input_datas = "email=" + encodeURIComponent( email );

		$.ajax({
			url : BASEURL + "support-us/newsletter",
			cache: false,
			type : 'POST',
			data : input_datas,
			dataType : 'html',
			success : function(reponse){
				var json_reponse = JSON.parse(reponse);
				alert( json_reponse.message );
				$('#newsletter_input').val('');
			},
			error : function(resultat, statut, erreur){
				console.log( resultat, statut, erreur );
			}
		});
	}
}