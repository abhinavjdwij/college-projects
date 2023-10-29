<?php

	require 'validations.php';
	require_once 'Item.php';
	
	class SearchItemManager {

	    public function validate($itemType, $db) {
	    	
	    	$errors = array();
			
			if (empty($itemType)) { array_push($errors, "Item Type is required"); }

			return $errors;

	    }

	    public function search($itemType, $db) {
	    	
	    	$results = array();

	    	$query = "SELECT * FROM SellItem where itemType = '" . $itemType . "'";
		  	$data = mysqli_query($db, $query);

		  	if (mysqli_num_rows($data) > 0) {
		  		while ($row = mysqli_fetch_assoc($data)) {
		  			$resultAchievement = new Item(
		  				$row['itemName'], $row['itemType'],
		  				$row['quantity'], $row['itemPrice'],
		  				$row['owner']
		  				);
		  			array_push($results, $resultAchievement);
		  		}
		  	}

			return $results;

	    }

	}

?>