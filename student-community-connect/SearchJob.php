<?php

	//error_reporting(E_ALL);
	//ini_set("display_errors","On");
	
	include 'session_check.php';
	include 'utils.php';
	require_once 'dbconnect.php';
	require_once 'SearchJobManager.php';

	//session_start();
	//var_dump($_SESSION);

	$errors = array();
	$results = array();

	if (isset($_POST['submit'])) {

		$location = $_POST['location'];
		$type = $_POST['type'];

		$searchjobmanager = new SearchJobManager();
		$errors = $searchjobmanager->validate($location, $type, $db);

		if (count($errors) == 0) {
			$results = $searchjobmanager->search($location, $type, $db);
		}
	}

?>


<!DOCTYPE html>

<html>

	<head>
		<title>Search Job</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">Search Job</h3>

		<div class = "forms">
			<?php include('errors.php'); ?>
			<br />
			<form action = "SearchJob.php" method = "post">

				<div class = "form-group">
					<input type = "text" class="form-control" name = "location" placeholder = "Location">
				</div>

				<div class = "form-group">
					<select name = "type" class="form-control">
							<option value = "" disabled selected>Job Type</option>
							<option value = "contentwriting">Content Writing</option>
							<option value = "appdevelopment">App Development</option>
							<option value = "webdevelopment">Web Development</option>
							<option value = "other">Others</option>
					</select>
				</div>
				
				<div class = "text-center">
					<button type = "submit" name = "submit" class = "btn btn-primary btn-lg btn-block">Search</button>
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
							echo "Type: " . $x->type;
							echo "<br />";
							echo "Salary: " . $x->salary;
							echo "<br />";
							echo "Days / Week: " . $x->daysPerWeek;
							echo "<br />";
							echo "Hours / Day: " . $x->hoursPerDay;
							echo "<br />";
							echo "Contact: " . $x->owner;
							echo "<br />";
						echo "</p>";
					echo "</div>";
					echo "<hr />";
				}
				if (isset($_POST['submit']) && count($errors) == 0 && count($results) == 0) {
					echo "<p>No Job available</p>";
				}
			?>
		</div>

	</body>

</html>