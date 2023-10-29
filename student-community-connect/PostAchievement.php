<?php
	
	//error_reporting(E_ALL);
	//ini_set("display_errors","On");
	
	include 'session_check.php';
	require_once 'dbconnect.php';
	require_once 'AchievementManager.php';

	session_start();
	//var_dump($_SESSION);

	$errors = array();

	if (isset($_POST['submit'])) {

		$collegeName = $_POST['collegeName'];
		$details = $_POST['details'];
		$user = $_SESSION['emailID'];

		$achievementmanager = new AchievementManager();
		$errors = $achievementmanager->validate($collegeName, $details, $user, $db);

		if (count($errors) == 0) {
			$achievementmanager->create($collegeName, $details, $user, $db);
		}

	}
?>

<!DOCTYPE html>

<html>

	<head>
		<title>Post - Achievement</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">Post - College Achievement</h3>

		<div class = "forms">
			<?php include('errors.php'); ?>
			<br />
			<form action = "PostAchievement.php" method = "post">

				<div class = "form-group">
					<input type = "text" class="form-control" name = "collegeName" placeholder = "College Name">
				</div>

				<div class = "form-group">
					<input type = "text" class="form-control" name = "details" placeholder = "Achievement Details">
				</div>

				<div class = "text-center">
					<button type = "submit" name = "submit" class = "btn btn-primary btn-lg btn-block">Post</button>
				</div>

			</form>

			<br />

		</div>

	</body>

</html>