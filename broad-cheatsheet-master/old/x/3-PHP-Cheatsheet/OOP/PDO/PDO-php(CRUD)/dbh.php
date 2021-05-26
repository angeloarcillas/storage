<?php
//PDO CONNECTION
$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "learn_pdo_oop";

try
{
     $DB_conn = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
     $DB_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
     echo $e->getMessage();
}



/*
 class Dbh
 {

 	private $servername;
 	private $username;
 	private $password;
 	private $dbname;
 	private $charset;

 	public function connect(){
 		$this->servername = "localhost";
 		$this->username = "root";
 		$this->password = "";
 		$this->dbname = "test";
 		$this->charset = "utf8mb4";

 		try {

	$conn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
	$pdo = new PDO($conn,$this->username,$this->password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	return $pdo;

 		} catch (PDOException $e) {
 			echo "Connection Failed:" . $e->getMessage();
 		}
 	}
 }
 */
  ?>
