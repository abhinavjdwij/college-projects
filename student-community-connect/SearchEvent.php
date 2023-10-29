<?php

	error_reporting(E_ALL);
	ini_set("display_errors","On");
	
	include 'session_check.php';
	include 'utils.php';
	require_once 'dbconnect.php';
	require_once 'SearchEventManager.php';

	//session_start();
	//var_dump($_SESSION);

	$errors = array();
	$results = array();

	if (isset($_POST['submit'])) {
		$eventType = $_POST['eventType'];

		$searcheventmanager = new SearchEventManager();
		$errors = $searcheventmanager->validate($eventType, $db);

		if (count($errors) == 0) {
			$results = $searcheventmanager->search($eventType, $db);
		}
	}

?>


<!DOCTYPE html>

<html>

	<head>
		<title>Search Event</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">Search Event</h3>

		<div class = "forms">
			<?php include('errors.php'); ?>
			<br />
			<form action = "SearchEvent.php" method = "post">

				<div class = "form-group">
					<select name = "eventType" class="form-control">
						<option value = "" disabled selected>Select Event Type</option>
						<option value = "technical">Technical</option>
						<option value = "cultural">Cultural</option>
						<option value = "other">Other</option>
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
				foreach ($results as $resultEvent) {
					echo '<div class = "search">';
						echo "<p>";
							echo "Event Name: " . $resultEvent->eventName;
							echo "<br />";
							echo "Details: " . $resultEvent->details;
							echo "<br />";
							echo "Contact : <a href = '#'>". $resultEvent->organizer . "</a>";
						echo "</p>";
					echo "</div>";
					echo "<hr />";
				}
				if (isset($_POST['submit']) && count($errors) == 0 && count($results) == 0) {
					echo "<p>No Event available</p>";
				}
			?>
		</div>

	</body>

</html>