<?php
class UserTable {
  private static $dbh = null;
  private static $host = "127.0.01";
  private static $user = "root";
  private static $database = "data";
  private static $table = "users";
  public function allUsers() {
    try {
      $dbh = getDBH();
      $dbh->prepare(
    } catch( PDOException $e ) {
      return $e.getMessage();
    }
  }
  public function addUser($username,$password) {
    
  }
	public static function getDBH() {
		if (!self::$dbh) {
      include "./DBPassword.php";
			self::$dbh = new PDOX('mysql:dbname='.self::$database.';host='.$host, self::$root, DBPassword::getPassword());
      $dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);//Use "real" prepared statements
      $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
		return self::$dbh;
	}
}
?>