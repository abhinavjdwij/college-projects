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
		<title>Job Home Page</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">Job Home Page</h3>

		<div class = "forms">

			<br />
			
			<form action = "PostJobAvailability.php">
				<div class = "text-center">
				<button type = "submit" class = "btn btn-primary btn-lg btn-block">Post - Job Availability</button>
				</div>
			</form>

			<br />

			<form action = "PostNeedJob.php">
				<div class = "text-center">
				<button type = "submit" class = "btn btn-primary btn-lg btn-block">Post - Need Job</button>
				</div>
			</form>

			<br />

			<form action = "SearchJob.php">
				<div class = "text-center">
				<button type = "submit" class = "btn btn-primary btn-lg btn-block">Search Job</button>
				</div>
			</form>

			<br />

		</div>

	</body>

</html>