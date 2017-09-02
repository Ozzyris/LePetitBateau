function verification_payment_adress(){
	let open_door = true,
		user_details = {
			artwork_id: $('#input_artworkId').val(),
			date: moment().unix(),
			firstName: $('#input_firstName').val(),
			lastName: $('#input_lastName').val(),
			email: $('#input_email').val(),
			address: $('#input_address').val(),
			postcode: $('#input_postalcode').val(),
			region: $('#input_region').val(),
			city: $('#input_city').val(),
			country: $('#input_country').val()
		};

	$('#input_firstName, #input_lastName, #input_email, #input_address, #input_postalcode, #input_city').parent('div').removeClass('wrong');
	$('#input_country, #input_region').parent('div').parent('div').removeClass('wrong');
	$('#input_firstName, #input_lastName, #input_email, #input_address, #input_postalcode, #input_city').parent('div').children('p').removeClass('active');
	$('#input_country, #input_region').parent('div').parent('div').children('p').removeClass('active');

	if( user_details.firstName == '' ){
		open_door = false;
		let message = 'The first name field is required.';
		$('#input_firstName').parent('div').addClass('wrong');
		$('#input_firstName').parent('div').children('p').text( message );
		$('#input_firstName').parent('div').children('p').addClass('active');
	}
	if( user_details.lastName == '' ){
		open_door = false;
		let message = 'The last name field is required.';
		$('#input_lastName').parent('div').addClass('wrong');
		$('#input_lastName').parent('div').children('p').text( message );
		$('#input_lastName').parent('div').children('p').addClass('active');
	}
	if( user_details.email.indexOf('@') == -1 && user_details.email.indexOf('.') == -1 ){
		open_door = false;
		let message = 'The email field is invalid.';
		$('#input_email').parent('div').addClass('wrong');
		$('#input_email').parent('div').children('p').text( message );
		$('#input_email').parent('div').children('p').addClass('active');
	}
	if( user_details.email == '' ){
		open_door = false;
		let message = 'The email field is required.';
		$('#input_email').parent('div').addClass('wrong');
		$('#input_email').parent('div').children('p').text( message );
		$('#input_email').parent('div').children('p').addClass('active');
	}
	if( user_details.address == '' ){
		open_door = false;
		let message = 'The address field is required.';
		$('#input_address').parent('div').addClass('wrong');
		$('#input_address').parent('div').children('p').text( message );
		$('#input_address').parent('div').children('p').addClass('active');
	}
	if( user_details.postcode.length < 4 ){
		open_door = false;
		let message = 'The postcode field is invalid.';
		$('#input_postalcode').parent('div').addClass('wrong');
		$('#input_postalcode').parent('div').children('p').text( message );
		$('#input_postalcode').parent('div').children('p').addClass('active');
	}
	if( user_details.postcode == '' ){
		open_door = false;
		let message = 'The postcode field is required.';
		$('#input_postalcode').parent('div').addClass('wrong');
		$('#input_postalcode').parent('div').children('p').text( message );
		$('#input_postalcode').parent('div').children('p').addClass('active');
	}
	if( user_details.region == null ){
		open_door = false;
		let message = 'The region field is required.';
		$('#input_region').parent('div').parent('div').addClass('wrong');
		$('#input_region').parent('div').parent('div').children('p').text( message );
		$('#input_region').parent('div').parent('div').children('p').addClass('active');
	}
	if( user_details.city == '' ){
		open_door = false;
		let message = 'The city field is required.';
		$('#input_city').parent('div').addClass('wrong');
		$('#input_city').parent('div').children('p').text( message );
		$('#input_city').parent('div').children('p').addClass('active');
	}
	if( user_details.country == null ){
		open_door = false;
		let message = 'The country field is required.';
		$('#input_country').parent('div').parent('div').addClass('wrong');
		$('#input_country').parent('div').parent('div').children('p').text( message );
		$('#input_country').parent('div').parent('div').children('p').addClass('active');
	}

	if( open_door ){
		console.log( user_details );
		$.ajax({
			url : BASEURL + "payment-your-address/save-user-data",
			cache: false,
			type : 'POST',
			data : 'user_details=' + JSON.stringify( user_details ),
			dataType : 'json',
			success : function(reponse){
				console.log( reponse );
				window.open( BASEURL + 'payment-recapituatif/' + reponse.user_id,'_self',false)
			},
			error : function(resultat, statut, erreur){
				console.log( resultat, statut, erreur );
			}
		});
	}

}