<?php

	//error_reporting(E_ALL);
	//ini_set("display_errors","On");
	
	include 'session_check.php';
	include 'utils.php';
	require_once 'dbconnect.php';
	require_once 'SearchItemManager.php';

	//session_start();
	//var_dump($_SESSION);

	$errors = array();
	$results = array();

	if (isset($_POST['submit'])) {

		$itemType = $_POST['itemType'];

		$searchitemmanager = new SearchItemManager();
		$errors = $searchitemmanager->validate($itemType, $db);

		if (count($errors) == 0) {
			$results = $searchitemmanager->search($itemType, $db);
		}
	}

?>


<!DOCTYPE html>

<html>

	<head>
		<title>Search Item</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">Search Item</h3>

		<div class = "forms">
			<?php include('errors.php'); ?>
			<br />
			<form action = "SearchItem.php" method = "post">

				<div class = "form-group">
					<select name = "itemType" class="form-control">
						<option value = "" disabled selected>Select Item Type</option>
						<option value = "books">Books</option>
						<option value = "notes">Notes</option>
						<option value = "stationary">Stationary</option>
						<option value = "others">Others</option>
					</select>
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
				foreach ($results as $resultItem) {
					echo '<div class = "search">';
						echo "<p>";
							echo "Item Name: " . $resultItem->itemName;
							echo "<br />";
							echo "Quantity: " . $resultItem->quantity;
							echo "<br />";
							echo "Item Price: " . $resultItem->itemPrice;
							echo "<br />";
							echo "Contact : <a href = '#'>". $resultItem->owner . "</a>";
						echo "</p>";
					echo "</div>";
					echo "<br />";
				}
				if (isset($_POST['submit']) && count($errors) == 0 && count($results) == 0) {
					echo "<p>No Item available</p>";
				}
			?>
		</div>

	</body>

</html>