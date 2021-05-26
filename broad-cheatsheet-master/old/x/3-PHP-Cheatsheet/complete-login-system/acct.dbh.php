<?php
//PDO CONNECTION
$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "account";

try
{
     $DB_conn = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
     $DB_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
     echo $e->getMessage();
}
?>