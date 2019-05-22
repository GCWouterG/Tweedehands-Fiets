<?php
	$pageTitle = "Fiets";
	require('Assets/header.php');

	$getBikeInfo = "SELECT * FROM fietsen
INNER JOIN staat
ON fietsen.staatID = staat.staatID
INNER JOIN categorieen
ON fietsen.categorieID = categorieen.categorieID
WHERE fietsID = {$_GET['id']}";
	$bikeInfo = $conn->query($getBikeInfo);

	while($row = $bikeInfo->fetch_assoc()) {
?>
	<div id="main">
		<div id="bikeMain">
			<div id="soldOverlayWrapper">
				<?php if($row['fietsStatus'] != 'te koop') {?>
					<div id="soldOverlay">VERKOCHT</div>
				<?php } ?>
				<img src="Assets/images/Uploads/<?php echo $row['fietsID']?>.png" alt="fiets">
			</div>
			<div id="bikeMainInfoWrapper">
				<p id="bikeID">Advertentienummer: <?php echo $row['fietsID']; ?></p>
				<h2><?php echo $row['fietsNaam']?></h2>
				<p id="bikeState">Staat: <?php echo $row['staatNaam']; ?></p>
				<h1 class="<?php echo ($row['fietsStatus'] != 'te koop') ? 'soldPrice' : ''; ?>">&euro;<?php echo str_replace(".", ",", $row['fietsPrijs']); ?></h1>
				<a href="" class="btn btn-primary">Plaats in winkelwagen</a>
			</div>
		</div>
		<div id="bikeDesc">
			<h1>Omschrijving</h1>
			<p>
			<?php echo $row['fietsBeschrijving']; ?>
			</p>
		</div>
		<div id="bikeSpec">
			<h1>Specificaties</h1>
			<div id="bikeSpecWrapper">
				<table>
					<tr>
						<td><b>Merk:</b></td>
						<td> <?php echo $row['fietsMerk']; ?></td>
					</tr>
					<tr>
						<td><b>Type:</b></td>
						<td> <?php echo $row['fietsModel']?></td>
					</tr>
					<tr>
						<td><b>Framemaat:</b></td>
						<td> <?php echo $row['fietsFramemaat']; ?>cm</td>
					</tr>
				</table>
				<table>
					<tr>
						<td><b>Categorie:</b></td>
						<td> <?php echo $row['categorieNaam']?></td>
					</tr>
					<tr>
						<td><b>Kleur:</b></td>
						<td> <?php echo $row['fietsKleur']?></td>
					</tr>
					<tr>
						<td><b>Versnellingen:</b></td>
						<td> <?php echo $row['fietsAantalVersnellingen']; ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
<?php } require('Assets/footer.php'); ?>