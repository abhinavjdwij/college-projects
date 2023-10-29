<?php

	require_once 'validations.php';
	require_once 'Achievement.php';

	class AchievementManager {

	    public function validate($collegeName, $details, $user, $db) {
	    	
	    	$errors = array();

	    	if (empty($collegeName)) { array_push($errors, "College Name is required"); }

	    	if (empty($details)) { array_push($errors, "Details is required"); }

	    	if (empty($user) || isCR($user, $db) === false) {
	    		array_push($errors, "Please Login as College Representative to post an achievement.");
	    	}
	    	
	    	return $errors;

	    }

	    public function create($collegeName, $details, $owner, $db) {

	    	$newachievement = new Achievement($collegeName, $details, $owner);

	    	$newachievement->create($db);

	    }

	    

	}

?>