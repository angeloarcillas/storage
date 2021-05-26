<?php

if ($_SESSION['user_status']=='active') {
  // code...
}else {
  header('location:./view/index.php');
}
 ?>
