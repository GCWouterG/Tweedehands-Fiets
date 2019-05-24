<?php
	$dbHost = "localhost";
	$dbUser = "root";
	$dbPass = "";
	$dbName = "tweedehandsfietsen";
	
	$conn = new Mysqli($dbHost, $dbUser, $dbPass, $dbName);

	if($conn->connect_error) {
		$_SESSION['databaseError'] = true;
		//header("Location: index.php");
		echo "Fout";
	}
?>