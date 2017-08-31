function main_verification( type ){
  var open_gate = true,
  url,
  input_datas;

  switch(type){
    case 'name':
      url = BASEURL + "alfredatwork/profile/name-content";
      if( $( '#input_first_name' ).val() == '' || $( '#input_last_name' ).val() == '' ){
        Internal_notification_center({ type: 'create', message: 'You cannot send a form with an empty field.', status: 'error', duration: 5000});
        open_gate = false;
      }else{
        input_datas = "first_name=" + $( '#input_first_name' ).val() + "&last_name=" + $('#input_last_name').val();
      }
      break;
      
    case 'email':
      url = BASEURL + "alfredatwork/profile/email-content";
      if( $( '#input_email' ).val() == '' ){
        Internal_notification_center({ type: 'create', message: 'You cannot send a form with an empty field.', status: 'error', duration: 5000});
        open_gate = false;
      }else{
        input_datas = "email=" + $( '#input_email' ).val();
      }
      break;
      
    case 'reset_password':
      url = BASEURL + "alfredatwork/profile/reset-password";
      break;
      
    case 'reset_tutorial':
      url = BASEURL + "alfredatwork/profile/reset-tutorial";
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
