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
		<title>Achievement Home Page</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">Achievement Home Page</h3>

		<div class = "forms">

			<br />
			
			<form action = "PostAchievement.php">
				<div class = "text-center">
				<button type = "submit" class = "btn btn-primary btn-lg btn-block">Post Achievement</button>
				</div>
			</form>

			<br />

			<form action = "SearchAchievement.php">
				<div class = "text-center">
				<button type = "submit" class = "btn btn-primary btn-lg btn-block">Search Achievement</button>
				</div>
			</form>

			<br />

		</div>

	</body>

</html>