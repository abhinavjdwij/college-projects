<?php

	//error_reporting(E_ALL);
	//ini_set("display_errors","On");

	session_start();
	//var_dump($_SESSION);

	require_once 'dbconnect.php';
	require_once 'LoginManager.php';

	$errors = array();

	if (isset($_POST['submit'])) {
		$emailID = $_POST['emailID'];
		$password = $_POST['password'];

		$loginmanager = new LoginManager();
		$errors = $loginmanager->validate($emailID, $password, $db);

		if (count($errors) == 0) {
		  	$loginmanager->loginUser($emailID, $password, $db);
	  	}
	}
?>


<!DOCTYPE html>

<html>

	<head>
		<title>Student Community Connect</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">Student Community Connect</h3>

		<div class = "forms">

			<?php include('errors.php'); ?>
			
			<br />

			<form action = "Login.php" method = "post">

				<div class = "form-group">
					<input type = "text" class="form-control" name = "emailID" placeholder = "Email ID">
				</div>
				
				<div class = "form-group">
					<input type = "password" class="form-control" name = "password" placeholder = "Password">
				</div>
				
				<div class = "text-center">
					<button type = "submit" name = "submit" class = "btn btn-primary btn-lg btn-block">Login</button>
				</div>
			
			</form>

			<br />
			
			<form action = "NewUser.php" method = "post">
				
				<div>
					<button type = "submit" name = "new_user" class = "btn btn-primary btn-lg btn-block">New User Register</button>
				</div>

			</form>

			<br />

		</div>

	</body>

</html>