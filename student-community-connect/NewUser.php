<?php

	//error_reporting(E_ALL);
	//ini_set("display_errors","On");
	
	require_once 'dbconnect.php';
	require_once 'NewUserManager.php';

	session_start();
	//var_dump($_SESSION);

	$errors = array();

	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$emailID = $_POST['emailID'];
		$password = $_POST['password'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$type = $_POST['type'];
		$organizerName = $_POST['organizerName'];
		$collegeName = $_POST['collegeName'];
		$address = $_POST['address'];

		$newusermanager = new NewUserManager();
		$errors = $newusermanager->validate($name,
			$emailID, $password, $age, $gender,
			$type, $organizerName, $collegeName,
			$address, $db);

		if (count($errors) == 0) {
			//echo "<p>Ok</p>";
		  	$newusermanager->create($name,
			$emailID, $password, $age, $gender,
			$type, $organizerName, $collegeName,
			$address, $db);
		}
	}
?>


<!DOCTYPE html>

<html>

	<head>
		<title>New User - Student Community Connect</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">New User - Sign Up</h3>

		<div class = "forms">

			<?php include('errors.php'); ?>
			
			<br />
			
			<form action = "NewUser.php" method = "post">
				
				<div class = "form-group">
					<input type = "text" class="form-control" name = "name" placeholder = "Name">
				</div>

				<div class = "form-group">
					<input type = "text" class="form-control" name = "emailID" placeholder = "Email ID">
				</div>

				<div class = "form-group">
					<input type = "password" class="form-control" name = "password" placeholder = "Password">
				</div>

				<div class = "form-group">
					<input type = "text" class="form-control" name = "age" placeholder = "Age">
				</div>

				<div class = "form-group">
					<select name = "gender" class="form-control">
						<option value = "" disabled selected>Gender</option>
						<option value = "male">Male</option>
						<option value = "female">Female</option>
						<option value = "other">Choose Not To Specify</option>
					</select>
				</div>

				<div class = "form-group">
					<select name = "type" class="form-control">
						<option value = "" disabled selected>User Type</option>
						<option value = "student">Student</option>
						<option value = "eventorganizer">Event Organizer</option>
						<option value = "cr">College Representative</option>
					</select>
				</div>

				<div class = "form-group">
					<input type = "text" class="form-control" name = "organizerName" placeholder = "Organizer Name (For Event Organizer)">
				</div>

				<div class = "form-group">
					<input type = "text" class="form-control" name = "collegeName" placeholder = "College Name (For Student / CR)">
				</div>

				<div class = "form-group">
					<input type = "text" class="form-control" name = "address" placeholder = "Address (For Student)">
				</div>
				
				<div class = "text-center">
					<button type = "submit" class = "btn btn-primary btn-lg btn-block" name = "submit">Register</button>
				</div>
			
			</form>

			<br />

		</div>

	</body>

</html>