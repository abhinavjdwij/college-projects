<?php
	
	//error_reporting(E_ALL);
	//ini_set("display_errors","On");
	
	include 'numOfStudents_check.php';
	require_once 'dbconnect.php';
	require_once 'TutorManager.php';

	session_start();
	//var_dump($_SESSION);

	$errors = array();

	if (isset($_POST['submit'])) {
		$location = $_POST['location'];
		$subject = $_POST['subject'];
		$numOfStudents = $_POST['numOfStudents'];
		$owner = $_SESSION['emailID'];

		$tutormgr = new TutorManager();
		$errors = $tutormgr->validateNeedTutor($location, $subject, $numOfStudents, $owner, $db);

		if (count($errors) == 0) {
			$tutormgr->createNeedTutor($location, $subject, $numOfStudents, $owner, $db);
		}

	}
?>

<!DOCTYPE html>

<html>

	<head>
		<title>Post - Take Coaching</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">Post - Take Coaching</h3>

		<div class = "forms">
			<?php include('errors.php'); ?>
			<br />
			<form action = "TakeCoaching.php" method = "post">
				
				<div class = "form-group">
					<input type = "text" class="form-control" name = "location" placeholder = "Location">
				</div>

				<div class = "form-group">
					<select name = "subject" class="form-control">
						<option value = "" disabled selected>Select Subject</option>
						<option value = "science">Science</option>
						<option value = "math">Math</option>
						<option value = "commerce">Commerce</option>
						<option value = "computer">Computer</option>
						<option value = "all">All</option>
						<option value = "other">Other</option>

					</select>
				</div>

				<div class = "form-group">
					<input type = "text" class="form-control" name = "numOfStudents" placeholder = "Number of Students">
				</div>
				
				<div class = "text-center">
					<button type = "submit" name = "submit" class = "btn btn-primary btn-lg btn-block">Post</button>
				</div>

			</form>

			<br />

		</div>

	</body>

</html>