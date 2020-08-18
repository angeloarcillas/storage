<?php
include 'class.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php
//$users -> the object
// users -> the class w/ value
$users = new users('evangel','laclairs','blue','red')  ;
echo $users -> fullName();


     ?>
  </body>
</html>
