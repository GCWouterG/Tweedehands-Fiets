<?php
	$pageTitle = "categorie";
	require 'header.php';
	

	$getCategorName = "SELECT categorieNaam FROM categorieen WHERE categorieID = {$_GET['id']}";
	$categorieNaam = $conn->query($getCategorName);
	$categorieNaam = $categorieNaam->fetch_assoc()['categorieNaam'];

	$getBikes = "SELECT * 
				FROM fietsen 
				INNER JOIN staat
				ON fietsen.staatID = staat.staatID
				WHERE fietsen.categorieID = {$_GET['id']}
				AND fietsen.fietsStatus = 'te koop'
                ORDER BY fietsen.fietsID DESC";
	$bikes = $conn->query($getBikes);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<link href="categorie-opmaak.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
	<br>
	<h1 id="h1"><?php echo $categorieNaam; ?></h1>
	<hr id="hr">
	<br>
	
	<?php while($row = $bikes->fetch_assoc()) {?>
	<div class="categorie-row">
		<div class="img-td"><img src="images/Elektrische+fiets+E+bike+Elops+920+hoog+frame+stadsfiets+donkergroen.jpg"></div>
		<div class="tekst-td"><?php echo $row['fietsNaam']?> <br> <p title="<?php echo $row['staatBeschrijving']?>">Staat: <?php echo $row['staatNaam']?></p></b></div>
		<div class="prijs-td">&euro;<?php echo str_replace(".", ",", $row['fietsPrijs']); ?></div>
		<div class="button-td"><a href="bike.php?id=<?php echo $row['fietsID']?>" class="btn btn-primary"> Bekijk </a></div>
	</div>
	<?php } ?>
<!--
	<div class="categorie-row">
		<div class="img-td"><img src="images/Elektrische+fiets+E+bike+Elops+920+hoog+frame+stadsfiets+donkergroen.jpg"></div>
		<div class="tekst-td">Lorem Ipsum dolor si di amet <br> <p>Arnhem, GE</p></div>
		<div class="prijs-td">€123,45</div>
		<div class="button-td"><a href="#" class="btn btn-primary"> Bekijk </a></div>
	</div>
	<div class="categorie-row">
		<div class="img-td"><img src="images/Elektrische+fiets+E+bike+Elops+920+hoog+frame+stadsfiets+donkergroen.jpg"></div>
		<div class="tekst-td">Lorem Ipsum dolor si di amet <br> <p>Arnhem, GE</p></div>
		<div class="prijs-td">€123,45</div>
		<div class="button-td"><a href="#" class="btn btn-primary"> Bekijk </a></div>
	</div>
	<div class="categorie-row">
		<div class="img-td"><img src="images/Elektrische+fiets+E+bike+Elops+920+hoog+frame+stadsfiets+donkergroen.jpg"></div>
		<div class="tekst-td">Lorem Ipsum dolor si di amet <br> <p>Arnhem, GE</p></div>
		<div class="prijs-td">€123,45</div>
		<div class="button-td"><a href="#" class="btn btn-primary"> Bekijk </a></div>
	</div>
	<div class="categorie-row">
		<div class="img-td"><img src="images/Elektrische+fiets+E+bike+Elops+920+hoog+frame+stadsfiets+donkergroen.jpg"></div>
		<div class="tekst-td">Lorem Ipsum dolor si di amet <br> <p>Arnhem, GE</p></div>
		<div class="prijs-td">€123,45</div>
		<div class="button-td"><a href="#" class="btn btn-primary"> Bekijk </a></div>
	</div>
-->
	

	<br>
	
	<?php
	 
	require 'footer.php';
	
	?>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>