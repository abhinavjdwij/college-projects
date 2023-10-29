<?php

	//error_reporting(E_ALL);
	//ini_set("display_errors","On");
	
	include 'session_check.php';
	include 'utils.php';
	require_once 'dbconnect.php';
	require_once 'PG.php';

	//session_start();
	//var_dump($_SESSION);

	echo "<h4>Your post is successful. Here are others offering a PG similar to what you are looking for.</h4>";

	$location = $_GET["location"];
	$pgType = $_GET["pgType"];

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

		    	$query = "SELECT * FROM PGVacancy where location = '$location' AND pgType = '$pgType'";
			  	$data = mysqli_query($db, $query);
			  	//var_dump($data);
			  	if (mysqli_num_rows($data) > 0) {
			  		while ($row = mysqli_fetch_assoc($data)) {
			  			$resultpg = new PG(
			  				$row['pgName'], $row['pgType'], $row['location'],
			  				$row['rent'], $row['vacancy'], $row['owner']
			  				);
			  			array_push($results, $resultpg);
			  		}
			  	}

				foreach ($results as $x) {
					echo '<div class = "">';
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
							echo "Owner: " . $x->owner;
							echo "<br />";
						echo "</p>";
					echo "</div>";
				}
			?>
		</div>

	</body>

</html>