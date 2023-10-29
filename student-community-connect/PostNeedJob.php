<?php
	
	//error_reporting(E_ALL);
	//ini_set("display_errors","On");
	
	include 'session_check.php';
	require_once 'dbconnect.php';
	require_once 'JobManager.php';

	session_start();
	//var_dump($_SESSION);

	$errors = array();

	if (isset($_POST['submit'])) {

		$location = $_POST['location'];
		$interest = $_POST['interest'];
		$workingHours = $_POST['workingHours'];
		$owner = $_SESSION['emailID'];

		$jobmgr = new JobManager();
		$errors = $jobmgr->validateNeedJob($location, $interest, $workingHours, $owner, $db);

		if (count($errors) == 0) {
			$jobmgr->createNeedJob($location, $interest, $workingHours, $owner, $db);
		}

	}
?>

<!DOCTYPE html>

<html>

	<head>
		<title>Post - Need Job</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">Post - Need Job</h3>

		<div class = "forms">
			<?php include('errors.php'); ?>
			<br />
			<form action = "PostNeedJob.php" method = "post">
				
				<div class = "form-group">
					<input type = "text" class="form-control" name = "location" placeholder = "Location">
				</div>

				<div class = "form-group">
					<select name = "interest" class="form-control">
							<option value = "" disabled selected>Interest</option>
							<option value = "contentwriting">Content Writing</option>
							<option value = "appdevelopment">App Development</option>
							<option value = "webdevelopment">Web Development</option>
							<option value = "other">Others</option>
					</select>
				</div>
				
				<div class = "form-group">
					<select name = "workingHours" class="form-control">
							<option value = "" disabled selected>Working Hours / Day</option>
							<?php
							for ($i = 1; $i <= 12; $i++) {
								echo "<option value = \"${i}\">${i}</option>";
							}
							?>
					</select>
				</div>

				<div class = "text-center">
					<button type = "submit" name = "submit" class = "btn btn-primary btn-lg btn-block">Post</button>
				</div>

			</form>

			<br />

		</div>

	</body>

</html>