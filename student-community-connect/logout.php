<?php
	session_start();
    session_destroy();
    unset($_SESSION['emailID']);
    header('location: Login.php');
?>