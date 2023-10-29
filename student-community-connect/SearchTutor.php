<?php

	//error_reporting(E_ALL);
	//ini_set("display_errors","On");
	
	include 'session_check.php';
	include 'utils.php';
	require_once 'dbconnect.php';
	require_once 'SearchTutorManager.php';

	//session_start();
	//var_dump($_SESSION);

	$errors = array();
	$results = array();

	if (isset($_POST['submit'])) {

		$location = $_POST['location'];
		$subject = $_POST['subject'];

		$searchtutormanager = new SearchTutorManager();
		$errors = $searchtutormanager->validate($location, $subject, $db);

		if (count($errors) == 0) {
			$results = $searchtutormanager->search($location, $subject, $db);
		}
	}

?>


<!DOCTYPE html>

<html>

	<head>
		<title>Search Tutor</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">Search Tutor</h3>

		<div class = "forms">
			<?php include('errors.php'); ?>
			<br />
			<form action = "SearchTutor.php" method = "post">

				<div class = "form-group">
					<input subject = "text" class="form-control" name = "location" placeholder = "Location">
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
				
				<div class = "text-center">
					<button subject = "submit" name = "submit" class = "btn btn-primary btn-lg btn-block">Search</button>
				</div>

			</form>

			<br />

		</div>

		<br /> <br /> <br />

		<div>
			<?php
				foreach ($results as $x) {
					echo '<div class = "search">';
						echo "<p>";
							echo "Location: " . $x->location;
							echo "<br />";
							echo "Subject: " . ucfirst($x->subject);
							echo "<br />";
							echo "fees: " . $x->fees;
							echo "<br />";
							echo "Days / Week: " . $x->daysPerWeek;
							echo "<br />";
							echo "Session: " . ucfirst($x->session);
							echo "<br />";
							echo "Contact: " . $x->owner;
							echo "<br />";
						echo "</p>";
					echo "</div>";
					echo "<hr />";
				}
				if (isset($_POST['submit']) && count($errors) == 0 && count($results) == 0) {
					echo "<p>No Tutor available</p>";
				}
			?>
		</div>

	</body>

</html>