<?php

require_once '../model/connection.php';
require_once '../control/update-control.php';

$update_object = new Update($db_conn);

/////////////GET USERS///////////////
if (!isset($_GET['edit'])) {
$update_object->GetRegUsers();
}
/////////////UPDATE USER////////////
if (isset($_POST['update'])) {
  $register_id = $_POST['register_id'];
  $register_firstName = $_POST['register_firstName'];
  $register_lastName = $_POST['register_lastName'];
  $register_email = $_POST['register_email'];
  $register_age = $_POST['register_age'];
  $register_address = $_POST['register_address'];
  $register_contact = $_POST['register_contact'];
  $register_course = $_POST['register_course'];
  $register_employment = $_POST['register_employment'];
  $register_status = $_POST['register_status'];
  $bday_month=$_POST['reg_month'];
  $bday_day=$_POST['reg_day'];
  $bday_year=$_POST['reg_year'];
  $bday=$bday_month.'-'.$bday_day.'-'.$bday_year;

  $update_object->Update($register_id,$register_firstName,$register_lastName,$register_email,$register_age,$bday,$register_address,$register_contact,$register_course,$register_employment,$register_status);
}
////////////GET USER TO UPDATE/////////////////
  if (isset($_GET['edit'])) {
    $reg_id = $_GET['edit'];
$update_object->GetToUpdate($reg_id);
  }
?>
