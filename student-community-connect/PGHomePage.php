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
		<title>PG Home Page</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">PG Home Page</h3>

		<div class = "forms">

			<br />
			
			<form action = "PostPGVacancy.php">
				<div class = "text-center">
				<button type = "submit" class = "btn btn-primary btn-lg btn-block">Post - PG Vacancy</button>
				</div>
			</form>

			<br />

			<form action = "PostNeedPG.php">
				<div class = "text-center">
				<button type = "submit" class = "btn btn-primary btn-lg btn-block">Post - Need PG</button>
				</div>
			</form>

			<br />

			<form action = "SearchPG.php">
				<div class = "text-center">
				<button type = "submit" class = "btn btn-primary btn-lg btn-block">Search PG</button>
				</div>
			</form>

			<br />

		</div>

	</body>

</html>