<?php
	
	//error_reporting(E_ALL);
	//ini_set("display_errors","On");
	
	include 'session_check.php';
	require_once 'dbconnect.php';
	require_once 'TutorManager.php';

	session_start();
	//var_dump($_SESSION);

	$errors = array();

	if (isset($_POST['submit'])) {
		$location = $_POST['location'];
		$subject = $_POST['subject'];
		$fees = $_POST['fees'];
		$daysPerWeek = $_POST['daysPerWeek'];
		$session = $_POST['session'];
		$owner = $_SESSION['emailID'];

		$tutormgr = new TutorManager();
		$errors = $tutormgr->validate($location, $subject, $fees, $daysPerWeek, $session, $owner, $db);

		if (count($errors) == 0) {
			$tutormgr->createTutor($location, $subject, $fees, $daysPerWeek, $session, $owner, $db);
		}

	}
?>

<!DOCTYPE html>

<html>

	<head>
		<title>Post - Give Coaching</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">Post - Give Coaching</h3>

		<div class = "forms">
			<?php include('errors.php'); ?>
			<br />
			<form action = "PostProvideCoaching.php" method = "post">
				
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
					<input type = "text" class="form-control" name = "fees" placeholder = "Fees">
				</div>
				
				<div class = "form-group">
					<select name = "daysPerWeek" class="form-control">
						<option value = "" disabled selected>Days / Week</option>
						<option value = "1">1</option>
						<option value = "2">2</option>
						<option value = "3">3</option>
						<option value = "4">4</option>
						<option value = "5">5</option>
						<option value = "6">6</option>
						<option value = "7">7</option>
					</select>
				</div>

				<div class = "form-group">
					<select name = "session" class="form-control">
						<option value = "" disabled selected>Session</option>
						<option value = "morning">Morning</option>
						<option value = "afternoon">Afternoon</option>
						<option value = "evening">Evening</option>
					</select>
				</div>
				
				<div class = "text-center">
					<button type = "submit" name = "submit" class = "btn btn-primary btn-lg btn-block">Post</button>
				</div>

			</form>

			<br />

		</div>

	</body>

</html>