<?php
	
	//error_reporting(E_ALL);
	//ini_set("display_errors","On");
	
	include 'session_check.php';

	//session_start();
	//var_dump($_SESSION);

?>

<!DOCTYPE html>

<html>

	<head>
		<title>Item Home Page</title>
		<?php include 'links.html'; ?>
	</head>

	<body>

		<h3 class = "text-center">Item Home Page</h3>

		<div class = "forms">

			<br />
			
			<form action = "PostSellItem.php">
				<div class = "text-center">
				<button type = "submit" class = "btn btn-primary btn-lg btn-block">Post - Sell Item</button>
				</div>
			</form>

			<br />

			<form action = "PostNeedItem.php">
				<div class = "text-center">
				<button type = "submit" class = "btn btn-primary btn-lg btn-block">Post - Need Item</button>
				</div>
			</form>

			<br />

			<form action = "SearchItem.php">
				<div class = "text-center">
				<button type = "submit" class = "btn btn-primary btn-lg btn-block">Search Item</button>
				</div>
			</form>

			<br />

		</div>

	</body>

</html>