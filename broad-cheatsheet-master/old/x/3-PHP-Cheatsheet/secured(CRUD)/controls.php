<?php
include 'server.php';

//check if user logged in
if($_SESSION['LogInstatus'] != true){
header("Location: index.php");
exit;
}

//show value to edit
if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$query = mysqli_query($db, "SELECT * FROM scholar WHERE userID=$id");
		//check if qeury has a value
		if (count($query) == 1 ) {
			//pass value using array
			$x = mysqli_fetch_array($query);
			$uName = $x['userName'];
			$uEmail = $x['userEmail'];
		}
	}

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">

  <title>Monitoring</title>
</head>

<body>

  <?php
if (isset($_SESSION['message'])){
echo $_SESSION['message'];
unset ($_SESSION['message']);

} ?>

  <div class="form-filter">
    <form action="controls.php" method="post">
      <label>Search And Filter Control</label><br>
      <input type="text" name="inputValue" placeholder="Search"><br><br>
      <input type="submit" name="searchControls" value="Filter"><br><br>
    </form>
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
        <td>
          <!--edit=userID => used for get method edit-->
          <a href="controls.php?edit=<?php echo $row['userID']; ?>">Edit</a>
        </td>
        <td>
          <!--edit=userID => used for get method del-->
          <a href="server.php?del=<?php echo $row['userID']; ?>">Delete</a>
        </td>
      </tr>
      </tr>
      <?php endwhile;?>
  </div>
  <div>

    <!-- form to edit -->
    <form method="post" action="server.php">
      <div class="form">
        <input type="hidden" name="uID" value="<?php echo $id; ?>">
        <label>Name:</label>
        <input type="text" name="uName" value="<?php echo $uName; ?>">

        <label>Email address:</label>
        <input type="email" name="uMail" value="<?php echo $uEmail; ?>">

        <button type="submit" name="update">update</button>

      </div>
    </form>
  </div>


</body>

</html>
