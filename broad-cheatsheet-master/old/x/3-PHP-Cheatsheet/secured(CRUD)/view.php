<?php
include 'server.php';
//check if user logged in
if($_SESSION['logInstatus'] != true){
header("Location: index.php");
exit;
}
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">

  <title>Monitoring</title>
</head>

<body>


  <!-- message -->
  <?php if (isset($_SESSION['message'])){
      echo $_SESSION['message'];
      unset($_SESSION['message']);
 }
 ?>

  <div class="form-filter">
    <form action="view.php" method="post">
      <label>Search And Filter Control</label><br>
      <input type="text" name="inputValue" placeholder="Search"><br><br>
      <input type="submit" name="search" value="Filter"><br><br>

    </form>
  </div>

  <div>
    <h1>Monitoring Form</h1>
  </div>

  <div class="form-view">

    <!-- show database -->
    <table width="100%">
      <tr>
        <th width="5%">ID</th>
        <th width="20%">Name</th>
        <th width="20%">E-Mail</th>
      </tr>
      <!-- mysqli_fetch_array or mysqli_fetch_assoc -->
      <?php while($row = mysqli_fetch_array($result)):?>
      <tr>
        <td>
          <?php echo $row['userID'];?>
        </td>
        <td>
          <?php echo $row['userName'];?>
        </td>
        <td>
          <?php echo $row['userEmail'];?>
        </td>
      </tr>
      <?php endwhile;?>
  </div>
</body>

</html>
