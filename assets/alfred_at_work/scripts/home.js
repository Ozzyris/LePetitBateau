function main_verification( type ){
	var open_gate = true,
		url,
		input_datas;

	switch(type){
		case 'title':
			if($( '#input_title' ).val() == ''){
				Internal_notification_center({ type: 'create', message: 'You cannot send a form with an empty field.', status: 'error', duration: 5000});
				open_gate = false;
			}else{
				url = BASEURL + "alfredatwork/home/title-content";
				input_datas = "title=" + $( '#input_title' ).val();
			}
			break;
		case 'description':
			if($( '#input_description' ).val() == ''){
				Internal_notification_center({ type: 'create', message: 'You cannot send a form with an empty field.', status: 'error', duration: 5000});
				open_gate = false;
			}else{
				url = BASEURL + "alfredatwork/home/description-content";
				input_datas = "description=" + $( '#input_description' ).val();
			}
			break;
		case 'phone':
			if($( '#input_phone' ).val() == ''){
				Internal_notification_center({ type: 'create', message: 'You cannot send a form with an empty field.', status: 'error', duration: 5000});
				open_gate = false;
			}else{
				url = BASEURL + "alfredatwork/home/phone-content";
				input_datas = "phone=" + $( '#input_phone' ).val();
			}
			break;
		case 'sale_email':
			if($( '#input_sale_email' ).val() == ''){
				Internal_notification_center({ type: 'create', message: 'You cannot send a form with an empty field.', status: 'error', duration: 5000});
				open_gate = false;
			}else if(($( '#input_sale_email' ).val().indexOf("@")==0)&&($( '#input_sale_email' ).val().indexOf(".")==0)){
				Internal_notification_center({ type: 'create', message: 'Invalid email format.', status: 'error', duration: 5000});
				open_gate = false;
			}else{
				url = BASEURL + "alfredatwork/home/sale-email-content";
				input_datas = "sale_email=" + $( '#input_sale_email' ).val();
			}
			break;
		case 'info_email':
			if($( '#input_info_email' ).val() == ''){
				Internal_notification_center({ type: 'create', message: 'You cannot send a form with an empty field.', status: 'error', duration: 5000});
				open_gate = false;
			}else if(($( '#input_info_email' ).val().indexOf("@")==0)&&($( '#input_info_email' ).val().indexOf(".")==0)){
				Internal_notification_center({ type: 'create', message: 'Invalid email format.', status: 'error', duration: 5000});
				open_gate = false;
			}else{
				url = BASEURL + "alfredatwork/home/info-email-content";
				input_datas = "info_email=" + $( '#input_info_email' ).val();
			}
			break;
		case 'tutorial':
			url = BASEURL + "alfredatwork/home/tutorial";
			$('#tutorials_container').remove();
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
				// console.log( reponse );
				var json_reponse = JSON.parse(reponse);
				Internal_notification_center({ type: 'create', message: json_reponse.message, status: json_reponse.status, duration: 2000});
      		},
       		error : function(resultat, statut, erreur){
       			// console.log( resultat, statut, erreur );
       			Internal_notification_center({ type: 'create', message: erreur, status: 'error', duration: 5000});
       		}
    	});
	}

}