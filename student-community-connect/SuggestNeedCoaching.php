<?php

	//error_reporting(E_ALL);
	//ini_set("display_errors","On");
	
	include 'session_check.php';
	include 'utils.php';
	require_once 'dbconnect.php';
	require_once 'Tutor.php';

	//session_start();
	//var_dump($_SESSION);

	echo "<h4>Your post is successful. Here are others looking for coaching similar to what you are offering.</h4>";

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

		    	$query = "SELECT * FROM TakeCoaching where location = '$location' AND subject = '$subject'";
			  	$data = mysqli_query($db, $query);
			  	//var_dump($data);
			  	if (mysqli_num_rows($data) > 0) {
			  		while ($row = mysqli_fetch_assoc($data)) {
			  			$resulttutor = new Tutor(
			  				$row['location'], $row['subject'], $row['numOfStudents'],
			  				0, "", $row['owner']
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
							$delStr .= "subject = '$x->subject'";
							echo "<br />";
							echo "Number Of Students: " . $x->fees;
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