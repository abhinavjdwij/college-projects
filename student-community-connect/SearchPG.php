<?php

	//error_reporting(E_ALL);
	//ini_set("display_errors","On");
	
	include 'session_check.php';
	include 'utils.php';
	require_once 'dbconnect.php';
	require_once 'SearchPGManager.php';

	//session_start();
	//var_dump($_SESSION);

	$errors = array();
	$results = array();

	if (isset($_POST['submit'])) {

		$location = $_POST['location'];
		$pgType = $_POST['pgType'];

		$searchpgmanager = new SearchPGManager();
		$errors = $searchpgmanager->validate($location, $pgType, $db);

		if (count($errors) == 0) {
			$results = $searchpgmanager->search($location, $pgType, $db);
		}
	}

?>


<!DOCTYPE html>

<html>

	<head>
		<title>Search PG</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">Search PG</h3>

		<div class = "forms">
			<?php include('errors.php'); ?>
			<br />
			<form action = "SearchPG.php" method = "post">

				<div class = "form-group">
					<input type = "text" class="form-control" name = "location" placeholder = "Location">
				</div>

				<div class = "form-group">
					<select name = "pgType" class="form-control">
						<option value = "" disabled selected>Select PG Type</option>
						<option value = "male">Male</option>
						<option value = "female">Female</option>
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
							echo "PG Name: " . $x->pgName;
							echo "<br />";
							echo "Location: " . $x->location;
							echo "<br />";
							echo "PG Type: " . ucfirst($x->pgType);
							echo "<br />";
							echo "Rent: " . $x->rent;
							echo "<br />";
							echo "Vacancy: " . $x->vacancy;
							echo "<br />";
							echo "Contact: " . $x->owner;
							echo "<br />";
						echo "</p>";
					echo "</div>";
					echo "<hr />";
				}
				if (isset($_POST['submit']) && count($errors) == 0 && count($results) == 0) {
					echo "<p>No PG available</p>";
				}
			?>
		</div>

	</body>

</html>