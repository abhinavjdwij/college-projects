<?php

	require 'validations.php';
	require_once 'Tutor.php';
	
	class SearchTutorManager {

	    public function validate($location, $subject, $db) {
	    	
	    	$errors = array();
			
			if (empty($location)) { array_push($errors, "Location is required"); }

			if (empty($subject)) { array_push($errors, "Subject is required"); }

			return $errors;

	    }

	    public function search($location, $subject, $db) {
	    	
	    	$results = array();

	    	$query = "SELECT * FROM GiveCoaching where location = '" . $location
	    			. "' AND subject = '". $subject . "'";
		  	$data = mysqli_query($db, $query);

		  	if (mysqli_num_rows($data) > 0) {
		  		while ($row = mysqli_fetch_assoc($data)) {
		  			$resultjob = new Tutor(
		  				$row['location'], $row['subject'], $row['fees'],
		  				$row['daysPerWeek'], $row['session'], $row['owner']
		  				);
		  			array_push($results, $resultjob);
		  		}
		  	}

			return $results;

	    }

	}

?>