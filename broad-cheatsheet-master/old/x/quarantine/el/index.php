<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

$_SESSION['acct_type'] = 'pos3';
$_SESSION['acct_auth'] = true;

if ($_SESSION['acct_type'] == 'pos1') {
  header('location:view/welcome.php?pos1');

}elseif ($_SESSION['acct_type'] == 'pos3') {
  header('location:view/welcome.php?pos3');

}else {
  header('location:view/welcome.php');
}