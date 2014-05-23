<?php
include "./DB.php";
class Authentication{
  private static $table       = "users";
  private static $col_id      = "id";
  private static $col_session = "session";
  private static $col_created = "created";
  private static $days_to_exp = 30;
  
  private static $table_sessions = 'user_sessions';
  private static $col_user_id = 'user_id';
  private static $col_session = 'session';
  private static $col_created = 'created';
  
  private static $cookie_name = "auth_cookie";
  
  /**
   * Logs a user in, setting their session kay in the database and cookie.
   */
  public static function login($uid){
    $key = self::generateKey();
    
    $query = "insert into ".self::$table_sessions." ("
             .self::$col_user_id.', '
             .self::$col_session.') values (:user_id,:session_key)';
    $pdo_stmt = DB::getDBH()->prepare($query);
    $pdo_stmt.bindParam(':user_id',$uid);
    $pdo_stmt.bindParam('session_key',$key);
    $pdo_stmt->execute();
    
    $cookieVal = $uid.'|'.$key;
    setcookie(self::$cookie_name,$cookieVal,time()*86400*self::$days_to_exp);
    return $cookieVal;
  }
  /**
   * This function generates a random number, currently being used to 
   * store a session key.
   */
  public static function generateKey(){
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
