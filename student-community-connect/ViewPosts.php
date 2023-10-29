<?php

	error_reporting(E_ALL);
	ini_set("display_errors","On");
	
	include 'session_check.php';
	include 'utils.php';
	require_once 'dbconnect.php';
	require_once 'PG.php';
	require_once 'Item.php';
	require_once 'Tutor.php';
	require_once 'Job.php';
	require_once 'Achievement.php';
	require_once 'Event.php';

	//session_start();
	//var_dump($_SESSION);

	$owner = $_SESSION['emailID'];


?>


<!DOCTYPE html>

<html>

	<head>
		<title>View Posts</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">View Posts by <?php echo $owner; ?></h3>

		<div class = "viewpost">
			<h4> PG Vacancy Posts </h4>
			<?php

				$results = array();

		    	$query = "SELECT * FROM PGVacancy where owner = '" . $owner . "'";
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
					$delStr = "DELETE FROM PGVacancy where owner = '" . $owner . "' AND ";
					echo '<div class = "">';
						echo "<p>";
							echo "PG Name: " . $x->pgName;
							$delStr .= "pgName = '$x->pgName' AND ";
							echo "<br />";
							echo "Location: " . $x->location;
							$delStr .= "location = '$x->location' AND ";
							echo "<br />";
							echo "PG Type: " . ucfirst($x->pgType);
							$delStr .= "pgType = '$x->pgType' AND ";
							echo "<br />";
							echo "Rent: " . $x->rent;
							$delStr .= "rent = $x->rent AND ";
							echo "<br />";
							echo "Vacancy: " . $x->vacancy;
							$delStr .= "vacancy = $x->vacancy";
							echo "<br />";
							echo "<a href = \"DeletePosts.php?query=$delStr\">Delete This Post</a>";
							echo "<br />";
						echo "</p>";
						//echo $delStr;
					echo "</div>";
				}
			?>
		</div>

		<div class = "viewpost">
			<h4> Need PG Posts </h4>
			<?php

				$results = array();

		    	$query = "SELECT * FROM NeedPG where owner = '" . $owner . "'";
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
					$delStr = "DELETE FROM NeedPG where owner = '" . $owner . "' AND ";
					echo '<div class = "">';
						echo "<p>";
							//echo "PG Name: " . $x->pgName;
							//$delStr .= "pgName = '$x->pgName' AND ";
							//echo "<br />";
							echo "Location: " . $x->location;
							$delStr .= "location = '$x->location' AND ";
							echo "<br />";
							echo "PG Type: " . ucfirst($x->pgType);
							$delStr .= "pgType = '$x->pgType' AND ";
							echo "<br />";
							echo "Rent: " . $x->rent;
							$delStr .= "rent = $x->rent AND ";
							echo "<br />";
							echo "Vacancy: " . $x->vacancy;
							$delStr .= "vacancy = $x->vacancy";
							echo "<br />";
							echo "<a href = \"DeletePosts.php?query=$delStr\">Delete This Post</a>";
							echo "<br />";
						echo "</p>";
						//echo $delStr;
					echo "</div>";
				}
			?>
		</div>

		<div class = "viewpost">
			<h4> Sell Item Posts </h4>
			<?php

				$results = array();

		    	$query = "SELECT * FROM SellItem where owner = '" . $owner . "'";
			  	$data = mysqli_query($db, $query);
			  	//var_dump($data);
			  	if (mysqli_num_rows($data) > 0) {
			  		while ($row = mysqli_fetch_assoc($data)) {
			  			$resultitem = new Item($row['itemName'], $row['itemType'],
			  				$row['quantity'], $row['itemPrice'], $row['owner']
			  				);
			  			array_push($results, $resultitem);
			  		}
			  	}

				foreach ($results as $x) {
					$delStr = "DELETE FROM SellItem where owner = '" . $owner . "' AND ";
					echo '<div class = "">';
						echo "<p>";
							echo "Item Name: " . $x->itemName;
							$delStr .= "itemName = '$x->itemName' AND ";
							echo "<br />";
							echo "Item Type: " . ucfirst($x->itemType);
							$delStr .= "itemType = '$x->itemType' AND ";
							echo "<br />";
							echo "Quantity: " . $x->quantity;
							$delStr .= "quantity = $x->quantity AND ";
							echo "<br />";
							echo "Item Price: " . $x->itemPrice;
							$delStr .= "itemPrice = $x->itemPrice";
							echo "<br />";
							echo "<a href = \"DeletePosts.php?query=$delStr\">Delete This Post</a>";
							echo "<br />";
						echo "</p>";
						//echo $delStr;
					echo "</div>";
				}
			?>
		</div>

		<div class = "viewpost">
			<h4> Need Item Posts </h4>
			<?php

				$results = array();

		    	$query = "SELECT * FROM NeedItem where owner = '" . $owner . "'";
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
					$delStr = "DELETE FROM NeedItem where owner = '" . $owner . "' AND ";
					echo '<div class = "">';
						echo "<p>";
							echo "Item Name: " . $x->itemName;
							$delStr .= "itemName = '$x->itemName' AND ";
							echo "<br />";
							echo "Item Type: " . ucfirst($x->itemType);
							$delStr .= "itemType = '$x->itemType'";
							echo "<br />";
							/*echo "Quantity: " . $x->quantity;
							$delStr .= "quantity = $x->quantity AND ";
							echo "<br />";
							echo "Item Price: " . $x->itemPrice;
							$delStr .= "itemPrice = $x->itemPrice";
							echo "<br />";*/
							echo "<a href = \"DeletePosts.php?query=$delStr\">Delete This Post</a>";
							echo "<br />";
						echo "</p>";
						//echo $delStr;
					echo "</div>";
				}
			?>
		</div>

		<div class = "viewpost">
			<h4> Provide Coaching Posts </h4>
			<?php

				$results = array();

		    	$query = "SELECT * FROM GiveCoaching where owner = '" . $owner . "'";
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
					$delStr = "DELETE FROM GiveCoaching where owner = '" . $owner . "' AND ";
					echo '<div class = "">';
						echo "<p>";
							echo "Location: " . ucfirst($x->location);
							$delStr .= "location = '$x->location' AND ";
							echo "<br />";
							echo "Subject: " . ucfirst($x->subject);
							$delStr .= "subject = '$x->subject' AND ";
							echo "<br />";
							echo "Fees: " . $x->fees;
							$delStr .= "fees = $x->fees AND ";
							echo "<br />";
							echo "Days / Week: " . $x->daysPerWeek;
							$delStr .= "daysPerWeek = $x->daysPerWeek AND ";
							echo "<br />";
							echo "Session: " . ucfirst($x->session);
							$delStr .= "session = '$x->session'";
							echo "<br />";
							echo "<a href = \"DeletePosts.php?query=$delStr\">Delete This Post</a>";
							echo "<br />";
						echo "</p>";
						//echo $delStr;
					echo "</div>";
				}
			?>
		</div>

		<div class = "viewpost">
			<h4> Need Coaching Posts </h4>
			<?php

				$results = array();

		    	$query = "SELECT * FROM TakeCoaching where owner = '" . $owner . "'";
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
					$delStr = "DELETE FROM TakeCoaching where owner = '" . $owner . "' AND ";
					echo '<div class = "">';
						echo "<p>";
							echo "Location: " . ucfirst($x->location);
							$delStr .= "location = '$x->location' AND ";
							echo "<br />";
							echo "Subject: " . ucfirst($x->subject);
							$delStr .= "subject = '$x->subject'";
							echo "<br />";
							echo "Number Of Students: " . $x->fees;
							//$delStr .= "fees = $x->fees AND ";
							echo "<br />";
							/*
							echo "Days / Week: " . $x->daysPerWeek;
							$delStr .= "daysPerWeek = $x->daysPerWeek AND ";
							echo "<br />";
							echo "Session: " . ucfirst($x->session);
							$delStr .= "session = '$x->session'";
							echo "<br />";*/
							echo "<a href = \"DeletePosts.php?query=$delStr\">Delete This Post</a>";
							echo "<br />";
						echo "</p>";
						//echo $delStr;
					echo "</div>";
				}
			?>
		</div>

		<div class = "viewpost">
			<h4> Job Availability Posts </h4>
			<?php

				$results = array();

		    	$query = "SELECT * FROM JobVacancy where owner = '" . $owner . "'";
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
					$delStr = "DELETE FROM JobVacancy where owner = '" . $owner . "' AND ";
					echo '<div class = "">';
						echo "<p>";
							echo "Location: " . $x->location;
							$delStr .= "location = '$x->location' AND ";
							echo "<br />";
							echo "Type: " . ucfirst($x->type);
							$delStr .= "type = '$x->type' AND ";
							echo "<br />";
							echo "Salary: " . $x->salary;
							$delStr .= "salary = $x->salary AND ";
							echo "<br />";
							echo "Days / Week: " . $x->daysPerWeek;
							$delStr .= "daysPerWeek = $x->daysPerWeek AND ";
							echo "<br />";
							echo "Hours / Day: " . $x->hoursPerDay;
							$delStr .= "hoursPerDay = $x->hoursPerDay";
							echo "<br />";
							echo "<a href = \"DeletePosts.php?query=$delStr\">Delete This Post</a>";
							echo "<br />";
						echo "</p>";
						//echo $delStr;
					echo "</div>";
				}
			?>
		</div>

		<div class = "viewpost">
			<h4> Need Job Posts </h4>
			<?php

				$results = array();

		    	$query = "SELECT * FROM NeedJob where owner = '" . $owner . "'";
			  	$data = mysqli_query($db, $query);
			  	//var_dump($data);
			  	if (mysqli_num_rows($data) > 0) {
			  		while ($row = mysqli_fetch_assoc($data)) {
			  			$resultpg = new Job(
			  				$row['location'], $row['interest'], 0,
			  				0, $row['workingHours'], $row['owner']
			  				);
			  			array_push($results, $resultpg);
			  		}
			  	}

				foreach ($results as $x) {
					$delStr = "DELETE FROM NeedJob where owner = '" . $owner . "' AND ";
					echo '<div class = "">';
						echo "<p>";
							echo "Location: " . $x->location;
							$delStr .= "location = '$x->location' AND ";
							echo "<br />";
							echo "Interest: " . ucfirst($x->type);
							$delStr .= "interest = '$x->type' AND ";
							echo "<br />";
							/*echo "Salary: " . $x->salary;
							$delStr .= "salary = $x->salary AND ";
							echo "<br />";
							echo "Days / Week: " . $x->daysPerWeek;
							$delStr .= "daysPerWeek = $x->daysPerWeek AND ";
							echo "<br />";*/
							echo "Working Hours / Day: " . $x->hoursPerDay;
							$delStr .= "workingHours = $x->hoursPerDay";
							echo "<br />";
							echo "<a href = \"DeletePosts.php?query=$delStr\">Delete This Post</a>";
							echo "<br />";
						echo "</p>";
						//echo $delStr;
					echo "</div>";
				}
			?>
		</div>

		<div class = "viewpost">
			<h4> Achievement Posts </h4>
			<?php

				$results = array();

		    	$query = "SELECT * FROM Achievement where owner = '" . $owner . "'";
			  	$data = mysqli_query($db, $query);
			  	//var_dump($data);
			  	if (mysqli_num_rows($data) > 0) {
			  		while ($row = mysqli_fetch_assoc($data)) {
			  			$resultpg = new Achievement(
			  				$row['collegeName'], $row['details'], $row['owner']
			  				);
			  			array_push($results, $resultpg);
			  		}
			  	}

				foreach ($results as $x) {
					$delStr = "DELETE FROM Achievement where owner = '" . $owner . "' AND ";
					echo '<div class = "">';
						echo "<p>";
							echo "College Name: " . ucfirst($x->collegeName);
							$delStr .= "collegeName = '$x->collegeName' AND ";
							echo "<br />";
							echo "Details: " . ucfirst($x->details);
							$delStr .= "details = '$x->details'";
							echo "<br />";
							echo "<a href = \"DeletePosts.php?query=$delStr\">Delete This Post</a>";
							echo "<br />";
						echo "</p>";
						//echo $delStr;
					echo "</div>";
				}
			?>
		</div>

		<div class = "viewpost">
			<h4> Event Posts </h4>
			<?php

				$results = array();

		    	$query = "SELECT * FROM Event where organizer = '" . $owner . "'";
			  	$data = mysqli_query($db, $query);
			  	//var_dump($data);
			  	if (mysqli_num_rows($data) > 0) {
			  		while ($row = mysqli_fetch_assoc($data)) {
			  			$resultevent = new Event(
			  				$row['eventName'], $row['eventType'],
			  				$row['details'], $row['organizer']
			  				);
			  			array_push($results, $resultevent);
			  		}
			  	}

				foreach ($results as $x) {
					$delStr = "DELETE FROM Event where organizer = '" . $owner . "' AND ";
					echo '<div class = "">';
						echo "<p>";
							echo "Event Name: " . ucfirst($x->eventName);
							$delStr .= "eventName = '$x->eventName' AND ";
							echo "<br />";
							echo "Event Type: " . ucfirst($x->eventType);
							$delStr .= "eventType = '$x->eventType' AND ";
							echo "<br />";
							echo "Details: " . ucfirst($x->details);
							$delStr .= "details = '$x->details'";
							echo "<br />";
							echo "<a href = \"DeletePosts.php?query=$delStr\">Delete This Post</a>";
							echo "<br />";
						echo "</p>";
						//echo $delStr;
					echo "</div>";
				}
			?>
		</div>

	</body>

</html>