<?php
if ($_SESSION['type'] == 'user') {
  header('location:app/index.html');

}elseif ($_SESSION['type'] == 'clerk') {
  header('location:app/index.html');

}elseif ($_SESSION['type'] == 'admin') {
  header('location:app/admin/index.php');

}else {
header('location:app/index.html');
}
 ?>
