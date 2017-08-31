function verification_payment_adress(){
	let open_door = true,
		user_details = {
			artwork_id: $('#input_artworkId').val(),
			date: new Date, //TO BE UPDATED WITH MOMENT
			firstName_input: $('#input_firstName').val(),
			lastName_input: $('#input_lastName').val(),
			email_input: $('#input_email').val(),
			address_input: $('#input_address').val(),
			postcode_input: $('#input_postalcode').val(),
			region_input: $('#region_input').val(),
			city_input: $('#input_city').val(),
			country_input: $('#input_country').val()
		};

	$('#input_firstName, #input_lastName, #input_email, #input_address, #input_postalcode, #input_city').parent('div').removeClass('wrong');
	$('#input_country, #region_input').parent('div').parent('div').removeClass('wrong');
	$('#input_firstName, #input_lastName, #input_email, #input_address, #input_postalcode, #input_city').parent('div').children('p').removeClass('active');
	$('#input_country, #region_input').parent('div').parent('div').children('p').removeClass('active');

	if( user_details.firstName_input == '' ){
		open_door = false;
		let message = 'The first name field is required.';
		$('#input_firstName').parent('div').addClass('wrong');
		$('#input_firstName').parent('div').children('p').text( message );
		$('#input_firstName').parent('div').children('p').addClass('active');
	}
	if( user_details.lastName_input == '' ){
		open_door = false;
		let message = 'The last name field is required.';
		$('#input_lastName').parent('div').addClass('wrong');
		$('#input_lastName').parent('div').children('p').text( message );
		$('#input_lastName').parent('div').children('p').addClass('active');
	}
	if( user_details.email_input.indexOf('@') == -1 && user_details.email_input.indexOf('.') == -1 ){
		open_door = false;
		let message = 'The email field is invalid.';
		$('#input_email').parent('div').addClass('wrong');
		$('#input_email').parent('div').children('p').text( message );
		$('#input_email').parent('div').children('p').addClass('active');
	}
	if( user_details.email_input == '' ){
		open_door = false;
		let message = 'The email field is required.';
		$('#input_email').parent('div').addClass('wrong');
		$('#input_email').parent('div').children('p').text( message );
		$('#input_email').parent('div').children('p').addClass('active');
	}
	if( user_details.address_input == '' ){
		open_door = false;
		let message = 'The address field is required.';
		$('#input_address').parent('div').addClass('wrong');
		$('#input_address').parent('div').children('p').text( message );
		$('#input_address').parent('div').children('p').addClass('active');
	}
	if( user_details.postcode_input.length < 4 ){
		open_door = false;
		let message = 'The postcode field is invalid.';
		$('#input_postalcode').parent('div').addClass('wrong');
		$('#input_postalcode').parent('div').children('p').text( message );
		$('#input_postalcode').parent('div').children('p').addClass('active');
	}
	if( user_details.postcode_input == '' ){
		open_door = false;
		let message = 'The postcode field is required.';
		$('#input_postalcode').parent('div').addClass('wrong');
		$('#input_postalcode').parent('div').children('p').text( message );
		$('#input_postalcode').parent('div').children('p').addClass('active');
	}
	if( user_details.region_input == null ){
		open_door = false;
		let message = 'The region field is required.';
		$('#region_input').parent('div').parent('div').addClass('wrong');
		$('#region_input').parent('div').parent('div').children('p').text( message );
		$('#region_input').parent('div').parent('div').children('p').addClass('active');
	}
	if( user_details.city_input == '' ){
		open_door = false;
		let message = 'The city field is required.';
		$('#input_city').parent('div').addClass('wrong');
		$('#input_city').parent('div').children('p').text( message );
		$('#input_city').parent('div').children('p').addClass('active');
	}
	if( user_details.country_input == null ){
		open_door = false;
		let message = 'The country field is required.';
		$('#input_country').parent('div').parent('div').addClass('wrong');
		$('#input_country').parent('div').parent('div').children('p').text( message );
		$('#input_country').parent('div').parent('div').children('p').addClass('active');
	}

	if( open_door ){
		$.ajax({
			url : BASEURL + "payment-your-address/save_user_data",
			cache: false,
			type : 'POST',
			data : user_details,
			dataType : 'json',
			success : function(reponse){
				console.log( reponse );
			},
			error : function(resultat, statut, erreur){
				console.log( resultat, statut, erreur );
			}
		});
	}

}