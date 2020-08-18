<?php

require_once '../acct.dbh.php';
require_once '../controls/server.class.php';


	// verify account
if (isset($_GET['token'])) {
	$userToken = $_GET['token'];
	$userEmail = $_GET['email'];
	
	$object = new Account($DB_conn);
	$object->verifyToken($userToken,$userEmail);
	
	}
	// if (isset($_POST['del'])) {
	// 	$object = new Account($DB_conn);

	// 	$id = $_POST['id'];

	// 	$object->delete($id);
	// }

	// login account
if (isset($_POST['login'])) {
	
	$object = new Account($DB_conn);

	$userName = $_POST['uName'];
	$userPassword = $_POST['uPwd'];

	// $object->login($_POST['uName'],$_POST['uPwd']);
	$object->login($userName,$userPassword);
	
	//register account
}elseif (isset($_POST['register'])) {
	$object = new Account($DB_conn);

	// setters
	$object->setFirstName($_POST['fName']);
	$object->setLastName($_POST['lName']);
	$object->setUserName($_POST['uName']);

	// validate email
	$user_Email = $_POST['uEmail'];
	if (!filter_var($user_Email, FILTER_VALIDATE_EMAIL)) {
		echo "invalid email";
	}else{
		$object->setEmail($user_Email);
	}
	// check if password and re-password match
	// use javascript much better
	if ($_POST['uPwd'] != $_POST['reuPwd']) {
		header('location:../index.php?password+doesnt+match');
	}elseif ($_POST['uPwd'] == $_POST['reuPwd']) {

		$object->setPassword($_POST['uPwd']);
		$object->regAcct();
	}else {
		 header('location:../index.php?error2');
	}
}
	// forgot password
elseif (isset($_POST['forgot'])) {
	$object = new Account($DB_conn);

	$userEmail = $_POST['uEmail'];

	if (!filter_var($user_Email, FILTER_VALIDATE_EMAIL)) {
			echo "invalid email";
		}elseif (filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
			$object->checkEmail($userEmail);
		}	
	
	
}else {
	header('location:../index.php?error');
}

?>