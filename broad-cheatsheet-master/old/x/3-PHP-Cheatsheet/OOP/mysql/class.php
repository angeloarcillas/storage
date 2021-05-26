<?php
/**
 *database connection php using OOP
 */
class connection {
  //initialize var
  private $serverName;
  private $user;
  private $pass;
  private $dbName;

  //function for connect
  protected function connect(){

    //initialize var
    $this -> serverName = "localhost";
    $this -> user = "root";
    $this -> pass = "";
    $this -> dbName = "test";

    //connect db
    $conn = new mysqli($this -> serverName, $this -> user, $this -> pass, $this -> dbName);
    
    //return connection
    return $conn;
  }
}
 ?>
