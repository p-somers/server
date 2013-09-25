<?php
  function echoFile($filename) {
    $valid_files=array(
      'html/main.html',
      'html/about.html',
      'html/stuff.html',
      'html/contact.html'
    );
    if( in_array($filename,$valid_files) ) {
      $file = file_get_contents('../'.$filename);
      echo $file;
    } else
      echo "Could not find target: ".$filename;
  }
  if( isset($_POST['target']) ) {
    $filename = filter_input(INPUT_POST, 'target',FILTER_SANITIZE_STRING);
    echoFile($filename);
  }
?>