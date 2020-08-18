<?php
include 'server.php';
//Prepared statements
//var
$data = "admin";
//query
$sql = "SELECT * FROM users WHERE userName=?;";
//create a prepared statement
$stmt = mysqli_stmt_init($db);
//prepare the prepared statement
if (!mysqli_stmt_prepare($stmt,$sql))
{
  echo "SQL statement failed";

}else {
  //bind paramenters to the placeholder
  /*"s" = s=string i=intiger b=blob d=double
    */
  mysqli_stmt_bind_param($stmt, "s", $data);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  while ($row = mysqli_fetch_assoc($result)) {
    echo $row['userName']."<br>";
  }
}

 ?>
