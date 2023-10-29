<?php
	
	//error_reporting(E_ALL);
	//ini_set("display_errors","On");
	
	include 'session_check.php';
	require_once 'dbconnect.php';
	require_once 'PGManager.php';

	session_start();
	//var_dump($_SESSION);

	$errors = array();

	if (isset($_POST['submit'])) {

		$pgType = $_POST['pgType'];
		$location = $_POST['location'];
		$rent = $_POST['rent'];
		$vacancy = $_POST['vacancy'];
		$owner = $_SESSION['emailID'];

		$pgmgr = new PGManager();
		$errors = $pgmgr->validateNeedPG($pgType, $location, $rent, $vacancy, $owner, $db);

		if (count($errors) == 0) {
			$pgmgr->createNeedPG($pgType, $location, $rent, $vacancy, $owner, $db);
		}

	}
?>

<!DOCTYPE html>

<html>

	<head>
		<title>Post - Need PG</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">Post - Need PG</h3>

		<div class = "forms">
			<?php include('errors.php'); ?>
			<br />
			<form action = "PostNeedPG.php" method = "post">
				
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
					<input type = "text" class="form-control" name = "vacancy" placeholder = "Number Of People">
				</div>

				<div class = "text-center">
					<button type = "submit" name = "submit" class = "btn btn-primary btn-lg btn-block">Post</button>
				</div>

			</form>

			<br />

		</div>

	</body>

</html>