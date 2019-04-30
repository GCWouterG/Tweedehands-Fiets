<?php
	$dbHost = "localhost";
	$dbUser = "root";
	$dbPass = "";
	$dbName = "tweedehands_fiets";

	$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

	if($conn->connect_error) {
		session_start();
		$_SESSION['databaseError'] = true;
		header('Location: index.php');
	}
	
?>