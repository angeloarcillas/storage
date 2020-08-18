<?php

if (isset($_POST['save'])) {
  //$_FILES = another super global
  //gets all info from the file
  $files = $_FILES['file'];

  //$files array properties (debug $files to understand) => array properties = $_FILES gets info as array
  $fileName = $_FILES['file']['name']; //->  or $fileName = $fileName['name'];
  $fileTempName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

  //get fill extension
  $fileExt = explode('.',$fileName); //-> explode() => pop "." extension
  $fileActualExt = strtolower(end($fileExt)); //-> lowercase the $fileExt

  //validate what file extensions are allowed
  $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    //validate if $fileActualExt & $allowed are true/correct
    if (in_array($fileActualExt, $allowed)) {

        //check if $fileName property error = 0
        if ($fileError === 0) {

            //limit the file size to uploade
            if ($fileSize < 100000) { // -> 100000kb / 100mb

              //uniqid() generate unique ID so same filename will not stack
              $fileNameNew = uniqid('',true ). "." .$fileActualExt;

              //upload image to destination
              $fileDestination =  'uploads/'.$fileNameNew;
              move_uploaded_file($fileTempName, $fileDestination);
                //redirect to index
                header('location:index.php?success');

            }else {
              echo "File is too big";
            }
        }else {
          echo "Error uploading";
        }
    }else {
      echo "That is not allowed";
    }
}

 ?>
