function send_recovery_email(){
  var open_gate = true;
  var email = $('input#revovery_email').val();
  if( email == ''){
    open_gate=false;
    $('input#revovery_email').addClass('wrong');
    Internal_notification_center({ type: 'create', message: 'The email adress you enter is incorect', status: 'error', duration: 5000});  
  }
  if( (email.indexOf("@")<=0) || (email.indexOf(".")<=0) ){
    open_gate=false;
    $('input#revovery_email').addClass('wrong');
    Internal_notification_center({ type: 'create', message: 'The email adress you enter is incorect', status: 'error', duration: 5000});
  }
	
  if(open_gate){
    var input_datas = "email="+ email;
    $('section#forgot_password div#from_container a.input_button.blue').css('background-color', '#cccccc');
    $('section#forgot_password div#from_container a.input_button.blue').text('Waiting ...');
    
    $.ajax({
      url : BASEURL + "alfredatwork/forgot-password/recovery-email",
      cache: false,
      type : 'POST',
      data : input_datas,
      dataType : 'html',
      success : function( reponse ){
        console.log( reponse );
        var json_reponse = JSON.parse(reponse);
        Internal_notification_center({ type: 'create', message: json_reponse.message, status: json_reponse.status, duration: 10000});
        $('section#forgot_password div#from_container a.input_button.blue').css('background-color', 'rgb(95, 170, 239)');
        $('section#forgot_password div#from_container a.input_button.blue').text('Send recovery email');
      },
      error : function(resultat, statut, erreur){
        console.log(resultat, statut, erreur);
        Internal_notification_center({ type: 'create', message: erreur, status: 'error', duration: 5000});
        $('section#forgot_password div#from_container a.input_button.blue').css('background-color', 'rgb(95, 170, 239)');
        $('section#forgot_password div#from_container a.input_button.blue').text('Send recovery email');
      }
    });
  }
}

