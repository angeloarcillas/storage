<?php
session_start();
include_once('connection.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>images-files</title>
</head>
<body>

  <?php
//select user datas
$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);
//check if user has data
if (mysqli_num_rows($result) > 0) {
  //array $result value
  while ($row = mysqli_fetch_assoc($result)) {
    //used for unique ID on prolie image name
    $id = $row['id'];
    //select profileImg
    $sqlImg = "SELECT * FROM ProfileImage WHERE userid = '$id'";
    $resultImg = mysqli_query($conn, $sqlImg);
    //check if $resultImg has a value
    while ($rowImg = mysqli_fetch_assoc($resultImg)) {
      echo "<div>";
        //if user uploaded a file
        if ($rowImg['status'] == 0) {

          $filename = "uploads/profile". $id . " * "; //-> " * " = search universal/any
          $fileinfo = glob($filename); //php function -> glob() => search specific file that has part of the name you are looking for
          $fileExt = explode(".",$fileinfo[0]); //-> remove extension ,$fileinfo[0] => get only array [0] value
          $fileActualExt = $fileExt[1]; //gets the file extension

          echo "<img src='uploads/profile" . $id . "." . $fileActualExt . "?".mt_rand() ."'>"; //-> mt_rand() => generates random number
        }else {
          echo "<img src='uploads/profileDefaultImg.jpg'>"; //-> default img
        }
        //echo user name
      echo $row['username'];
      echo "</div>";
    }
  }
}else {
  //if user has no data
  echo "No User Yet";
}

  //check if session id = has a value
  if (isset($_SESSION['id'])) {
    //check if session id = 1
      if ($_SESSION['id'] == 1) {
          echo "You are logged in!";
      }
      //echo upload form
      echo "<form  action='upload.php' method='post' enctype='multipart/form-data'>
        <input type='file' name='file' value=''>
        <button type='submit' name='save'>Upload</button>
      </form>";

      echo "<form  action='delete.php' method='post'>
        <button type='submit' name='save'>Delete ProfileImg</button>
      </form>";
  }else {
    //if no session
    //echo signup form
    echo "You are not logged in";
    echo "
      <form action='signup.php' method='post'>
        <h2>LOG IN</h2>
        <label>Name:</label>
      <input type='text' name='first'>
      <label>Family Name</label>
      <input type='text' name='last'>
      <label>Username</label>
      <input type='text' name='username'>
      <label>Password</label>
      <input type='text' name='password'>
        <button type='submit'>Sign Up</button>
      </form>";
  }
   ?>

  <!-- login logout-->
  <form class="" action="login.php" method="post">
    <h2>USER LOG IN</h2>
    <button type="submit" name="login">LogIn</button>
  </form>

  <form class="" action="logout.php" method="post">
    <h2>USER LOG OUT</h2>
    <button type="submit" name="logout">LogOut</button>
  </form>

</body>
</html>
