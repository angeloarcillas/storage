<?php
if (isset($_POST['submit'])) {
	include_once 'dbh.php';

	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

//if user didnt input any
if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd) ) {
	header("location: ../signup.php?signup=empty");
	exit();

}else{
	//if user used special char or used the right char
	//check regular expression folder
	if (!preg_match("/^[a-zA-Z0-1]*$/", $first) || !preg_match("/^[a-zA-Z0-1]*$/", $last)) {
	header("location: ../signup.php?signup=errorText");
	exit();

	}else{
		//validate email if valid
		//filter_var($email, FILTER_VALIDATE_EMAIL) -> validate email
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("location: ../signup.php?signup=errorEmail");
		exit();

		}else{

		$sql = "SELECT * FROM users WHERE u_uid = '$uid'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		//check if username already taken then return
if ($resultCheck > 0) {
	header("location: ../signup.php?signup=userTaken");
	exit();

}else{
//hash pwd for security
	$hashpwd = password_hash($pwd, PASSWORD_DEFAULT); //password_hash($pwd, PASSWORD_DEFAULT) -> hash pwd
//sql insert data
	$sql = "INSERT INTO users (u_first, u_last, u_email, u_uid, u_pwd) VALUES ('$first','$last','$email','$uid','$hashpwd');";
	mysqli_query($conn, $sql);

	header("location: ../index.php?signup=Success");
	exit();

				}
			}
		}
	}
}else{
	//if user didnt click sign up
	header("location:../signup.php");
	exit();
}
