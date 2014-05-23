<?php
//Used by other classes to get the database, like so: PDO $db = DB::getDBH()
class DB{
  private static $host     = "127.0.01";
  private static $user     = "root";
  private static $database = "data";
  private static $dbh=null;
  public static function getDBH() {
    if (!self::$dbh) {
      include "./hidden/DBPassword.php";//Don't want the internet knowing my passwords...
      self::$dbh = new PDO('mysql:dbname='.self::$database.';host='.self::$host, self::$user, DBPassword::getPassword());
      self::$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);//Use "real" prepared statements
      self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return self::$dbh;
  }
}
?>
