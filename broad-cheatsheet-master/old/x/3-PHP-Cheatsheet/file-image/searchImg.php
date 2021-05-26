<?php
#not sure about echo if it works

//add filename to search
$path = "uploads/*"; //filename* / cat*
$fileinfo = glob($path);
// $fileActualName = $fileinfo[];

echo "<div>";
echo "<p>".$fileActualName."</p>";
echo "<div>";

header("location:index.php");
 ?>
