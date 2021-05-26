<?php
require_once '../model/connection.php';
require_once '../control/delete-control.php';

$delete_object = new Delete($db_conn);
///////////GET METHOD TO DELETE///////////////
if (isset($_GET['del'])) {
  // get user id
  $register_id = $_GET['del'];
  // delete user
  $delete_object->Delete($register_id);
}

///////////POST METHOD TO DELETE///////////////
if (isset($_POST['del'])) {
  // set user id
  $register_id = $_POST['reg_id'];
// delete user
  $delete_object->Delete($register_id);
}
//////////GET USER to DELETE///////////////
$delete_object->GetRegUsers();

 ?>
