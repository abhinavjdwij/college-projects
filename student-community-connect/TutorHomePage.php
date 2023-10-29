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
		<title>Tutor Home Page</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">Tutor Home Page</h3>

		<div class = "forms">

			<br />
			
			<form action = "PostProvideCoaching.php">
				<div class = "text-center">
				<button type = "submit" class = "btn btn-primary btn-lg btn-block">Post - Provide Coaching</button>
				</div>
			</form>

			<br />

			<form action = "PostNeedCoaching.php">
				<div class = "text-center">
				<button type = "submit" class = "btn btn-primary btn-lg btn-block">Post - Need Coaching</button>
				</div>
			</form>

			<br />

			<form action = "SearchTutor.php">
				<div class = "text-center">
				<button type = "submit" class = "btn btn-primary btn-lg btn-block">Search Tutor</button>
				</div>
			</form>

			<br />

		</div>

	</body>

</html>