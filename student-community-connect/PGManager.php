<?php

	require 'validations.php';
	require_once 'PG.php';
	
	class PGManager {

	    public function validatePGVacancy($pgName, $pgType, $location,
			$rent, $vacancy, $owner, $db) {
	    	
	    	$errors = array();

	    	if (empty($pgName)) { array_push($errors, "PG Name is required"); }

	    	if (empty($pgType)) { array_push($errors, "PG Type is required"); }

	    	if (empty($location)) { array_push($errors, "Location is required"); }

	    	if (empty($rent)) { array_push($errors, "Rent is required"); }
	    	if (is_numeric($rent) === false) { array_push($errors, "Rent must be a number"); }

	    	if (empty($vacancy)) { array_push($errors, "Vacancy is required"); }
	    	if (is_numeric($vacancy) === false) { array_push($errors, "Number of vacancies must be an integer"); }

	    	if (empty($owner) || isStudent($owner, $db) ===  false) {
	    		array_push($errors, "Please Login as Student to post an item for selling.");
	    	}

			return $errors;

	    }

	    public function postPGvacancy($pgName, $pgType, $location,
			$rent, $vacancy, $owner, $db) {

	    	$newpg = new PG($pgName, $pgType, $location, $rent, $vacancy, $owner);

	    	$newpg->postPGVacancy($db);

	    }

	    public function validateNeedPG($pgType, $location, $rent, $vacancy, $owner, $db) {
	    	
	    	$errors = array();

	    	if (empty($pgType)) { array_push($errors, "PG Type is required"); }

	    	if (empty($location)) { array_push($errors, "Location is required"); }

	    	if (empty($rent)) { array_push($errors, "Rent is required"); }
	    	if (is_numeric($rent) === false) { array_push($errors, "Rent must be a number"); }

	    	if (empty($vacancy)) { array_push($errors, "Number of People is required"); }
	    	if (is_numeric($vacancy) === false) { array_push($errors, "Number of People must be an integer"); }

	    	if (empty($owner) || isStudent($owner, $db) ===  false) {
	    		array_push($errors, "Please Login as Student to post an item for selling.");
	    	}

			return $errors;

	    }

	    public function createNeedPG($pgType, $location,
			$rent, $vacancy, $owner, $db) {

	    	$newpg = new PG("", $pgType, $location, $rent, $vacancy, $owner);

	    	$newpg->createNeedPG($db);

	    }

	    /*
	    public function validate_need_pg($pgType, $location, $budget, $num_of_people, $db) {
	    	
	    	$errors = array();

	    	if (empty($pgType)) { array_push($errors, "PG Type is required"); }

	    	if (empty($location)) { array_push($errors, "Location is required"); }

	    	if (empty($budget)) { array_push($errors, "Budget for Rent is required"); }
	    	else if (is_numeric($budget) === false) { array_push($errors, "Budget for Rent must be an integer"); }

	    	if (empty($num_of_people)) { array_push($errors, "No. of People is required"); }
	    	else if (is_numeric($num_of_people) === false) { array_push($errors, "No. Of People must be a number"); }

			return $errors;

	    }

	    public function post_need_pg($pgType, $location, $budget, $num_of_people, $owner, $db) {
	    	
	    	$query = "INSERT INTO need_pg (pgType, location, budget, num_of_people, owner) 
		  			  VALUES('$pgType','$location', $budget, $num_of_people, '$owner')";
		  	mysqli_query($db, $query);
		  	header("location: done.php");

	    }
	    */

	}

?>