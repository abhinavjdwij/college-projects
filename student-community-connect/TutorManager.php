<?php

	require_once 'validations.php';
	require_once 'Tutor.php';

	class TutorManager {

	    public function validate($location, $subject, $fees, $daysPerWeek, $session, $owner, $db) {
	    	
	    	$errors = array();

	    	if (empty($location)) { array_push($errors, "Location is required"); }

	    	if (empty($subject)) { array_push($errors, "Subject is required"); }

	    	if (empty($fees)) { array_push($errors, "Fees is required"); }
	    	if (is_numeric($fees) === false) { array_push($errors, "Fees must be an integer"); }

	    	if (empty($daysPerWeek)) { array_push($errors, "Days / Week is required"); }

	    	if (empty($session)) { array_push($errors, "Session is required"); }

	    	if (empty($owner) || isStudent($owner, $db) === false) {
	    		array_push($errors, "Please Login as Student to post for giving coaching.");
	    	}
	    	
	    	return $errors;

	    }

	    public function createTutor($location, $subject, $fees, $daysPerWeek, $session, $owner, $db) {

	    	$newtutor = new Tutor($location, $subject, $fees, $daysPerWeek, $session, $owner);

	    	$newtutor->GiveCoaching($db);

	    }

	    public function validateNeedTutor($location, $subject, $numOfStudents, $owner, $db) {
	    	
	    	$errors = array();

	    	if (empty($location)) { array_push($errors, "Location is required"); }

	    	if (empty($subject)) { array_push($errors, "Subject is required"); }

	    	if (empty($numOfStudents)) { array_push($errors, "Number of Students is required"); }
	    	if (is_numeric($numOfStudents) === false) { array_push($errors, "Number of Students must be an integer"); }

	    	if (empty($owner) || isStudent($owner, $db) === false) {
	    		array_push($errors, "Please Login as Student to post for taking coaching.");
	    	}
	    	
	    	return $errors;

	    }

	    public function createNeedTutor($location, $subject, $numOfStudents, $owner, $db) {

	    	$newtutor = new Tutor($location, $subject, 0, 0, "", $owner);

	    	$newtutor->TakeCoaching($numOfStudents, $db);

	    }

	    

	}

?>