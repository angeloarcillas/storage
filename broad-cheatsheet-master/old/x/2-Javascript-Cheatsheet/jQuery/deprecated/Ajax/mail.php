<?php

if (isset($_POST['submit'])) {
  //pass value from ajax load()
  $name = $_POST['name'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $message = $_POST['message'];

  //create var
  $errorEmpty = false;
  $errorEmail = false;

  //validate form
    if (empty($name) || empty($email) || empty($message)) { //->empty() => php function
      echo "<p class = 'error'>Fill all empty fields!</p>";
      $errorEmpty = true;

      //validat if email has correct format
    }elseif (filter_var($email, FILTER_VALIDATE_EMAIL)) { //-> filter_var($email, FILTER_VALIDATE_EMAIL) => php function
      echo "<p class = 'error'>Invalid Email Address</p>";
        $errorEmail = true;
    }else {
      echo "<p class = 'success'>Message Sent</p>";
    }
}else {
  echo "error";
}

 ?>

<script>
  //remove form class
  $(".form-name, .form-email, .form-message, form-gender").removeClass("input-error");

  //pass value from $_POST php
  let errorEmpty = "<?php echo $errorEmpty ?>";
  let errorEmail = "<?php echo $errorEmail ?>";

  //validate form
  if (errorEmpty == true) {
    //add class => input-error == css[change box color]
    $(".form-name, .form-email, .form-message").addClass("input-error");
  }
  //validate email
  if (errorEMail == true) {
    //add class to email only => input-error == css[change box color]
    $(".form-email").addClass("input-error");
  }
  //validate form
  if (errorEmpty == false && errorEmail == false) {
    //remove input values
    $(".form-name, .form-email, .form-message").val("");
  }
</script>
