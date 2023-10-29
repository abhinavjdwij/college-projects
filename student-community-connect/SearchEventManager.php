<?php

	require 'validations.php';
	require_once 'Event.php';
	
	class SearchEventManager {

	    public function validate($eventType, $db) {
	    	
	    	$errors = array();
			
			if (empty($eventType)) { array_push($errors, "Event Type is required"); }

			return $errors;

	    }

	    public function search($eventType, $db) {
	    	
	    	$results = array();

	    	$query = "SELECT * FROM Event where eventType = '" . $eventType . "'";
		  	$data = mysqli_query($db, $query);

		  	if (mysqli_num_rows($data) > 0) {
		  		while ($row = mysqli_fetch_assoc($data)) {
		  			$resultEvent = new Event(
		  				$row['eventName'], $row['eventType'],
		  				$row['details'], $row['organizer']
		  				);
		  			array_push($results, $resultEvent);
		  		}
		  	}

			return $results;

	    }

	}

?>