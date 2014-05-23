/**
 * These functions are for handling user sessions.
 * Note: this is a work in progress and in very early stages.
 */
function showLogin(){
  $('#login_dialog').dialog('open');
}

function login(){
  var username = $('#username').val();
  var password = $('#password').val();
  console.log(username+', '+password);
}
function onUnload(){
  console.log('ending session');
  var text = "blah";
  var parameters={
    type : 'post',
    url : './Session.php',
    data : {method:'end_session'},
    context : this,
    complete : function(res){console.log(res);this.text=res.responseText;},
    async: false
  }
  text=$.ajax(parameters).responseText;
  return text;
}
