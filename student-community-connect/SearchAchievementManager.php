<?php

	require 'validations.php';
	require_once 'Achievement.php';
	
	class SearchAchievementManager {

	    public function validate($collegeName, $db) {
	    	
	    	$errors = array();
			
			if (empty($collegeName)) { array_push($errors, "College Name is required"); }

			return $errors;

	    }

	    public function search($collegeName, $db) {
	    	
	    	$results = array();

	    	$query = "SELECT * FROM Achievement where collegeName = '" . $collegeName . "'";
		  	$data = mysqli_query($db, $query);

		  	if (mysqli_num_rows($data) > 0) {
		  		while ($row = mysqli_fetch_assoc($data)) {
		  			$resultAchievement = new Achievement(
		  				$row['collegeName'], $row['details']
		  				);
		  			array_push($results, $resultAchievement);
		  		}
		  	}

			return $results;

	    }

	}

?>