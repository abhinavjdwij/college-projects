<?php

	require 'validations.php';
	require_once 'Job.php';
	
	class SearchJobManager {

	    public function validate($location, $type, $db) {
	    	
	    	$errors = array();
			
			if (empty($location)) { array_push($errors, "Location is required"); }

			if (empty($type)) { array_push($errors, "Job Type is required"); }

			return $errors;

	    }

	    public function search($location, $type, $db) {
	    	
	    	$results = array();

	    	$query = "SELECT * FROM JobVacancy where location = '" . $location
	    			. "' AND type = '". $type . "'";
		  	$data = mysqli_query($db, $query);

		  	if (mysqli_num_rows($data) > 0) {
		  		while ($row = mysqli_fetch_assoc($data)) {
		  			$resultjob = new Job(
		  				$row['location'], $row['type'], $row['salary'],
		  				$row['daysPerWeek'], $row['hoursPerDay'], $row['owner']
		  				);
		  			array_push($results, $resultjob);
		  		}
		  	}

			return $results;

	    }

	}

?>