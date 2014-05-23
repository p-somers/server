<?php
/**
 * A system for managing the user database
 * Still in very early stages
 */
include("./DB.php");
class UserTable {
  private static $table    = "users";
  private static $col_id   = "id";
  private static $col_name = "name";
  
  public function getUserId($name){
    $query = "select id from ".self::$table.
             " where ".self::$col_name." = :name";
    $stmt  = DB::getDBH()->prepare($query);
    $stmt->bindParam(':name',$name);
    $id = -1;
    if( $stmt->execute() )
      foreach($stmt as $row)
        $id = $row[self::$col_id];
    return intval($id);
  }
  public function allUsers() {
    try {
      $query = "select * from ".self::$table;
      $stmt  = DB::getDBH()->prepare($query);
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
    $stmt     = DB::getDBH()->prepare($query);
    $stmt->bindParam(':name',$username);
    $stmt->bindParam(':password',$password);
    return $stmt->execute();
  }
  public function login($uid){
    
  }
}
?>
