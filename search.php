<?php
	$pageTitle = "Zoeken";
	require 'Assets/header.php';


	$getBikes = "SELECT * FROM fietsen
                INNER JOIN staat
                ON fietsen.staatID = staat.staatID
				WHERE fietsen.fietsStatus = 'te koop'";

	if(isset($_SESSION['searchString'])) {
		$getBikes .= "OR fietsen.fietsNaam LIKE '%{$_SESSION['searchString']}%'
					OR fietsen.fietsBeschrijving LIKE '%{$_SESSION['searchString']}%'";
		$searchFilters['Zoekfilter'] = $_SESSION['searchString'];
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



	if(isset($_POST['searchSubmit'])) {
		$searchFilters = array();
		if(isset($_POST['searchString'])) {
			$_SESSION['searchString'] = $_POST['searchString'];
		}
		if(isset($_POST['category'])) {
			$getBikes .= " AND fietsen.categorieID = {$_POST['category']}";
			
			$getCategoryName = "SELECT categorieNaam FROM categorieen WHERE categorieID = {$_POST['category']}";
			$categoryName = $conn->query($getCategoryName);
			
			$searchFilters['Categorie'] = $categoryName->fetch_assoc()['categorieNaam'];
		}
		if(isset($_POST['make'])) {
			$getBikes .= " AND fietsen.fietsMerk = {$_POST['make']}";
			$searchFilters['Merk'] = $_POST['make'];
		}
		if(isset($_POST['make'])) {
			$getBikes .= " AND fietsen.fietsMerk = {$_POST['make']}";
			$searchFilters['Merk'] = $_POST['make'];
		}
		if(isset($_POST['frame'])) {
			$getBikes .= " AND fietsen.framemaat = {$_POST['frame']}";
			$searchFilters['Framemaat'] = $_POST['frame'];
		}
		if(isset($_POST['color'])) {
			$getBikes .= " AND fietsen.kleur = {$_POST['color']}";
			$searchFilters['Kleur'] = $_POST['color'];
		}
		if(isset($_POST['minPrice'])) {
			$getBikes .= " AND fietsen.prijs >= {$_POST['minPrice']}";
			$searchFilters['Minimum prijs'] = "&euro;".$_POST['minPrice'];
		}
		if(isset($_POST['maxPrice'])) {
			$getBikes .= " AND fietsen.prijs <= {$_POST['maxPrice']}";
			$searchFilters['Maximum prijs'] = "&euro;".$_POST['maxPrice'];
		}
	}

	$bikes = $conn->query($getBikes);
?>
	<div id="main">
		<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Zoekfilters</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
				  	</div>
				  	<div class="modal-body">
						<form method="post">
							<table>
								<tr>
									<td colspan="2"><input type="text" name="searchString" placeholder="Zoekterm" class="form-control"></td>
								</tr>
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
							</table>
				  	</div>
				 	<div class="modal-footer">
						<button type="submit" class="btn btn-primary" name="searchSubmit">Zoek</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		<div id="categoryHeader">
			<h1>Zoeken</h1>
			<hr>
			<div id="searchFilters">
				<h3>Zoekfilters:</h3>
				<?php
					if(isset($searchFilters)) {
						foreach($searchFilters as $name=>$value) {
							echo "<span class='searchFilter'><b>{$name}:</b>{$value}</span>";
						}
					}
				?>
				<button type="button" data-toggle="modal" data-target="#searchModal">Wijzig</button>
			</div>
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
