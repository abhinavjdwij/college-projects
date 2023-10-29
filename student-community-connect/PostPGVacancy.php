<?php
	
	//error_reporting(E_ALL);
	//ini_set("display_errors","On");
	
	include 'session_check.php';
	require_once 'dbconnect.php';
	require_once 'PGManager.php';

	//session_start();
	//var_dump($_SESSION);

	$errors = array();

	if (isset($_POST['submit'])) {
		$pgName = $_POST['pgName'];
		$pgType = $_POST['pgType'];
		$location = $_POST['location'];
		$rent = $_POST['rent'];
		$vacancy = $_POST['vacancy'];
		$owner = $_SESSION['emailID'];

		$pgmanager = new PGManager();
		$errors = $pgmanager->validatePGVacancy($pgName, $pgType, $location,
			$rent, $vacancy, $owner, $db);

		if (count($errors) == 0) {
		  	$pgmanager->postPGvacancy($pgName, $pgType, $location,
			$rent, $vacancy, $owner, $db);
		}

	}
?>

<!DOCTYPE html>

<html>

	<head>
		<title>Post - PG Vacancy</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">Post - Vacancy for PG</h3>

		<div class = "forms">
			<?php include('errors.php'); ?>
			<br />
			<form action = "PostPGVacancy.php" method = "post">
				<div class = "form-group">
					<input type = "text" class="form-control" name = "pgName" placeholder = "PG Name">
				</div>

				<div class = "form-group">
					<select name = "pgType" class="form-control">
						<option value = "" disabled selected>Select PG Type</option>
						<option value = "male">Male</option>
						<option value = "female">Female</option>
					</select>
				</div>
				
				<div class = "form-group">
					<input type = "text" class="form-control" name = "location" placeholder = "Location">
				</div>
				
				<div class = "form-group">
					<input type = "text" class="form-control" name = "rent" placeholder = "Rent">
				</div>

				<div class = "form-group">
					<input type = "text" class="form-control" name = "vacancy" placeholder = "Vacancy">
				</div>
				
				<div class = "text-center">
					<button type = "submit" name = "submit" class = "btn btn-primary btn-lg btn-block">Post</button>
				</div>

			</form>

			<br />

		</div>

	</body>

</html>