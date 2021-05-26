<?php
include "header.php";
 ?>

<body>
<h1>Article Page</h1>

<div class="article-container">
  <?php
  //get info from url
  $title = mysqli_real_escape_string($conn, $_GET['title']);
  $date = mysqli_real_escape_string($conn, $_GET['date']);

//query search
$sql = "SELECT * FROM article WHERE a_title='$title' AND a_date='$date';";
$result = mysqli_query($conn, $sql);
$queryResult = mysqli_num_rows($result);

if ($queryResult > 0 ) {
  //array result
  while ($row = mysqli_fetch_assoc($result)) {
    //echo html result
    echo "<div class=article-box>
    <h3>". $row['a_title']."</h3>
    <p>".$row['a_text'] ."</p>
    <p>".$row['a_author'] ."</p>
    <p>".$row['a_date'] ."</p>
    </div>";
    }
}
   ?>
</div>
</body>
</html>
