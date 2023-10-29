<?php

	//error_reporting(E_ALL);
	//ini_set("display_errors","On");
	
	include 'session_check.php';
	include 'utils.php';
	require_once 'dbconnect.php';
	require_once 'Item.php';

	//session_start();
	//var_dump($_SESSION);

	echo "<h4>Your post is successful. Here are others looking for similar item to what you are offering.</h4>";

	$itemType = $_GET["itemType"];

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

		    	$query = "SELECT * FROM NeedItem where itemType = '$itemType'";
			  	$data = mysqli_query($db, $query);
			  	//var_dump($data);
			  	if (mysqli_num_rows($data) > 0) {
			  		while ($row = mysqli_fetch_assoc($data)) {
			  			$resultitem = new Item($row['itemName'], $row['itemType'],
			  				0, 0, $row['owner']
			  				);
			  			array_push($results, $resultitem);
			  		}
			  	}

				foreach ($results as $x) {
					echo '<div class = "">';
						echo "<p>";
							echo "Item Name: " . $x->itemName;
							echo "<br />";
							echo "Item Type: " . ucfirst($x->itemType);
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