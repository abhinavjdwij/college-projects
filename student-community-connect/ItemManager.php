<?php

	require_once 'validations.php';
	require_once 'Item.php';

	class ItemManager {

	    public function validateSell($itemName, $itemType, $quantity, $itemPrice, $owner, $db) {
	    	
	    	$errors = array();

	    	if (empty($itemName)) { array_push($errors, "Item Name is required"); }

	    	if (empty($itemType)) { array_push($errors, "Item Type is required"); }

	    	if (empty($quantity)) { array_push($errors, "Quantity is required"); }
	    	else if (is_numeric($quantity) === false) {
	    		array_push($errors, "Quantity must be an integer");
	    	}

	    	if (empty($itemPrice)) { array_push($errors, "Item Price is required"); }
	    	else if (is_numeric($itemPrice) === false) {
	    		array_push($errors, "Item Price must be an integer");
	    	}

	    	if (empty($owner) || isStudent($owner, $db) ===  false) {
	    		array_push($errors, "Please Login as Student to post an item for selling.");
	    	}
	    	
	    	return $errors;

	    }

	    public function createSell($itemName, $itemType, $quantity, $itemPrice, $owner, $db) {

	    	$newitem = new Item($itemName, $itemType, $quantity, $itemPrice, $owner);

			$newitem->createSell($db);

	    }

	    public function validateNeed($itemName, $itemType, $owner, $db) {
	    	
	    	$errors = array();

	    	if (empty($itemName)) { array_push($errors, "Item Name is required"); }

	    	if (empty($itemType)) { array_push($errors, "Item Type is required"); }

	    	if (empty($owner) || isStudent($owner, $db) ===  false) {
	    		array_push($errors, "Please Login as Student to post an item for selling.");
	    	}
	    	
	    	return $errors;

	    }

	    public function createNeed($itemName, $itemType, $owner, $db) {

	    	$newitem = new Item($itemName, $itemType, 0, 0, $owner);
			
			$newitem->createNeed($db);

	    }

	}

?>