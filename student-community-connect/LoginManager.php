<?php

	require 'validations.php';
	require_once 'Student.php';
	require_once 'EventOrganizer.php';
	require_once 'CollegeRepresentative.php';
	
	class LoginManager {

	    public function validate($emailID, $password, $db) {
	    	
	    	$errors = array();
			
			if (empty($emailID)) { array_push($errors, "Email ID is required"); }
			if (empty($password)) { array_push($errors, "Password is required"); }
			if (invalid_credentials($emailID, $password, $db)) { array_push($errors, "Invalid Email ID / Password"); }

			return $errors;

	    }

	    public function loginUser($emailID, $password, $db) {
	    	
	    	$query = "SELECT * FROM User WHERE emailID = '$emailID' AND password = '$password'";
		  	$results = mysqli_query($db, $query);
		  	
		  	if (mysqli_num_rows($results) == 1) {
				$_SESSION['emailID'] = $emailID;
				header("location: Profile.php");
	  		}

	    }

	}

?>