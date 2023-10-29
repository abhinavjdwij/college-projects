<?php
	
	//error_reporting(E_ALL);
	//ini_set("display_errors","On");
	
	include 'session_check.php';

	//session_start();
	//var_dump($_SESSION);

?>

<!DOCTYPE html>

<html>

	<head>
		<title>Event Home Page</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">Event Home Page</h3>

		<div class = "forms">

			<br />
			
			<form action = "PostEvent.php">
				<div class = "text-center">
				<button type = "submit" class = "btn btn-primary btn-lg btn-block">Post Event</button>
				</div>
			</form>

			<br />

			<form action = "SearchEvent.php">
				<div class = "text-center">
				<button type = "submit" class = "btn btn-primary btn-lg btn-block">Search Event</button>
				</div>
			</form>

			<br />

		</div>

	</body>

</html>