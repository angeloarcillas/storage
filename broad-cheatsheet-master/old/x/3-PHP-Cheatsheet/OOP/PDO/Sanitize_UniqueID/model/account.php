<?php
include_once 'connection.php';
include_once '../controls/server.php';

$object = new Accounts($db_conn);

if (isset($_POST['save'])) {
  $name = $_POST['name'];
  $id = $object->generateAccountID();
  echo $id;
$object->setName($name);
}
 ?>
