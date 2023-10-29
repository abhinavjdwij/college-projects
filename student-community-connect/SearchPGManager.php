<?php

	require 'validations.php';
	require_once 'PG.php';
	
	class SearchPGManager {

	    public function validate($location, $pgType, $db) {
	    	
	    	$errors = array();
			
			if (empty($location)) { array_push($errors, "Location is required"); }

			if (empty($pgType)) { array_push($errors, "PG Type is required"); }

			return $errors;

	    }

	    public function search($location, $pgType, $db) {
	    	
	    	$results = array();

	    	$query = "SELECT * FROM PGVacancy where location = '" . $location
	    			. "' AND pgType = '". $pgType . "'";
		  	$data = mysqli_query($db, $query);

		  	if (mysqli_num_rows($data) > 0) {
		  		while ($row = mysqli_fetch_assoc($data)) {
		  			$resultpg = new PG(
		  				$row['pgName'], $row['pgType'], $row['location'],
		  				$row['rent'], $row['vacancy'], $row['owner']
		  				);
		  			array_push($results, $resultpg);
		  		}
		  	}

			return $results;

	    }

	}

?>