function archive_system_data( event, id ){
  $.ajax({
    url : BASEURL + "alfredatwork/dashboard/archive_system_data/" + id,
    cache: false,
    type : 'POST',
    dataType : 'html',
    success : function( reponse ){
      var json_reponse = JSON.parse(reponse);
      Internal_notification_center({ type: 'create', message: json_reponse.message, status: json_reponse.status, duration: 2000});
      $(event.target).parent('li').addClass('archive');
    },
    error : function(resultat, statut, erreur){
      Internal_notification_center({ type: 'create', message: erreur, status: 'error', duration: 5000});
    }
  });
}

function archivemailchimp( event, email){
  var input_datas = "email=" + email;
  $.ajax({
    url : BASEURL + "alfredatwork/dashboard/archive_mailchimp",
    cache: false,
    type : 'POST',
    data : input_datas,
    dataType : 'html',
    success : function(data){
      Internal_notification_center( data , 'success', 2000);
      $(event.target).parent('td').parent('tr').remove();
    },
    error : function(resultat, statut, erreur){
      Internal_notification_center( erreur , 'error', 5000);
    }
  });
}