<?php

	require_once 'validations.php';
	require_once 'Event.php';

	class EventManager {

	    public function validate($eventName, $eventType, $details, $organizer, $db) {
	    	
	    	$errors = array();

	    	if (empty($eventName)) { array_push($errors, "Event Name is required"); }

	    	if (empty($eventType)) { array_push($errors, "Event Type is required"); }

	    	if (empty($details)) { array_push($errors, "Details is required"); }

	    	if (empty($organizer) || isEventOrganizer($organizer, $db) ===  false) {
	    		array_push($errors, "Please Login as Event Organizer to post an event.");
	    	}
	    	
	    	return $errors;

	    }

	    public function create($eventName, $eventType, $details, $organizer, $db) {

	    	$newevent = new Event($eventName, $eventType, $details, $organizer);

			$query = "INSERT INTO Event (eventName, eventType, details, organizer) 
		  			VALUES('$eventName', '$eventType', '$details', '$organizer')";
	    	
		  	mysqli_query($db, $query);
		  	header("location: done.php");

	    }

	}

?>