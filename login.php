<?php
	$pageTitle = "Login";
	require 'Assets/header.php';
	

	if(isset($_POST['registerSubmit'])) {
		$pass = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);
		$insertQuery = "INSERT INTO klanten (klantVoornaam, klantVoorvoegsels, klantAchternaam, klantEmail, klantWachtwoord) VALUES ('{$_POST['voornaam']}', '{$_POST['tussenvoegsel']}' , '{$_POST['achternaam']}', '{$_POST['email']}' , '{$pass}')";
		$insertUser = $conn->query($insertQuery);
	}	

	if(isset($_POST['loginSubmit'])) {
		if(empty($_POST['email']) && empty($_POST['pass'])) {
			$loginErrorMessage = "Vul uw gegevens in.";
		} elseif(empty($_POST['email'])) {
			$loginErrorMessage = "Vul uw email in.";
		} elseif(empty($_POST['pass'])) {
			$loginErrorMessage = "Vul uw wachtwoord in.";
		} else {
			$getUser = "SELECT * FROM klanten 
						WHERE klantEmail = '{$_POST['email']}'";
			$user = $conn->query($getUser);
			if($user->num_rows == 1) {
				$pass = $user->fetch_assoc()['klantWachtwoord'];
				if(password_verify($_POST['pass'], $pass)) {
					$_SESSION['loggedIn'] = true;
					$_SESSION['userID'] = $user->fetch_assoc()['klantID'];
					header('Location:'.$mainLink);
				} else {
					$loginErrorMessage = "Verkeerd wachtwoord";
				}
			} else {
				$loginErrorMessage = "Verkeerde email";
			}
		}
	}
	

?>
	<br> <br>
	<div id="container">
	<div class="row">
		<div class="col-md-5">
			<section class="login">
			<h1> Al een account?</h1>
			<?php if(isset($loginErrorMessage)) {?>
				<div class="alert alert-danger">
					<?php echo $loginErrorMessage; ?>
				</div>
			<?php } ?>
				<form method="post">
					<input type="email" class="form" placeholder="E-mailadres" name="email"> <br>
					<input type="password" class="form" placeholder="Wachtwoord" name="pass"> <br>
					<input type="submit" class="submit" name="loginSubmit" value="Login">
				</form>
			</section>
		</div>
	
		<div class="col-md-2">
			<div class="vertical-Line"></div>
		</div>
		
		<div class="col-md-5">
			<section class="registreer">
			<h1> Registreer</h1>
				<form method="post">
					<input type="email" class="form" name="email" placeholder="E-mailadres" required> <br>
					<input type="text" class="form" name="voornaam" placeholder="Voornaam" required> <br>
					<input type="text" class="form" name="tussenvoegsel" placeholder="Tussenvoegsels" > <br>
					<input type="text" class="form" name="achternaam" placeholder="Achternaam" required> <br>
					<input type="password" class="form" name="wachtwoord" placeholder="Wachtwoord" required> <br>
					<input type="submit" class="submit" name="registerSubmit" value="Registreer">
				</form>	
			</section>
		</div>
		</div>
	</div>
	
<?php
	
	require('Assets/footer.php');
	
?>