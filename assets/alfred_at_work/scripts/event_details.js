function main_verification( type ){
	var open_gate = true,
		url,
		open_picture_gate = true,
		formData = new FormData(),
		input_datas,
		id = $( '#input_id' ).val();

	switch(type){
		case 'name':
			open_picture_gate = false;
			if( $( '#input_name' ).val() == '' ){
				Internal_notification_center({ type: 'create', message: 'You cannot send a form with an empty field.', status: 'error', duration: 5000});
				open_gate = false;
			}else{
				url = BASEURL + "alfredatwork/event-details/name/" + id;
				input_datas = "name=" + encodeURIComponent( $( '#input_name' ).val() );
			}
			break;
			
		case 'date':
			open_picture_gate = false;
			if( $( '#input_date' ).val() == '' ){
				Internal_notification_center({ type: 'create', message: 'You cannot send a form with an empty field.', status: 'error', duration: 5000});
				open_gate = false;
			}else{
				url = BASEURL + "alfredatwork/event-details/date/" + id;
				input_datas = "date=" + encodeURIComponent( $( '#input_date' ).val() );
			}
			break;

		case 'description':
			open_picture_gate = false;
			if($( '#input_description' ).val() == ''){
				Internal_notification_center({ type: 'create', message: 'You cannot send a form with an empty field.', status: 'error', duration: 5000});
				open_gate = false;
			}else{
				url = BASEURL + "alfredatwork/event-details/description/" + id;
				input_datas = "description=" + encodeURIComponent( $( '#input_description' ).val() );
			}
			break;

		case 'address':
			open_picture_gate = false;
			url = BASEURL + "alfredatwork/event-details/address/" + id;
			input_datas = "address=" + encodeURIComponent( $( '#input_address' ).val() );
			break;

		case 'facebook':
			open_picture_gate = false;
			url = BASEURL + "alfredatwork/event-details/facebook/" + id;
			input_datas = "facebook=" + encodeURIComponent( $( '#input_facebook' ).val() );
			break;

		case 'eventbrit':
			open_picture_gate = false;
			url = BASEURL + "alfredatwork/event-details/eventbrit/" + id;
			input_datas = "eventbrit=" + encodeURIComponent( $( '#input_eventbrit' ).val() );
			break;

		case 'header_picture':
			open_gate = false;
			var file_upload = $('input#input_header')[0].files[0];
			formData.append('file', file_upload);
			url = BASEURL + "alfredatwork/event-details/header-picture/" + id;

			if( file_upload == undefined ){ 
				Internal_notification_center({ type: 'create', message: 'You cannot send a form with an empty field.', status: 'error', duration: 5000});
				open_picture_gate = false;
			}else{
				if( file_upload.size > 1048576 ){
					Internal_notification_center({ type: 'create', message: 'The file is too big.', status: 'error', duration: 5000});
					open_picture_gate = false;
					return false;
				}
				if( file_upload.type != 'image/jpeg' && file_upload.type != 'image/png' ){
					Internal_notification_center({ type: 'create', message: 'The file must be a image file (JPEG or PNG).', status: 'error', duration: 5000});
					open_picture_gate = false;
					return false;
				}
				if (typeof formData == 'undefined'){
					Internal_notification_center({ type: 'create', message: 'Your Browser Don\'t support FormData API! Use IE 10 or Above!', status: 'error', duration: 5000});
					open_picture_gate = false;
					return false;
				}
			}
			break;

		case 'thumbnail_picture':
			open_gate = false;
			var file_upload = $('input#input_thumbnail')[0].files[0];
			formData.append('file', file_upload);
			formData.append('name', file_upload.name);
			url = BASEURL + "alfredatwork/event-details/thumbnail-picture/" + id;

			if( file_upload == undefined ){ 
				Internal_notification_center({ type: 'create', message: 'You cannot send a form with an empty field.', status: 'error', duration: 5000});
				open_picture_gate = false;
			}else{
				if( file_upload.size > 1048576 ){
					Internal_notification_center({ type: 'create', message: 'The file is too big.', status: 'error', duration: 5000});
					open_picture_gate = false;
					return false;
				}
				if( file_upload.type != 'image/jpeg' && file_upload.type != 'image/png' ){
					Internal_notification_center({ type: 'create', message: 'The file must be a image file (JPEG or PNG).', status: 'error', duration: 5000});
					open_picture_gate = false;
					return false;
				}
				if (typeof formData == 'undefined'){
					Internal_notification_center({ type: 'create', message: 'Your Browser Don\'t support FormData API! Use IE 10 or Above!', status: 'error', duration: 5000});
					open_picture_gate = false;
					return false;
				}
			}
			break;

		default:
			break;

	}

	if( open_gate == true ){
		$.ajax({
			url : url,
			cache: false,
			type : 'POST',
			data : input_datas,
			dataType : 'html',
			success : function(reponse){
				console.log( reponse );
				var json_reponse = JSON.parse(reponse);
				Internal_notification_center({ type: 'create', message: json_reponse.message, status: json_reponse.status, duration: 2000});
			},
			error : function(resultat, statut, erreur){
				console.log( resultat, statut, erreur );
				Internal_notification_center({ type: 'create', message: erreur, status: 'error', duration: 5000});
			}
		});
	}

	if( open_picture_gate == true ){
		$.ajax({
			url : url,
			type : 'POST',
			data : formData,
			contentType: false,
			processData: false,
			success: function(reponse){
				console.log( reponse );
				var json_reponse = reponse;
				Internal_notification_center({ type: 'create', message: json_reponse.message, status: json_reponse.status, duration: 2000});
				if( json_reponse.status == 'success'){ location.reload(); }
			},
			error: function(resultat, statut, erreur) {
				console.log( resultat, statut, erreur );
				Internal_notification_center({ type: 'create', message: erreur, status: 'error', duration: 5000});
			}
		});
	}

}