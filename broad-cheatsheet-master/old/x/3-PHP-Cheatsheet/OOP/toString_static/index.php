  <?php
include 'class.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
$object = new newClass;
echo $object ;
//:: ->use to access static property/method
echo newClass::staticMethod();
 ?>
  </body>
</html>
