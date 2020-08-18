<?php
$to = "foo@mail.com";
$headers = "From: php@mail.com";
$subject = "Hi";
$message = "You have receive a message from {$sender} \n\n {$senderMessage} ";
mail($to, $subject, $message, $headers);

// addition header .eg
// Always set content-type when sending HTML email
// The additional headers should be separated with a CRLF (\r\n).
$headers = "MIME-Version: 1.0" . "\r\n"
. "Content-type:text/html;charset=UTF-8" . "\r\n"

// More headers
 . 'From: <fake@example.com>' . "\r\n"
    . 'Cc: fake@example.com' . "\r\n";

/* OPTIONAL HEADERS */
//   // To send HTML mail, the Content-type header must be set
// $headers[] = 'MIME-Version: 1.0';
// $headers[] = 'Content-type: text/html; charset=iso-8859-1';
//
// // Additional headers
// $headers[] = 'To: Mary <mary@example.com>, Kelly <kelly@example.com>';
// $headers[] = 'From: Birthday Reminder <birthday@example.com>';
// $headers[] = 'Cc: birthdayarchive@example.com';
// $headers[] = 'Bcc: birthdaycheck@example.com';
