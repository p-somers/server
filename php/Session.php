<?php
/**
 * A work in very early progress
 */
$f = filter_input(INPUT_POST, 'method');
function start_session(){
  session_start();
  //include code keeping track of views
}
function end_session(){
  session_destroy();
  error_log( "done",3,"/var/www/errors.log");
  echo "1";
  return "2";
}
echo $f."-";
die();
?>
