<?php
//include 'includes/parentClass.php';
//include 'includes/class.php';
include 'includes/privateClass.php';
//$object = new newClass; -> initiate class
$object = new privClass;
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<?php
echo $object -> name();
 ?>
  </body>
</html>
