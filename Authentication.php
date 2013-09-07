<?php
include "./DB.php";
class Authentication{
  private static $table       = "users";
  private static $col_id      = "id";
  private static $col_session = "session";
  private static $col_created = "created";
  private static $days_to_exp = 30;
  
  private static $auth = "Auth";
  public static function login($uid){
    $cookieVal = $uid.'|'.self::generateId();
    return $cookieVal;
  }
  public static function generateId(){
    $fp = @fopen('/dev/urandom','rb');
    $pr_bits = '';
    if ($fp !== FALSE) {
        $pr_bits .= @fread($fp,128);
        @fclose($fp);
    }
    if (strlen($pr_bits) < 128) {
      return -1;
    }
    return base64_encode($pr_bits);
  }
}
?>