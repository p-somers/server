<?php
class UserTable {
  private static $dbh      = null;
  private static $host     = "127.0.01";
  private static $user     = "root";
  private static $database = "data";
  
  private static $table       = "users";
  private static $col_id      = "id";
  private static $col_session = "session";
  private static $col_created = "created";
  private static $days_to_exp = 30;
  
  private static $auth = "PersistantAuth";
  
  public function allUsers() {
    try {
      $query = "select * from ".self::$table;
      $stmt  = UserTable::getDBH()->prepare($query);
      $stmt->execute();
      $users = array();
      foreach($stmt as $row) {
        $user = array();
        $user['name']=$row['name'];
        $user['id']=$row['id'];
        array_push($users,$user);
      }
      return $users;
    } catch( PDOException $e ) {
      return $e.getMessage();
    }
  }
  public function addUser($username,$password) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query    = "insert into ".self::$table." (name,password) values (:name,:password)";
    $stmt     = UserTable::getDBH()->prepare($query);
    $stmt->bindParam(':name',$username);
    $stmt->bindParam(':password',$password);
    return $stmt->execute();
  }
  public function login($uid){
    
  }
	public static function getDBH() {
		if (!self::$dbh) {
      include "./hidden/DBPassword.php";
			self::$dbh = new PDO('mysql:dbname='.self::$database.';host='.self::$host, self::$user, DBPassword::getPassword());
      self::$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);//Use "real" prepared statements
      self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
		return self::$dbh;
	}
	public static function generateId(){
    $fp = @fopen('/dev/urandom','rb');
    $pr_bits = '';
    if ($fp !== FALSE) {
        $pr_bits .= @fread($fp,128);
        echo "-- ".base64_encode($pr_bits)." --";
        @fclose($fp);
    }
    if (strlen($pr_bits) < 128) {
      return -1;
    }
    return $pr_bits;
  }
}
?>