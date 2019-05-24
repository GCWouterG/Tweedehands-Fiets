<?php
	$pageTitle = "Login";
	require 'header.php';

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Naamloos document</title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	
	<link rel="stylesheet" type="text/css" href="login-style.css">
	
</head>

<body>
	<br> <br>
	<div id="container">
	<div class="row">
		<div class="col-md-5">
			<h1> Al een account?</h1>
				<form>
					<input type="email" class="form" placeholder="Gebruikersnaam" required> <br>
					<input type="password" class="form" placeholder="Wachtwoord" required> <br>
					<input type="submit" class="submit" value="Login en ga verder">
				</form>
		</div>
	
		<div class="col-md-2">
			<div class="vertical-Line"></div>
		</div>
		
		<div class="col-md-5">
			<h1> Registreer</h1>
				<form>
					<input type="email" class="form" placeholder="E-mailadres" required> <br>
					<input type="password" class="form" placeholder="Gebruikersnaam" required> <br>
					<input type="password" class="form" placeholder="Wachtwoord" required> <br>
					<input type="submit" class="submit" value="Registreer en ga verder">
				</form>	
		</div>
		</div>
	</div>
	
<?php
	
	require 'footer.php';
	
?>
</body>
</html>