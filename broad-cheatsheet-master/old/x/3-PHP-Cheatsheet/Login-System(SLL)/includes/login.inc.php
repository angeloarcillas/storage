<?php
session_start();

if (isset($_POST['submit'])) {
	//assign var
	include_once 'dbh.php';
	$uid = mysqli_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_escape_string($conn, $_POST['pwd']);

	if (empty($uid) || empty($pwd)) {
		//if no input go back
		header("location:../index.php");
		exit();
	}else{
		//if username/email match on db
$sql = "SELECT * FROM users WHERE u_uid = '$uid' OR u_email = '$uid'";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

	if ($resultCheck < 1) {
		//if input didnt match
		header("location:../index.php?login=error");
		exit();

}else{

	if ($row = mysqli_fetch_assoc($result)) {
		//dehash pwd
		$hashedPwdCheck = password_verify($pwd, $row['u_pwd']); //password_verify() -> php dehash

		if ($hashedPwdCheck == false) {
			//if pwd didnt match go back
			header("location:../index.php?login=errorPWD");
		exit();
		}

	elseif ($hashedPwdCheck == true) {
		//if pwd match add session then go next
		$_SESSION['id'] = $row['u_id'];
		$_SESSION['first'] = $row['u_first'];
		$_SESSION['last'] = $row['u_last'];
		$_SESSION['email'] = $row['u_email'];
		$_SESSION['uid'] = $row['u_uid'];

		header("location:../home.php?login=success");
		exit();
		}
	}
}

}

}else{
	//if user didnt click login go back
	header("location:../index.php?login=error");
	exit();
}
