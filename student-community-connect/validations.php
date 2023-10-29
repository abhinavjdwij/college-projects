<?php

	function spaces($s) {
		return (strpos($s, ' ') !== false);
	}

	function user_exists($emailID, $db) {
		$user_check_query = "SELECT * FROM User WHERE emailID = '$emailID' LIMIT 1";
		$results = mysqli_query($db, $user_check_query);
		return (mysqli_num_rows($results) > 0);
	}

	function invalid_credentials($emailID, $password, $db) {
		$query = "SELECT * FROM User WHERE emailID = '$emailID' AND password = '$password'";
		$results = mysqli_query($db, $query);
		return (mysqli_num_rows($results) != 1);
	}

	function isEventOrganizer($emailID, $db) {
		$user_check_query = "SELECT * FROM User WHERE emailID = '$emailID' LIMIT 1";
		$results = mysqli_query($db, $user_check_query);
		if (mysqli_num_rows($results) > 0) {
	  		while ($row = mysqli_fetch_assoc($results)) {
	  			return ($row['type'] == "eventorganizer");
	  		}
	  	}
	}

	function isCR($emailID, $db) {
		$user_check_query = "SELECT * FROM User WHERE emailID = '$emailID' LIMIT 1";
		$results = mysqli_query($db, $user_check_query);
		if (mysqli_num_rows($results) > 0) {
	  		while ($row = mysqli_fetch_assoc($results)) {
	  			return ($row['type'] == "cr");
	  		}
	  	}
	}

	function isStudent($emailID, $db) {
		$user_check_query = "SELECT * FROM User WHERE emailID = '$emailID' LIMIT 1";
		$results = mysqli_query($db, $user_check_query);
		if (mysqli_num_rows($results) > 0) {
	  		while ($row = mysqli_fetch_assoc($results)) {
	  			return ($row['type'] == "student");
	  		}
	  	}
	}

?>