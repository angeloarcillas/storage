<?php
include "header.php";
?>
<h1>Search page</h1>

<div class="article-container">
  <?php

if (isset($_POST['search'])) {
  $item = mysqli_real_escape_string($conn, $_POST['item']);
  //query what to search
  $sql = "SELECT * FROM article WHERE a_title LIKE '%$item%' OR a_author LIKE '%$item%' OR a_date LIKE '%$item%';"; //LIKE %[name]%
  $result = mysqli_query($conn, $sql);
  $queryResult = mysqli_num_rows($result);

  echo "there are ".$queryResult." result!";

  if ($queryResult > 0 ) {
    //array result
  while ($row = mysqli_fetch_assoc($result)) {
    //echo html result
    echo "<a href='article.php?title=".$row['a_title']."&date=".$row['a_date']. "'>
    <div class='article-box'>
     <h3>". $row['a_title']."</h3>
    <p>".$row['a_text'] ."</p>
    <p>".$row['a_author'] ."</p>
    <p>".$row['a_date'] ."</p>
    </div></a>";
  }
}else {
  echo "error";
}
}
   ?>
</div>
