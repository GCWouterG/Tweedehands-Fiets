<?php
	$pageTitle = "Zoeken";
	require 'Assets/header.php';

	$getBikes = "SELECT * FROM fietsen
				WHERE fietsNaam LIKE %{$_SESSION['searchString']}%
				OR fietsBeschrijving LIKE %{$_SESSION['searchString']}%";

	$bikes = $conn->query($getBikes);
?>
	<div id="main">
		<div id="categoryHeader">
			<h1>Zoeken</h1>
			<hr>
		</div>
	
		<?php while($row = $bikes->fetch_assoc()) {?>
		<div class="categorie-row">
			<div class="img-td"><img src="Assets/images/Uploads/<?php echo $row['fietsID']; ?>.png"></div>
			<div class="tekst-td"><?php echo $row['fietsNaam']?> <br> <p title="<?php echo $row['staatBeschrijving']?>">Staat: <?php echo $row['staatNaam']?></p></b></div>
			<div class="prijs-td">&euro;<?php echo str_replace(".", ",", $row['fietsPrijs']); ?></div>
			<div class="button-td"><a href="bike.php?id=<?php echo $row['fietsID']?>" class="btn btn-primary"> Bekijk </a></div>
		</div>
		<br>
		<?php } ?>
	</div>

<?php require 'Assets/footer.php'; ?>