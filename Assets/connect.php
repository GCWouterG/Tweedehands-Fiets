<?php
	$dbHost = "localhost";
	$dbUser = "root";
	$dbPass = "";
	$dbName = "fietsen_site";
	
	$conn = new Mysqli($dbHost, $dbUser, $dbPass, $dbName);

	if($conn->connect_error) {
		$_SESSION['databaseError'] = true;
		header("Location: index.php");
	}
?>