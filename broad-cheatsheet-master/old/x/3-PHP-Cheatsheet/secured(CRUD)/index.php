<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">

  <title>CRUD PHP</title>
</head>

<body>


  <!-- message -->
  <?php
  if (isset($_SESSION['message'])){

      echo $_SESSION['message'];
      unset($_SESSION['message']);
   }
    ?>


  <!-- form ti fill up -->

  <form action="server.php" method="post">
    <div>
      <h1>Registration Form</h1>
    </div>
    <div class="form-input">
      <label>Name:</label>
      <input type="text" name="uName" placeholder="Enter your name" required>
    </div>

    <div class="form-input">
      <label>Email address:</label>
      <input type="email" name="uMail" placeholder="Enter your email" required>
    </div>

    <button type="submit" name="save">Submit</button>

  </form>
</body>

</html>
