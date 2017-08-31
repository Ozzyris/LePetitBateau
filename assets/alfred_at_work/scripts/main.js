// MENU SWITCH
function switch_menu(){
  if($('nav#left_navigation').hasClass('active')){
      $('section#toolbar a#hamburger_icon, nav#left_navigation').removeClass('active');
  }else{
      $('section#toolbar a#hamburger_icon, nav#left_navigation').addClass('active');
  }
}

// PAGE TITLE
function nice_title(){
  var hours = new Date().getHours();
  //Title
  if(hours < 5){      document.title=('Good night');} //Entre minuit et 5h 
  else if(hours < 10){document.title=('Good Morning');} // Entre 5h et 10h
  else if(hours < 12){document.title=('Enjoy your meal');} // Entre 10h et midi
  else if(hours < 16){document.title=('Good Afternoon');} // Entre midi et 4h
  else if(hours < 18){document.title=('Enjoy your Tea Time');} //Ent 4h et 6h
  else if(hours < 20){document.title=('Good Evening');} //Entre 6h et 8h
  else if(hours < 24){document.title=('Good Night');} //Entre 8h et minuit
}
nice_title();

var notifications = [];
// NOTIFICATION FACTORY
function Internal_notification_center( args ){
  var notification_template = '';
  switch( args.type ){
    case 'create':
      let timestamp = new Date().getTime(),
        new_notification = {
          id: 'notification_' + timestamp,
          status: args.status,
          message: args.message,
          time: timestampConverter(timestamp)
        };

        notification_template += '<div id="' + new_notification.id + '" class="notification">';
        notification_template += '  <span class="type ' + new_notification.status + '"></span>';
        notification_template += '  <span class="delete" onclick="Internal_notification_center({ type: \'delete\', id: \'' + new_notification.id + '\' });">X</span>';
        notification_template += '  <p class="date">' + new_notification.time + '</p>';
        notification_template += '  <p class="message">' + new_notification.message + '</p>';
        notification_template += '</div>';

        if( notifications.length == 0){
          $('body').append('<div id="notification_containter"></div>');
          $('div#notification_containter').append(notification_template);
          notifications.push( new_notification.id );
        }else{
          $('div#notification_containter').append(notification_template);
          notifications.push( new_notification.id );
        }
        let timeout = setTimeout(function(){
            Internal_notification_center({ type: 'delete', id: new_notification.id });
          }, args.duration);
      break;
    case 'delete':
      if( notifications.length == 1 ){
        $('div#' + args.id).remove();
        $('div#notification_containter').remove();
      }else{
        $('div#' + args.id).remove();
      }
      var index = notifications.indexOf( args.id );
      if (index > -1) { notifications.splice(index, 1); }
      break;
    default:
      break;
  }
}

function timestampConverter(timestamp) {
    var a = new Date(timestamp),
        year = a.getFullYear(),
        month = (a.getMonth() + 1),
        day = a.getDate(),
        hour = a.getHours(),
        min = a.getMinutes(),
        sec = a.getSeconds(),
        time = day + '/' + month + '/' + year + ' ' + hour + ':' + min + ':' + sec;
    return time;
}

// TOOLTYPE FACTORY
function tooltype_factory( type ){
  
  var gallery_html = '<form class="tooltype">';
      gallery_html += '  <h4>Add Artist</h4>';
      gallery_html += '  <input name="product_name" placeholder="Title" type="text">';
      gallery_html += '  <a onclick="verification_newproduct(); return false;" class="input_button success">Send</a>';
      gallery_html += '  <a class="input_button cancel">Cancel</a>';
      gallery_html += '</form>';

  var product_html = '<form class="tooltype">';
      product_html += '  <h4>Add Product</h4>';
      product_html += '  <input name="product_name" placeholder="Title" type="text">';
      product_html += '  <select id="collection_id">';
      product_html += '   <option value="1" checked>Film Category</option>';
      product_html += '   <option value="2">Plywood Category</option>';
      product_html += '  </select>';
      product_html += '  <a onclick="verification_newproduct(); return false;" class="input_button success">Send</a>';
      product_html += '  <a class="input_button cancel">Cancel</a>';
      product_html += '</form>';

  if( $('form.tooltype').length ){
    if( $('form.tooltype').hasClass('visible')){
      $('form.tooltype').hide();
      $('form.tooltype').removeClass('visible');
      $('a#floatting_button').removeClass('active');
    }else{
      $('form.tooltype').show();
      $('form.tooltype').addClass('visible');
      $('a#floatting_button').addClass('active');
    }
  }else{
    if( type == 'gallery' ){
      $('section#content').append( gallery_html );
    }else if( type == 'product' ){
      $('section#content').append( product_html );
    }
    
    $('form.tooltype').show();
    $('form.tooltype').addClass('visible');
    $('a#floatting_button').addClass('active');
  }
}

function alert_factory( args ){
  var alert_template= '';

  switch( args.type ){
    case 'create':
      let timestamp = new Date().getTime(),
          new_alert = {
            id: 'alert_' + timestamp,
            element_id: args.element_id,
            status: args.status,
            message: args.message,
            time: timestampConverter(timestamp)
      };
      alert_template = '<div class="alert">';
      alert_template += '  <div class="header ' + new_alert.status + '">';
      alert_template += '    <h5>Warning Dagerous Actions Requested</h5>';
      alert_template += '  </div>';
      alert_template += '  <div class="body">';
      alert_template += '    <img>';
      alert_template += '    <p>' + args.message + '</p>';
      alert_template += '    <div class="button_container">';
      alert_template += '     <a href="#" onclick="delete_element({ element_id: \'' + args.element_id + '\', alert_id: \'' + new_alert.id + '\' });" class="button red">Delete</a>';
      alert_template += '     <a href="#" onclick="alert_factory({type: \'delete\', id: \'' + new_alert.id + '\'});" class="button ghost_red">Cancel</a>';
      alert_template += '   </div>';
      alert_template += '  </div>';
      alert_template += '</div>';
      alert_template += '<div onclick="alert_factory({type: \'delete\', id: \'' + new_alert.id + '\'});" class="modal_darkfilter"></div>';

      $('body').append('<div class="alert_containter" id="' + new_alert.id + '"></div>');
      $('#' + new_alert.id).append( alert_template );
      break;
    case 'delete':
      $('#' + args.id).remove();
      break;
    default:
      break;
  }
}

// INPUT FILE RESULT
$('input[type=file]').change(function() {
  var file = this.files;
  var user_feedback = $(this).parent();
  if (file.length > 1) {
    Internal_notification_center( 'Sorry, multiple files are not allowed' , 'error', 5000);
    return;
  }

  user_feedback.addClass('active');
  user_feedback.children('p').text( file[0].name.substring(0, 40) );
  user_feedback.append( '<span class="details">File Type: ' + file[0].type + ' | File Size: ' + Math.ceil((file[0].size / 1024)/1000) + ' Mb</span>' );
});

function higlight_multiselec( event ){
  if($(event.target).parent('li').hasClass('active')){
    $(event.target).parent('li').removeClass('active');
  }else{
    $(event.target).parent('li').addClass('active');
  }
}

