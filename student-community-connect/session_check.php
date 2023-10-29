<?php
	session_start();
	if (!isset($_SESSION['emailID'])) {
	  	header('location: pleaselogin.php');
	}
?>