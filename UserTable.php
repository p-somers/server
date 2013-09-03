<?php
class UserTable {
	private static $dbh = null;
  private static $host = "127.0.01";
  private static $user = "root";
  private static $password = "veryunoriginalpassword";
  private static $database = "data";
  private static $table = "users";
  public function allUsers() {
    try {
      mysql_connect(self::$host,self::$user,self::$password);
      mysql_select_db(self::$database);
      $result = mysql_query("select * from ".self::$table);
      if(!$result)
        die('Invalid query: ' . mysql_error());
      $arr = array();
      foreach(mysql_fetch_object($result) as $key => $val) {
        $arr[$key]=$val;
      }
      mysql_free_result($result);
      mysql_close();
      return $arr;
    } catch( Exception $e ) {
      return $e.getMessage();
    }
  }
  public function addUser($username,$password) {
    
  }
	public static function getDBH() {
		if (!self::$dbh)	
			self::$dbh = new PDOX('mysql:dbname='.self::$database.';host='.$host, self::$root, self::$password);
		return self::$dbh;
	}
}
?>