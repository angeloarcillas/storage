<?php
session_start();
//connect db
include 'connection.php';
//create var
$id = " ";
$uName = " ";
$uEmail = " ";

/*
LOGIN
*/

if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($db, $_POST['uId']);
  $password = mysqli_real_escape_string($db, $_POST['uPwd']);

  //check if user/pass is empty
  //or make it required
  if(empty($_POST['uId']) || empty($_POST['uPwd'])){
      $_SESSION['message'] = "Username or Password is Empty";
      header("Location: login.php?empty");
  }
  else
  {
  $sql = "SELECT * FROM users WHERE username = '$username' AND userPwd = '$password';";
  $query = mysqli_query($db,$sql);
  $rows = mysqli_num_rows($query);
  //check if success
  if($rows == 1){
    header("Location: view.php?success!"); // Redirecting to other page
    //change session logInstatus = true
          $_SESSION['LogInStatus'] = true;
  }
  else{
      $_SESSION['message'] = "Username or Password is Invalid";
      header("Location: login.php?error!");

  }
}
}

/*
  CREATE
  */

if (isset($_POST['save'])) {
//bind data w/ prepared statement
$name = mysqli_real_escape_string($db, $_POST['uName']);
$email = mysqli_real_escape_string($db, $_POST['uMail']);

//prepare statement sql
$sql = "INSERT INTO scholar (userName, userEmail, userAddress, userContact, userCourse, userEmployment,userStatus) VALUES (?, ?);";
$stmt = mysqli_stmt_init($db);
//check if stmt has error
if(!mysqli_stmt_prepare($stmt,$sql))
{
echo "error";
}
else
{
//bind parameter then execute stmt
mysqli_stmt_bind_param($stmt,"ss",$name,$email);
mysqli_stmt_execute($stmt);

//message
  $_SESSION['message'] = "Success!";
//redirect to index.php
header('location: index.php?success');
}
}

/*
DELETE
*/
if (isset($_GET['del'])) {
	$id = $_GET['del']; //->url del=**
  //sql delete data
	mysqli_query($db, "DELETE FROM scholar WHERE userID = $id");
	$_SESSION['message'] = "Deleted!";
	header('location: controls.php');
}

  /*
  UPDATE
  */

  if (isset ($_POST['update']))
   {
    $id =  $_POST['uID'];
    $name =  $_POST['uName'];
    $email = $_POST['uMail'];

    mysqli_query($db,"UPDATE scholar SET userName='$name',userEmail='$email' WHERE userID = '$id'");

      //message
        $_SESSION['message'] = "Success!";
    //redirect to index.php
    header('location: controls.php?success');
    }

/*
  VIEW

*/

$result = mysqli_query($db,"SELECT * FROM scholar");


/*
filter and search for view

this is for 2 or more filter/search
*/
if(isset($_POST['search']))
{
	//search
    $iv = $_POST['inputValue'];
    // search in all table columns
    $query = "SELECT * FROM scholar WHERE CONCAT(`userID`,`userName`) LIKE '%".$iv."%' ORDER BY userName ASC";
    $result = filterTable($query);
		$_SESSION['message'] = "Search Complete";

}elseif (isset($_POST['searchControls'])) {
  //search
    $iv = $_POST['inputValue'];
    // search in all table columns
    $query = "SELECT * FROM scholar WHERE CONCAT(`userID`,`userName`) LIKE '%".$iv."%' ORDER BY userEmail ASC";
    $result = filterTable($query);
    $_SESSION['message'] = "Search Complete";
}
 else {
	 //filter
    $query = "SELECT * FROM scholar ";
    $result = filterTable($query);

}

// function to connect and execute the query
function filterTable($query)
{
    $db = mysqli_connect("localhost","id5857477_elearn", "developer", "id5857477_elearn");
    $filterResult = mysqli_query($db, $query);
    return $filterResult;
}

 ?>
