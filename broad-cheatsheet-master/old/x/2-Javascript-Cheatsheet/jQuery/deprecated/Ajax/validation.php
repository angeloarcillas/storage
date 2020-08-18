<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <title>Validation</title>
</head>

<body>
  <form class="" action="mail.php" method="post">
    <label for="">Name:</label>
    <input class="form-name" type="text" name="name" value="">
    <label for="">Email:</label>
    <input class="form-email" type="text" name="email" value="">

    <label for="">Gender:</label>
    <select class="form-gender" name="gender">
      <option value="">Male</option>
      <option value="">Female</option>
    </select>
    <textarea id="form-message" class="form-message" name="message" rows="3" cols="50"></textarea>
    <button class="form-send" type="submit" name="send">Send e-mail</button>
    <p id="msg"></p>
  </form>
</body>
<script>
  $(document).ready(function() {
    $('form').submit(function(event) {

      event.preventDefault(); //-> prevent form from running

      //pass value from form
      let name = $('.form-name').val();
      let email = $('.form-email').val();
      let gender = $('.form-gender').val();
      let message = $('.form-message').val();
      let submit = $('.form-send').val();

      //ajax load
      $('#form-message').load('mail.php', {

        //pass value from jQuery
        //post name : input name
        name: name,
        email: email,
        gender: gender,
        message: message,
        submit: submit
      });
    });
  });
</script>

</html>
