<?php
session_start();
//include connection here

//captcha
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '______PRIVATE_KEY________',
            'response' => $user_response
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    // Call the function post_captcha
    $res = post_captcha($_POST['g-recaptcha-response']);

    if (!$res['success']) {
        // What happens when the CAPTCHA wasn't checked
      $_SESSION['message'] = "Please verify the Captcha"; //can also use other warning msg
      //redirect to index.php
      header('location:index.php');

    } else {
  //bind data w/ prepared statement
  $name = mysqli_real_escape_string($db, $_POST['uName']);
  $email = mysqli_real_escape_string($db, $_POST['uMail']);

  //prepare statement sql
  $sql = "INSERT INTO scholar (userName, userEmail) VALUES (?, ?);";
  $stmt = mysqli_stmt_init($db);
  if(!mysqli_stmt_prepare($stmt,$sql))
  {
    echo "error";
  }
  else
  {
    //bind parameter
    mysqli_stmt_bind_param($stmt,"sssisss",$name,$email,$addr,$phone,$course,$employment,$status);
    mysqli_stmt_execute($stmt);

    //message
      $_SESSION['message'] = "Success!";
  //redirect to index.php
  header('location: index.php?success');
  }
}
}

 ?>
