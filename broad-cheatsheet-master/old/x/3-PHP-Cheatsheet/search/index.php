<?php
include "header.php";
 ?>
<body>
  <!-- search bar -->
<form class="" action="search.php" method="post">
  <input type="text" name="item" placeholder="Search...">
  <button type="submit" name="search">Search</button>
</form>

<h1>Front Page</h1>
<h2>All articles:</h2>
<div class="article-container">
<!-- query context -->
  <?php
$sql = "SELECT * FROM article;";
$result = mysqli_query($conn, $sql);
$queryResult = mysqli_num_rows($result); //mysqli_num_rows() -> count number of rows
if ($queryResult > 0 ) {
  while ($row = mysqli_fetch_assoc($result)) { //array result
    //echo html context
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
