<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Login system</title>
</head>
<body>

	<!-- ////////////HEADER///////////////// -->
	<nav>
		<a href="">BRAND-NAME</a>
		<div class="login-form">
			<form action="routes/server.route.php" method="post">
				<input type="text" name="uName" placeholder="Username..">
				<input type="Password" name="uPwd" placeholder="Password">
				<button type="submit" name="login">Login</button>	
				<a href="#forgot">Forgot?</a>		
			</form>
		</div>
	</nav>
<div class="container">

	<!-- ///////////////////ARTICLE////////////////////// -->
	<div class="left">
		<h2>Evangel Laclairs</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>	
		<p class="link"><a href="">More!</a></p>	
</div>

	<!-- //////////////////REGISTER FORM//////////////////////// -->
	<div class="right">
		<div class="wrapper">
			<form action="routes/server.route.php" method="post">
				<h2>REGISTRATION FORM</h2>
				<label>First Name:</label>
				<input type="text" name="fName" placeholder="First Name..">
				<label>Last Name:</label>
				<input type="text" name="lName" placeholder="Last Name..">
				<label>Username:</label>
				<input type="text" name="uName" placeholder="Username..">
				<label>Email:</label>
				<input type="email" name="uEmail" placeholder="Email..">
				<label>Password:</label>
				<input type="Password" name="uPwd" placeholder="Password.."><br>
				<label>Re-type password:</label>
				<input type="Password" name="reuPwd" placeholder="Re-type Password..">

				<p>[ Captcha/Authenticator ]</p>
				<p>By Registering you accept our <a href="">Terms and condition</a>.<br>You will recieve an email notification</p>
				<button type="submit" name="register">Register</button>
			</form>
		</div>

	</div>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	
	<!-- /////////////////FORGOT FORM//////////////////// -->
	<div id="forgot">
		<h2>FORGOT FORM</h2>
		<form action="routes/server.route.php" method="post">
			<input type="email" name="uEmail" placeholder="Enter Your Email..">
			<button type="submit" name="forgot">Submit</button>
		</form>
	</div>
	
<!-- <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> -->
	<!-- <div>
		<form action="routes/server.route.php" method="post">
		<input type="text" name="id">
		<button type="submit" name="del">del</button>
		</form>
</div> -->
	</div>
</body>
</html>