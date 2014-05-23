<?php
  /**
   * This is a file that is accessed from a ajax call, and returns the contents of a given file
   * IF the file is in the list of approved files. This is primarily used for dynamic page loading.
   */
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
