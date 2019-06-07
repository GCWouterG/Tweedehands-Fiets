<?php

	$pageTitle = "Home";
	require('Assets/header.php');

	if(isset($_POST['rate'])) {
		$sendRateQuery = "INSERT INTO beoordeling (beoordelingScore, beoordelingNaam, beoordelingAanvulling)
						VALUES ('{$_POST['rating']}', '{$_POST['name']}', '{$_POST['comment']}')";
		$sendRate = $conn->query($sendRateQuery);
	}

	$getBrandsQuery = "SELECT * FROM fietsen GROUP BY fietsMerk";
	$getBrands = $conn->query($getBrandsQuery);

	$getFrameQuery = "SELECT * FROM fietsen GROUP BY fietsFramemaat";
	$getFrame = $conn->query($getFrameQuery);

	$getColorQuery = "SELECT * FROM fietsen GROUP BY fietsKleur";
	$getColor = $conn->query($getColorQuery);

	$getPriceMinQuery = "SELECT MIN(fietsPrijs) FROM fietsen";
	$getPriceMin = $conn->query($getPriceMinQuery);
	$minPrice = round($getPriceMin->fetch_assoc()['MIN(fietsPrijs)']);

	$getPriceMaxQuery = "SELECT MAX(fietsPrijs) FROM fietsen";
	$getPriceMax = $conn->query($getPriceMaxQuery);
	$maxPrice = round($getPriceMax->fetch_assoc()['MAX(fietsPrijs)']);

	$bikeActionInfoQuery = "SELECT * FROM fietsen INNER JOIN acties ON fietsen.actieID = acties.actieID	WHERE fietsen.actieID > 0 ORDER BY fietsen.actieID DESC LIMIT 3";
	$bikeActionInfo = $conn->query($bikeActionInfoQuery);

	$getNewBikes = "SELECT * FROM fietsen ORDER BY fietsID DESC LIMIT 3";
	$newBikes = $conn->query($getNewBikes);
?>

<div id="main">
	
	<div id="banner">
	
		<img src="Assets/images/banner.jpg" alt="Bike in front of a wall with two windows." style="visibility: hidden;">
	
		<div id="perfectBike">
		
							
			<fieldset>
				<legend><b>Vind de perfecte fiets</b></legend>
					<form method="post" action="search.php">
						<table>
							<tr>
								<td>
									<select name="category" class="form-control">
										<option disabled selected>Categorie</option>
										<?php foreach($getCategorys as $value) { 
											echo "<option value='{$value['categorieID']}'>{$value['categorieNaam']}</option>";
										} ?>
									</select>
								</td>
								<td>
									<select name="make" class="form-control">
										<option disabled selected>Merk</option>
										<?php foreach($getBrands as $value) {
											echo "<option value='{$value['fietsMerk']}'>{$value['fietsMerk']}</option>";
										} ?>
									</select>
								</td>
							</tr>
							<tr>
								<td>
									<select name="frame" class="form-control">
										<option disabled selected>Framemaat</option>
										<?php foreach($getFrame as $value) {
											echo "<option value='{$value['fietsFramemaat']}'>{$value['fietsFramemaat']}</option>";
										} ?>
									</select>
								</td>
								<td>
									<select name="color" class="form-control">
										<option disabled selected>Kleur</option>
										<?php
											foreach($getColor as $value) {
												echo "<option value='{$value['fietsKleur']}'>{$value['fietsKleur']}</option>";
											}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td>
									<select name="minPrice" class="form-control">
										<option disabled selected>Prijs van</option>
										<?php for($teller=$minPrice; $teller<=$maxPrice; $teller += 50){
											echo "<option value='{$teller}'>&euro;{$teller}</option>";
										} ?>
									</select>
								</td>
								<td>
									<select name="maxPrice" class="form-control">
										<option disabled selected>Tot</option>
										<?php for($teller=$maxPrice; $teller>=$minPrice; $teller -= 50){
											echo "<option value='{$teller}'>&euro;{$teller}</option>";
										} ?>
									</select>
								</td>
							</tr>
							<tr>
								<td><input type="submit" name="submit" value="Zoek"></td>
							</tr>
						</table>
					</form>
			</fieldset>
		
		</div>
	
	</div>
	
	<div class="row" id="homepageContent">
		<div class="homepageLeft">
			<div class="row" id="actions">
				<h1>Acties van de dag</h1>
				<div class="homepageBikesWrapper row">
					
					<?php while($row=$bikeActionInfo->fetch_assoc()){
						if($row['actiePercentage']>0) {
							$prijs=$row['fietsPrijs'] * (1 - ($row['actiePercentage'] / 100));
						} else {
							$prijs=$row['fietsPrijs']-$row['actiePrijs'];
						}
						$decimaalPrijs = str_replace(".", ",", number_format($prijs, 2));
					?>
					
					<div class="homepageBike col">
							<div class="homepageBikeImage">
								<img src="Assets/images/Uploads/<?php echo $row['fietsID']?>.png" alt="bike">
							</div>
							<h3><?php echo $row['fietsNaam']; ?></h3>
							<div class="hompageBikePriceWrapper">
								<p class="hompageBikeOriginalPrice">&euro;<?php echo str_replace(".", ",", $row['fietsPrijs']); ?></p>
								<p class="homepageBikeActionPrice">&euro;<?php echo $decimaalPrijs; ?></p>
							</div>
							<a href="bike.php?id=<?php echo $row['fietsID']?>" class="btn btn-primary">Bekijk</a>
						</div>					
					<?php } ?>					
				</div>
			</div>
			
			<div class="row" id="bikes">
				<h1>Nieuwste fietsen</h1>
				<div class="homepageBikesWrapper row">
					<?php while($row = $newBikes->fetch_assoc()) {?>
						<div class="homepageBike col">
							<div class="homepageBikeImage">
								<img src="Assets/images/Uploads/<?php echo $row['fietsID']?>.png" alt="bike">
							</div>
							<h3><?php echo $row['fietsNaam']; ?></h3>
							<div class="hompageBikePriceWrapper">
								<p>&euro;<?php echo str_replace(".", ",", $row['fietsPrijs']);?></p>
							</div>
							<a href="bike.php?id=<?php echo $row['fietsID']?>" class="btn btn-primary">Bekijk</a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		
		<div class="homepageRight">
			<div class="row" id="homepageCategory">
			 <h3>Categorieën</h3>
				<ul>
					<?php foreach($getCategorys as $value) { 
						echo "<li title='{$value['categorieBeschrijving']}'><a href='category.php?id={$value['categorieID']}'>{$value['categorieNaam']}</a></li>";
					} ?>
				</ul>
			</div>
			<div class="row" id="rating">
				<h3>Beoordeel onze website</h3>
				<form method="post">
					<label for="rating">Beoordeling:</label><br>
					<input type="range" name="rating" step="0.5" min="1" max="5" id="ratingSlider" value="5" required>
					<span id="ratingLiveScore">5</span><br>
					<label for="name">Uw naam:</label><br>
					<input type="text" name="name"><br>
					<label for="comment">Aanvulling:</label><br>
					<textarea name="comment"></textarea><br>
					<img src="Assets/images/trustpilot.png" alt="trustpilot beoordeling"><input type="submit" name="rate" value="Verstuur">
				</form>
			</div>	
		</div>
		
	</div>
</div>

	<?php require('Assets/footer.php');?>

</body>
</html>