<?php

	//error_reporting(E_ALL);
	//ini_set("display_errors","On");
	
	include 'session_check.php';
	include 'utils.php';
	require_once 'dbconnect.php';
	require_once 'PG.php';

	//session_start();
	//var_dump($_SESSION);

	echo "<h4>Your post is successful. Here are others looking for a PG similar to what you are offering.</h4>";

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

		    	$query = "SELECT * FROM NeedPG where location = '$location' AND pgType = '$pgType'";
			  	$data = mysqli_query($db, $query);
			  	//var_dump($data);
			  	if (mysqli_num_rows($data) > 0) {
			  		while ($row = mysqli_fetch_assoc($data)) {
			  			$resultpg = new PG("", $row['pgType'], $row['location'],
			  				$row['rent'], $row['vacancy'], $row['owner']
			  				);
			  			array_push($results, $resultpg);
			  		}
			  	}

				foreach ($results as $x) {
					echo '<div class = "">';
						echo "<p>";
							echo "Location: " . $x->location;
							echo "<br />";
							echo "PG Type: " . ucfirst($x->pgType);
							echo "<br />";
							echo "Preferred Rent: " . $x->rent;
							echo "<br />";
							echo "Vacancy: " . $x->vacancy;
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