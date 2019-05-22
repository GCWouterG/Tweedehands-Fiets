<?php
	$dbHost = "localhost";
	$dbUser = "wgosseling_tweedehandsfiets";
	$dbPass = "Scrum01!";
	$dbName = "wgosseling_tweedehands_fiets";
	
	$conn = new Mysqli($dbHost, $dbUser, $dbPass, $dbName);

	if($conn->connect_error) {
		$_SESSION['databaseError'] = true;
		//header("Location: index.php");
		echo "Fout";
	}
?>