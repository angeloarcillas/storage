<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// print_r($_POST);
// exit;
require_once 'pkg/autoloader.php';
if (isset($_POST['submitType'])) {
    switch ($_POST['submitType']) {
      case 'store':
        $object = new CRUDController;

        $datas = array_map("strip_tags", $_POST);
        $datas = preg_replace('/[^-a-zA-Z0-9@ ]/', "", $datas);
        $object->store($datas);
      break;

      case 'edit':
        $object = new CRUDController;
        $object->edit($_POST['id']);
      break;

      case 'update':
        $object = new CRUDController;

        $datas = array_map("strip_tags", $_POST);
        $datas = preg_replace('/[^-a-zA-Z0-9@ ]/', "", $datas);
        $object->update($datas);
      break;

      case 'del':
        $object = new CRUDController;
        $object->destroy($_POST['id']);
      break;

      // case 'showAllApplicants':
      //   $object = new CRUDController;
      //   $object->index($_POST);
      // break;

      default:
      header('location:404.php');
      break;
      }
} elseif (isset($_GET['submitType'])) {
    switch ($_GET['submitType']) {
      case 'show':
        $object = new CRUDController;
        $object->show($_GET['id']);
      break;

      case 'edit':
        header('location:/el/view/applicant/edit.php?id='.$_GET['id']);
      break;

      case 'getApplicants':
        $object = new CRUDController;

        $datas = array_map("strip_tags", $_GET);
        $datas = preg_replace('/[^-a-zA-Z0-9@ ]/', "", $datas);
        $object->index($datas);
      break;

    default:
      header('location:404.php');
    break;
      }
} else {
    header('location:404.php?errR');
}
