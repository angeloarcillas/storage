<?php
$db_servername = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'learn_php';

try
{
    $db_conn = new PDO("mysql:host={$db_servername};dbname={$db_name};charset=utf8", $db_username, $db_password);
    $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo $e->getMessage();
}



 ?>
