<?php

	require_once 'validations.php';
	require_once 'Job.php';

	class JobManager {

	    public function validate($location, $type, $salary, $daysPerWeek, $hoursPerDay, $owner, $db) {
	    	
	    	$errors = array();

	    	if (empty($location)) { array_push($errors, "Location is required"); }

	    	if (empty($type)) { array_push($errors, "Job Type is required"); }

	    	if (empty($salary)) { array_push($errors, "Salary is required"); }
	    	if (is_numeric($salary) === false) { array_push($errors, "Salary must be an integer"); }

	    	if (empty($daysPerWeek)) { array_push($errors, "Days / Week is required"); }

	    	if (empty($hoursPerDay)) { array_push($errors, "Hours / Day is required"); }

	    	if (empty($owner) || isStudent($owner, $db) === false) {
	    		array_push($errors, "Please Login as Student to post for giving coaching.");
	    	}
	    	
	    	return $errors;

	    }

	    public function createJob($location, $type, $salary, $daysPerWeek, $hoursPerDay, $owner, $db) {

	    	$newjob = new Job($location, $type, $salary, $daysPerWeek, $hoursPerDay, $owner);

	    	$newjob->createJob($db);

	    }

	    public function validateNeedJob($location, $interest, $workingHours, $owner, $db) {
	    	
	    	$errors = array();

	    	if (empty($location)) { array_push($errors, "Location is required"); }

	    	if (empty($interest)) { array_push($errors, "Interest is required"); }

	    	if (empty($workingHours)) { array_push($errors, "Working Hours is required"); }

	    	if (empty($owner) || isStudent($owner, $db) === false) {
	    		array_push($errors, "Please Login as Student to post for giving coaching.");
	    	}
	    	
	    	return $errors;

	    }

	    public function createNeedJob($location, $interest, $workingHours, $owner, $db) {

	    	$newjob = new Job($location, $interest, 0, 0, $workingHours, $owner);

	    	$newjob->createNeedJob($db);

	    }

	}

?>