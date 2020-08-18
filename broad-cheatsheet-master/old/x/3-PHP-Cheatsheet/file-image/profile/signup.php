<?php
include_once 'connection.php';
//pass value from signup form
$first = $_POST['first'];
$last = $_POST['last'];
$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

//insert data to user
$sql = "INSET INTO  user(first,last,username,password)
VALUES ($first, $last, $uid, $pwd)";
mysqli_query($conn, $sql);

//check if user has data
$sql = "SELECT * FROM user where username = '$uid' AND first = '$first'";
$result = mysqli_query($conn, $sql);

//check if $result has data
if (mysqli_num_rows($result) > 0) {
  //array $result data
while ($row = mysqli_fetch_assoc($result)) {
  //pass value from database
  $userid = $row['id'];
  //insert profileImg data
  $sql = "INSET INTO  profileImg(userid, status)
  VALUES ('$userid', 1)";
  mysqli_query($conn, $sql);
  //redirect back
  header("location: index.php");
  }
}
 ?>
