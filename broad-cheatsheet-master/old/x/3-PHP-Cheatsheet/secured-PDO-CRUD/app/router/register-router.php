<?php
// check for session
if(!isset($_SESSION))
{
    session_start();
}
// require this resource
require_once '../model/connection.php';
require_once '../control/register-control.php';

// create object
$register_object = new Register($db_conn);

if (isset($_POST['register'])) {
  // check error
  $error = false;

//////////////////ERROR HANDLING///////////////////////////
    // if both first and last name are empty
  if (empty($_POST['register_firstName']) || empty($_POST['register_lastName'])) {
    $error = true;
    $_SESSION['message'] = 'First name or Last name is empty';
    header('location:../admin/index.php?error');
    // if first and last name has special characters
  }elseif (!preg_match("/^[a-zA-Z ]*$/",$_POST['register_firstName']) || !preg_match("/^[a-zA-Z ]*$/",$_POST['register_lastName'])) {
    $error = true;
    $_SESSION['message'] = 'First name or Last name has invalid characters, please use letters only';
    header('location:../admin/index.php?error');

    // if email is correct and doesnt have special character
  }elseif (!filter_var($_POST['register_email'], FILTER_VALIDATE_EMAIL) || !preg_match('/^[a-zA-Z0-9@.]*$/',$_POST['register_email'])) {
    $error = true;
    $_SESSION['message'] = 'Invalid Email';
    header('location:../admin/index.php?error');

    // if age doesnt have invalid characters
  }elseif (!preg_match('/^[0-9]*$/',$_POST['register_age'])) {
    $error = true;
    $_SESSION['message'] = "invalid age";
    header('location:../admin/index.php?error');

    // if address doesnt have invalid characters
  }elseif (!preg_match('/^[a-zA-Z0-9 ]*$/',$_POST['register_address'])) {
    $error = true;
    $_SESSION['message'] = 'invalid address, don`t use special character';
    header('location:../admin/index.php?error');

    // if contact doesnt have invalid characters
  }elseif (!preg_match('/^[0-9]*$/',$_POST['register_contact'])) {
    $error = true;
    $_SESSION['message'] = 'Invalid Contact info';
    header('location:../admin/index.php?error');

    // if course doesnt have invalid characters
  }elseif (!preg_match('/^[-a-zA-Z0-9 ]*$/',$_POST['register_course'])) {
    $error = true;
    $_SESSION['message'] = 'invalid course, contact us to verify this';
    header('location:../admin/index.php?error');

    // if employment doesnt have invalid characters
  }elseif (!preg_match('/^[-a-zA-Z0-9 ]*$/',$_POST['register_employment'])) {
    $error = true;
    $_SESSION['message'] = 'invalid employment, contact us to verify this';
    header('location:../admin/index.php?error');

    // if no error
  }elseif ($error == false) {
    $bday_month=$_POST['reg_month'];
    $bday_day=$_POST['reg_day'];
    $bday_year=$_POST['reg_year'];
    $bday=$bday_month.'-'.$bday_day.'-'.$bday_year;

    //////////////SETTERS//////////////////////
    $register_object->setFirstName($_POST['register_firstName']);
    $register_object->setLastName($_POST['register_lastName']);
    $register_object->setEmail($_POST['register_email']);
    $register_object->setAge($_POST['register_age']);
    $register_object->setBday($bday);
    $register_object->setAddress($_POST['register_address']);
    $register_object->setContact($_POST['register_contact']);
    $register_object->setCourse($_POST['register_course']);
    $register_object->setEmployment($_POST['register_employment']);

    ////////////////////REGISTER////////////////////
    $register_object->registerUser();

  }else {
    // if no $_POST['register'] set
    header('location:../admin/index.php?error');
  }
}
 ?>
