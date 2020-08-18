
<?php
// database data
$db_servername = 'servername';
$db_username = 'username';
$db_password = 'password';
$db_name = 'database name';
// PDO CONNECT
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
