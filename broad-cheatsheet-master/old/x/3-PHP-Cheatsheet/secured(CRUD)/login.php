<?php
include 'server.php';
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">

  <title>LogIn</title>

</head>

<body>

  <!-- message -->
  <?php if (isset($_SESSION['message'])){
    		echo $_SESSION['message'];
    		unset($_SESSION['message']);
    } ?>

  <!-- login form -->
  <form action="server.php" method="post">

    <div class="form-login">
      <label>Username:</label>
      <input type="text" name="uId">
      <label>Password:</label>
      <input type="password" name="uPwd" placeholder="******">
      <button type="submit" name="login">Log in</button>
    </div>
  </form>
</body>

</html>
