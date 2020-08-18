<?php
//create var array
$existingNames = array("angelo", "Dave", "Arcillas");

if (isset($_POST['suggestion'])) {

  //pass value from ajax
  $name = $_POST['suggestion'];

  //check if name is empty
  if (!empty($name)) {

    //array existingNames to $existingName
    foreach($existingNames as $existingName) {

      //strpos() -> php function
      if (strpos($existingName, $name) !== false) {

        //show existingNames on  form  <p class="info"></p>
        echo $existingName;
        echo "<br>";
      }
    }
  }

}
 ?>
