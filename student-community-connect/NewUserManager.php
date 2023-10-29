<?php

	require 'validations.php';
	require_once 'Student.php';
	require_once 'EventOrganizer.php';
	require_once 'CollegeRepresentative.php';
	
	class NewUserManager {

	    public function validate($name, $emailID, $password, $age, $gender,
			$type, $organizerName, $collegeName, $address, $db) {
	    	
	    	$errors = array();

	    	if (empty($name)) { array_push($errors, "Name is required"); }

	    	if (empty($emailID)) { array_push($errors, "Email ID is required"); }
	    	else if (filter_var($emailID, FILTER_VALIDATE_EMAIL) === false) { array_push($errors, "Invalid Email ID"); }
	    	else if (user_exists($emailID, $db)) { array_push($errors, "Email ID already exists");}

	    	if (empty($password)) { array_push($errors, "Password is required"); }
			if (strlen($password) < 4) { array_push($errors, "Password must have 4 or more characters"); }
			if (spaces($password)) { array_push($errors, "Password cannot have spaces"); }

			if (empty($age)) { array_push($errors, "Age is required"); }
			if (is_numeric($age) === false) { array_push($errors, "Age must be an integer"); }
	    	
	    	if (empty($gender)) { array_push($errors, "Gender is required"); }

			if (empty($type)) { array_push($errors, "User Type is required"); }

			if ($type == "student") {
				if (empty($collegeName)) { array_push($errors, "College is required for Student"); }
				if (empty($address)) { array_push($errors, "Address is required for Student"); }
			}
			else if ($type == "cr") {
				if (empty($collegeName)) { array_push($errors, "College is required for College Representative"); }
			}
			else if ($type == "eventorganizer") {
				if (empty($organizerName)) { array_push($errors, "Organizer Name is required for Event Organizer"); }
			}
	    	
	    	return $errors;

	    }

	    public function create($name, $emailID, $password, $age, $gender,
			$type, $organizerName, $collegeName, $address, $db) {
	    	
	    	if ($type == "student") {
	    		$user = new Student($name, $emailID, $password, $age, $gender, $type, $address, $collegeName);
			}
			else if ($type == "cr") {
				$user = new CollegeRepresentative($name, $emailID, $password, $age, $gender, $type, $collegeName);
			}
			else if ($type == "eventorganizer") {
				$user = new EventOrganizer($name, $emailID, $password, $age, $gender, $type, $organizerName);
			}

			$query = "INSERT INTO User (name, emailID, password, age, gender, type, address, collegeName, organizerName) 
		  			VALUES('$name', '$emailID', '$password', $age, '$gender', '$type', '$address', '$collegeName', '$organizerName')";
	    	
		  	mysqli_query($db, $query);
		  	$_SESSION['emailID'] = $emailID;
		  	header("location: Profile.php");

	    }

	}

?>