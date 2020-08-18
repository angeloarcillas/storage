<?php
include_once 'header.php';
 ?>
    <?php
    //check if user already login
    if (isset($_SESSION['uid'])) {
      echo "u are log in";
    }else {
    //  if no session = go back

      header("location: index.php?pleaseLogIn");
      exit();
    } ?>
  </body>
</html>
