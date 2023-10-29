<?php

	//error_reporting(E_ALL);
	//ini_set("display_errors","On");
	
	include 'session_check.php';
	include 'utils.php';
	require_once 'dbconnect.php';
	require_once 'Tutor.php';

	//session_start();
	//var_dump($_SESSION);

	echo "<h4>Your post is successful. Here are others providing coaching similar to what you are looking for.</h4>";

	$location = $_GET["location"];
	$subject = $_GET["subject"];

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

		    	$query = "SELECT * FROM GiveCoaching where location = '$location' AND subject = '$subject'";
			  	$data = mysqli_query($db, $query);
			  	//var_dump($data);
			  	if (mysqli_num_rows($data) > 0) {
			  		while ($row = mysqli_fetch_assoc($data)) {
			  			$resulttutor = new Tutor(
			  				$row['location'], $row['subject'], $row['fees'],
			  				$row['daysPerWeek'], $row['session'], $row['owner']
			  				);
			  			array_push($results, $resulttutor);
			  		}
			  	}

				foreach ($results as $x) {
					echo '<div class = "">';
						echo "<p>";
							echo "Location: " . ucfirst($x->location);
							echo "<br />";
							echo "Subject: " . ucfirst($x->subject);
							echo "<br />";
							echo "Fees: " . $x->fees;
							echo "<br />";
							echo "Days / Week: " . $x->daysPerWeek;
							echo "<br />";
							echo "Session: " . ucfirst($x->session);
							echo "<br />";
							echo "Owner: " . $x->owner;
							echo "<br />";
						echo "</p>";
					echo "</div>";
				}
			?>
		</div>

	</body>

</html>