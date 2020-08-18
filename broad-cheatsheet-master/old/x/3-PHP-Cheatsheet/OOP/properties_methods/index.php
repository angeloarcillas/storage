<?php
include 'includes/class.php';
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<?php
//create object and call class
 $object = new newClass;

 //"unset($object);" -> this deletes object and other shits

 //another object
  $object2 = new newClass;

  //echo object with function getProperty()
 echo $object -> getProperty() . "<br>";

//initialize setProperty() function to change old data to new
$object -> setProperty("This is the new Data");
echo $object -> getProperty() . "<br>";

//initialize setProperty() function to change
//old data to new using another object
$object2 -> setProperty("This is the another new Data");
echo $object2 -> getProperty();
 ?>
  </body>
</html>
