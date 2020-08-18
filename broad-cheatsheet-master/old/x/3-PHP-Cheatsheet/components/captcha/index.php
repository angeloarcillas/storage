<?php
//try removing this 2 lines
session_start();
include 'captcha.php';
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <title></title>
</head>

<body>

  <!-- form ti fill up -->
  <form action="captcha.php" method="post">

    <h1>Registration Form</h1>

    <label>Name:</label>
    <input type="text" name="uName" placeholder="Enter your name" required>

    <label>Email address:</label>
    <input type="email" name="uMail" placeholder="Enter your email" required>

    <div class="g-recaptcha" data-sitekey="_____SITE_KEY______"></div>

    <button type="submit" name="save">Submit</button>

  </form>

</body>

</html>
