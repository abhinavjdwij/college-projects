<?php
	session_start();
	require_once 'dbconnect.php';
	$delStr = $_GET['query'];
	echo "$delStr";
	mysqli_query($db, $delStr);
	header('location: ViewPosts.php');
?>