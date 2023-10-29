<?php

	//error_reporting(E_ALL);
	//ini_set("display_errors","On");
	
	include 'session_check.php';
	include 'utils.php';
	require_once 'dbconnect.php';
	require_once 'Job.php';

	//session_start();
	//var_dump($_SESSION);

	echo "<h4>Your post is successful. Here are others offering a Job similar to what you are looking for.</h4>";

	$location = $_GET["location"];
	$type = $_GET["type"];

?>


<!DOCTYPE html>

<html>

	<head>
		<title>Suggestions</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<div class = "viewpost">
			<?php

				$results = array();

		    	$query = "SELECT * FROM JobVacancy where location = '$location' AND type = '$type'";
			  	//echo $query;
			  	$data = mysqli_query($db, $query);
			  	//var_dump($data);
			  	if (mysqli_num_rows($data) > 0) {
			  		while ($row = mysqli_fetch_assoc($data)) {
			  			$resultpg = new Job(
			  				$row['location'], $row['type'], $row['salary'],
			  				$row['daysPerWeek'], $row['hoursPerDay'], $row['owner']
			  				);
			  			array_push($results, $resultpg);
			  		}
			  	}

				foreach ($results as $x) {
					echo '<div class = "">';
						echo "<p>";
							echo "Location: " . $x->location;
							echo "<br />";
							echo "Type: " . ucfirst($x->type);
							echo "<br />";
							echo "Salary: " . $x->salary;
							echo "<br />";
							echo "Days / Week: " . $x->daysPerWeek;
							echo "<br />";
							echo "Hours / Day: " . $x->hoursPerDay;
							echo "<br />";
							echo "Owner: " . $x->owner;
							echo "<br />";
						echo "</p>";
						//echo $delStr;
					echo "</div>";
				}
			?>
		</div>

	</body>

</html>