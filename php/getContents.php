<?php
  function echoFile($filename) {
    $vaild_files=array(
      'main.html',
      'about.html',
      'stuff.html',
      'contact.html'
    );
    $file = file_get_contents($filename);
    echo $file;
  }
  if( isset($_POST['target']) ) {
    $filename = filter_input(INPUT_POST, 'target');
    echoFile($filename);
  }
?>