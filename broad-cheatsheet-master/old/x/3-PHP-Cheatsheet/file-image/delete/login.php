<?php
//give session id a value
session_start();
if (isset($_POST['login'])) {
$_SESSION['id'] = 1;
header('location:index.php?loggedIn');
}

 ?>
