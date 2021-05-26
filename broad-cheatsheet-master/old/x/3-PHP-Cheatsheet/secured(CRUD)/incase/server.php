<?php
// include_once 'connect.php';
$db = mysqli_connect('localhost', 'root' , '', 'test');

 if (isset($_POST['save']))
   {
     //add data

 		//mysqli_real_escape_string($db, --protect data from sql injection
     $user = mysqli_real_escape_string($db, $_POST['name']);
     $Age = mysqli_real_escape_string($db, $_POST['age']);
     $Email= mysqli_real_escape_string($db, $_POST['addr']);
     $Phone = mysqli_real_escape_string($db, $_POST['phone']);

//prepared statment insert data
     $sql = "INSERT INTO users (userName, userAge, userEmail, userPhone) VALUES (?, ?, ?, ?);";
     $stmt = mysqli_stmt_init($db);
     if(!mysqli_stmt_prepare($stmt,$sql))
     {
       echo "error";
     }
     else
     {
       //bind parameter "sisi"=str int str int
       mysqli_stmt_bind_param($stmt,"sisi",$user,$Age,$Email,$Phone);
       mysqli_stmt_execute($stmt);
     header('location: index.php?success');

   }
}
?>
