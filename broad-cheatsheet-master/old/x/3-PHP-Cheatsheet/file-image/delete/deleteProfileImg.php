<?php

session_start();
include_once 'connection.php';

$id = $_SESSION['id'];

$filename = "uploads/profile". $id . " * "; //-> " * " = search universal/any
$fileinfo = glob($filename); //php function -> glob() => search specific file that has part of the name you are looking for
$fileExt = explode(".",$fileinfo[0]); //-> remove extension ,$fileinfo[0] => get only array [0] value
$fileActualExt = $fileExt[1]; //gets file extension

$file = "uploads/profile" . $id .".".$fileActualExt; //gets file to delete

//check if file has value to delete
if (!unlink($file)) { //php function -> unlink() => delete file
  echo "didnt delete";
}else {
  echo "File Deleted";
}
//update status to default
$sql = "UPDATE profileImg SET status = 1 WHERE userid = '$id';";
mysqli_query($conn, $sql);

header("location: index.php?deleted");
 ?>
