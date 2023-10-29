<?php
	
	//error_reporting(E_ALL);
	//ini_set("display_errors","On");
	
	include 'session_check.php';
	require_once 'dbconnect.php';
	require_once 'ItemManager.php';

	session_start();
	//var_dump($_SESSION);

	$errors = array();

	if (isset($_POST['submit'])) {

		$itemName = $_POST['itemName'];
		$itemType = $_POST['itemType'];
		$quantity = $_POST['quantity'];
		$itemPrice = $_POST['itemPrice'];
		$owner = $_SESSION['emailID'];

		$itemmanager = new ItemManager();
		$errors = $itemmanager->validateSell($itemName, $itemType, $quantity, $itemPrice, $owner, $db);

		if (count($errors) == 0) {
			$itemmanager->createSell($itemName, $itemType, $quantity, $itemPrice, $owner, $db);
		}

	}
?>

<!DOCTYPE html>

<html>

	<head>
		<title>Post - Sell Items</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">Post - Sell Items</h3>

		<div class = "forms">
			<?php include('errors.php'); ?>
			<br />
			<form action = "PostSellItem.php" method = "post">
				<div class = "form-group">
					<input type = "text" class="form-control" name = "itemName" placeholder = "Item Name">
				</div>

				<div class = "form-group">
					<select name = "itemType" class="form-control">
						<option value = "" disabled selected>Select Item Type</option>
						<option value = "books">Books</option>
						<option value = "notes">Notes</option>
						<option value = "stationary">Stationary</option>
						<option value = "others">Others</option>
					</select>
				</div>

				<div class = "form-group">
					<input type = "text" class="form-control" name = "quantity" placeholder = "Quantity">
				</div>
				
				<div class = "form-group">
					<input type = "text" class="form-control" name = "itemPrice" placeholder = "Item Price">
				</div>
				
				<div class = "text-center">
					<button type = "submit" name = "submit" class = "btn btn-primary btn-lg btn-block">Post</button>
				</div>

			</form>

			<br />

		</div>

	</body>

</html>