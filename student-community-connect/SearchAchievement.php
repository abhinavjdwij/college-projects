<?php

	//error_reporting(E_ALL);
	//ini_set("display_errors","On");
	
	include 'session_check.php';
	include 'utils.php';
	require_once 'dbconnect.php';
	require_once 'SearchAchievementManager.php';

	//session_start();
	//var_dump($_SESSION);

	$errors = array();
	$results = array();

	if (isset($_POST['submit'])) {

		$collegeName = $_POST['collegeName'];

		$searchachievementmanager = new SearchAchievementManager();
		$errors = $searchachievementmanager->validate($collegeName, $db);

		if (count($errors) == 0) {
			$results = $searchachievementmanager->search($collegeName, $db);
		}
	}

?>


<!DOCTYPE html>

<html>

	<head>
		<title>Search Achievement</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">Search Achievement</h3>

		<div class = "forms">
			<?php include('errors.php'); ?>
			<br />
			<form action = "SearchAchievement.php" method = "post">

				<div class = "form-group">
					<input type = "text" class="form-control" name = "collegeName" placeholder = "College Name">
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
				foreach ($results as $resultAchievement) {
					echo '<div class = "search">';
						echo "<p>";
							echo "College Name: " . $resultAchievement->collegeName;
							echo "<br />";
							echo "Details: " . $resultAchievement->details;
						echo "</p>";
					echo "</div>";
					echo "<hr />";
				}
				if (isset($_POST['submit']) && count($errors) == 0 && count($results) == 0) {
					echo "<p>No Achievement available</p>";
				}
			?>
		</div>

	</body>

</html>