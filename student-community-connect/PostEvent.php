<?php
	
	//error_reporting(E_ALL);
	//ini_set("display_errors","On");
	
	include 'session_check.php';
	require_once 'dbconnect.php';
	require_once 'EventManager.php';

	session_start();
	//var_dump($_SESSION);

	$errors = array();

	if (isset($_POST['submit'])) {

		$eventName = $_POST['eventName'];
		$eventType = $_POST['eventType'];
		$details = $_POST['details'];
		$organizer = $_SESSION['emailID'];

		$eventmanager = new EventManager();
		$errors = $eventmanager->validate($eventName, $eventType, $details, $organizer, $db);

		if (count($errors) == 0) {
			$eventmanager->create($eventName, $eventType, $details, $organizer, $db);
		}

	}
?>

<!DOCTYPE html>

<html>

	<head>
		<title>Post - Event</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">Post - Event</h3>

		<div class = "forms">
			<?php include('errors.php'); ?>
			<br />
			<form action = "PostEvent.php" method = "post">

				<div class = "form-group">
					<input type = "text" class="form-control" name = "eventName" placeholder = "Event Name">
				</div>

				<div class = "form-group">
					<select name = "eventType" class="form-control">
						<option value = "" disabled selected>Select Event Type</option>
						<option value = "technical">Technical</option>
						<option value = "cultural">Cultural</option>
						<option value = "other">Other</option>
					</select>
				</div>

				<div class = "form-group">
					<input type = "text" class="form-control" name = "details" placeholder = "Event Details">
				</div>

				<div class = "text-center">
					<button type = "submit" name = "submit" class = "btn btn-primary btn-lg btn-block">Post</button>
				</div>

			</form>

			<br />

		</div>

	</body>

</html>