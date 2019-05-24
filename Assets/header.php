<?php
	session_start();
	require("connect.php");
	$mainLink = "http://{$_SERVER['HTTP_HOST']}/Git/Tweedehands-Fiets";
	$getCategorysQuery = "SELECT * FROM categorieen";
    $getCategorys = $conn->query($getCategorysQuery);
	
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Graafschap College">
	<meta name="Description" content="Tweedehands fietsensite - SCRUM project">
	<meta name="Keywords" content="tweedehands, fiets, tweedehands fiets, fietsen, goedkoop">
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	<title><?php echo $pageTitle;?> | Tweedehands Fiets B.V.</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $mainLink; ?>/Assets/style.css">
</head>

<body>
	<header id="header">
		<nav id="upperNavbar">
			<div id="buttonWrapper">
				<?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {?>
					<a class="btn btn-primary" id="navAccount"><i class="fas fa-user"></i> Account</a>
				<?php } else {?>
					<a class="btn btn-primary" id="navLogin"><i class="fas fa-unlock-alt"></i> Log in</a>
					<a class="btn btn-primary" id="navRegister"><i class="fas fa-user-plus"></i> Registreer</a>
				<?php } ?>
			</div>	
		</nav>
		<nav id="lowerNavbar">
			<a href="<?php echo $mainLink; ?>"><img src="<?php echo $mainLink; ?>/Assets/images/logo.png" alt="logo"></a>
			<div id="lowerNavbarWrapper">
				<form class="form-inline">
				  <input class="form-control mr-sm-2" type="search" placeholder="Zoeken" aria-label="Search">
				  <button class="btn btn-primary" type="submit">Zoek</button>
				</form>				
				<a href="" id="cart"><i class="fas fa-shopping-cart"></i></a>
				<div id="mobileToggler"><div class="fas fa-bars"></div></div>
			</div>
		</nav>
		<nav id="mobileNavbar">
			<ul>
				<li><a href="">Winkelwagen</a></li>
				<li><a class="dropdownToggler">Categorieën</a>
					<ul class="mobileDropdown">
						<li><a href="">Mannen fietsen</a></li>
						<li><a href="">Vrouwen fietsen</a></li>
						<li><a href="">Kinder fietsen</a></li>
						<li><a href="">Unisex fietsen</a></li>
						<li><a href="">Vouw fietsen</a></li>
						<li><a href="">Elektrische mannen fietsen</a></li>
						<li><a href="">Elektrische vrouwen fietsen</a></li>
						<li><a href="">Driewiel fietsen</a></li>
						<li><a href="">Lig fietsen</a></li>
						<li><a href="">Tandem fietsen</a></li>
					</ul>
				</li>
			</ul>
			<form class="form-inline">
				<input type="search" class="form-control" placeholder="Zoeken">
				<input type="submit" class="btn btn-primary" value="Zoek">
			</form>
			<?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {?>
				<a class="btn btn-primary" id="navAccount"><i class="fas fa-user"></i> Account</a>
			<?php } else {?>
				<a class="btn btn-primary" id="navLogin"><i class="fas fa-unlock-alt"></i> Log in</a>
				<a class="btn btn-primary" id="navRegister"><i class="fas fa-user-plus"></i> Registreer</a>
			<?php } ?>
		</nav>
	</header>
