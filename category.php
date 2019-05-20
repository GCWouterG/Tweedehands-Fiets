<?php
	$pageTitle = "categorie";
	require 'Assets/header.php';
	

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
	<div id="main">
		<div id="categoryHeader">
			<h1><?php echo $categorieNaam; ?></h1>
			<hr>
		</div>
	
		<?php while($row = $bikes->fetch_assoc()) {?>
		<div class="categorie-row">
			<div class="img-td"><img src="Assets/images/Elektrische+fiets+E+bike+Elops+920+hoog+frame+stadsfiets+donkergroen.jpg"></div>
			<div class="tekst-td"><?php echo $row['fietsNaam']?> <br> <p title="<?php echo $row['staatBeschrijving']?>">Staat: <?php echo $row['staatNaam']?></p></b></div>
			<div class="prijs-td">&euro;<?php echo str_replace(".", ",", $row['fietsPrijs']); ?></div>
			<div class="button-td"><a href="bike.php?id=<?php echo $row['fietsID']?>" class="btn btn-primary"> Bekijk </a></div>
		</div>
		<br>
		<?php } ?>
	</div>

<?php require 'Assets/footer.php'; ?>