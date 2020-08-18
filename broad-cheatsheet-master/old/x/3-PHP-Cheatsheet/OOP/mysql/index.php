<?php
 include 'class.php';
 include 'class2.php';
 include 'class3.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<?php
$object = new viewUsers();
$object -> showUsers();
 ?>
  </body>
</html>
