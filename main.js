function showLogin(){
  $('#login_dialog').dialog('open');
}

function login(){
  var username = $('#username').val();
  var password = $('#password').val();
  console.log(username+', '+password);
}