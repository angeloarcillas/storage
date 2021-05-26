<?php
require 'dbh.php';
include_once 'server.php';
//create object
$object = new Users($DB_conn);

if (isset($_POST['save'])) {

  $user_name = $_POST['uName'];
  $user_email = $_POST['uMail'];
  $user_password = $_POST['uPwd'];
//execute class function add
  $object->add($user_name,$user_email,$user_password);

}
if (isset($_POST['del'])) {

  $user_id = $_POST['uID'];
//execute class function remove
  $object->remove($user_id);
}

if (isset($_POST['update'])) {
$user_id = $_POST['uID'];
  $user_name = $_POST['uName'];
  $user_email = $_POST['uMail'];
  $user_password = $_POST['uPwd'];
//execute class function update
  $object->update($user_id,$user_name,$user_email,$user_password);
}
 ?>
