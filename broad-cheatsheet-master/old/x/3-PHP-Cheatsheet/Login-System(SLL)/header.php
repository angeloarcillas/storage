  <?php
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body>

<header>
	<nav>
		<div class="main-wrapper">
			<ul>
				<li><a href="index.php">Home</a></li>
			</ul>
			<div class="nav-login">
				<?php
        //if has session echo logout form
				if (isset($_SESSION['id'])) {
					echo "<form action='includes/logout.inc.php' method='POST'>
					<button type='submit' name='submit'>Logout</button>
				</form>";
				}else{
          //if no session echo login form
					echo "<form action='includes/login.inc.php' method='POST'>
					<input type='text' name='uid' placeholder='Username'>
					<input type='Password' name='pwd' placeholder='Password'>
					<button type='submit' name='submit'>Login</button>
				</form>
				<a href='signup.php'>Sign up</a>";
			}
				 ?>



			</div>
		</div>
	</nav>
</header>
