function switch_status( event, id ){
    $.ajax({
        url : BASEURL + "alfredatwork/gallery/switch-status/" + id,
        cache: false,
        type : 'POST',
        dataType : 'html',
        success : function(reponse){
            // console.log(reponse);
            var json_reponse = JSON.parse(reponse);
            Internal_notification_center({ type: 'create', message: json_reponse.message, status: json_reponse.status, duration: 2000});
      
            if($(event.target).hasClass('active')){
                $(event.target).removeClass('active');
                $(event.target).parent('div.switch_container').parent('div.body').parent('article.object').addClass('archive');
                $(event.target).parent('div.switch_container').parent('div.body').parent('article.object').children('div.header').children('div.action').children('a.cancel').removeClass('hidden');
            }else{
                $(event.target).addClass('active');
                $(event.target).parent('div.switch_container').parent('div.body').parent('article.object').removeClass('archive');
                $(event.target).parent('div.switch_container').parent('div.body').parent('article.object').children('div.header').children('div.action').children('a.cancel').addClass('hidden');
            }
        },
        error : function(resultat, statut, erreur){
            // console.log(resultat, statut, erreur);
            Internal_notification_center({ type: 'create', message: erreur, status: 'error', duration: 5000});
        }
    });
}

function verification_newproduct(){
	var value = $('form.tooltype input').val();
	if( value != '' ){
          $.ajax({
                url : BASEURL + "alfredatwork/gallery/insert",
                cache: false,
                type : 'POST',
                data : "name="+ value,
                dataType : 'html',
                success : function(reponse){
                    location.reload();
                },
                error : function(resultat, statut, erreur){
                    Internal_notification_center({ type: 'create', message: erreur, status: 'error', duration: 5000});
                }
            });
	}else{
        Internal_notification_center({ type: 'create', message: 'You cannot send a form with an empty field.', status: 'error', duration: 5000});
	}
}

function delete_element( args ){
    $.ajax({
        url : BASEURL + "alfredatwork/gallery/delete/" + args.element_id,
        cache: false,
        type : 'POST',
        dataType : 'html',
        success : function(reponse){
            console.log( reponse );
            var json_reponse = JSON.parse(reponse);
            Internal_notification_center({ type: 'create', message: json_reponse.message, status: json_reponse.status, duration: 2000});
            alert_factory({type: 'delete', id: args.alert_id});
            $( 'article#artist_' + args.element_id ).remove();
        },
        error : function(resultat, statut, erreur){
            console.log( resultat, statut, erreur );
            Internal_notification_center({ type: 'create', message: erreur, status: 'error', duration: 5000});
            alert_factory({type: 'delete', id: args.alert_id});
        }
    });
}