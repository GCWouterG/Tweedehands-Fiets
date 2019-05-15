<?php

	$pageTitle = "Home";
	require('Assets/header.php');

	if(isset($_POST['rate'])) {
		$sendRateQuery = "INSERT INTO beoordeling (beoordelingScore, beoordelingNaam, beoordelingAanvulling)
						VALUES ('{$_POST['rating']}', '{$_POST['name']}', '{$_POST['comment']}')";
		$sendRate = $conn->query($sendRateQuery);
	}

?>

<div id="main">
	
	<div id="banner">
	
		<img src="Assets/images/banner.jpg" alt="Bike in front of a wall with two windows." style="visibility: hidden;">
	
		<div id="perfectBike">
		
							
			<fieldset>
				<legend><b>Vind de perfecte fiets</b></legend>
					<form method="post">
						<table>
							<tr>
								<td>
									<select name="category" class="form-control">
										<option disabled selected>Categorie</option>
										<option>Test</option>
									</select>
								</td>
								<td>
									<select name="category" class="form-control">
										<option disabled selected>Merk</option>
										<option>Test</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>
									<select name="category" class="form-control">
										<option disabled selected>Framemaat</option>
										<option>Test</option>
									</select>
								</td>
								<td>
									<select name="category" class="form-control">
										<option disabled selected>Kleur</option>
										<option>Test</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>
									<select name="category" class="form-control">
										<option disabled selected>Prijs van</option>
										<option>Test</option>
									</select>
								</td>
								<td>
									<select name="category" class="form-control">
										<option disabled selected>Tot</option>
										<option>Test</option>
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
				<div class="homepageBikesWrapper">
					<div class="homepageBike">
						<img src="Assets/images/Uploads/bike.png" alt="Bike">
						<p>Lorem Ipsum dolor si di amet</p>
						<div class="homepagePriceWrapper">
							<h4 class="homepageBikeOriginalPrice">&euro; 123,45</h4>
							<h4 class="homepageBikeActionPrice">&euro; 123,45</h4>
						</div>
						<a href="">Bekijk</a>
					</div>
					<div class="homepageBike">
						<img src="Assets/images/Uploads/bike.png" alt="Bike">
						<p>Lorem Ipsum dolor si di amet</p>
						<div class="homepagePriceWrapper">
							<h4 class="homepageBikeOriginalPrice">&euro; 123,45</h4>
							<h4 class="homepageBikeActionPrice">&euro; 123,45</h4>
						</div>
						<a href="">Bekijk</a>
					</div>
					<div class="homepageBike">
						<img src="Assets/images/Uploads/bike.png" alt="Bike">
						<p>Lorem Ipsum dolor si di amet</p>
						<div class="homepagePriceWrapper">
							<h4 class="homepageBikeOriginalPrice">&euro; 123,45</h4>
							<h4 class="homepageBikeActionPrice">&euro; 123,45</h4>
						</div>
						<a href="">Bekijk</a>
					</div>
				</div>
			</div>
			
			<div class="row" id="bikes">
				<h1>Nieuwste fietsen</h1>
				<div class="homepageBikesWrapper">
					<div class="homepageBike">
						<img src="Assets/images/Uploads/bike.png" alt="Bike">
						<p>Lorem Ipsum dolor si di amet</p>
						<div class="homepagePriceWrapper">
							<h4 class="homepageBikePrice">&euro; 123,45</h4>
						</div>
						<a href="">Bekijk</a>
					</div>
					<div class="homepageBike">
						<img src="Assets/images/Uploads/bike.png" alt="Bike">
						<p>Lorem Ipsum dolor si di amet</p>
						<div class="homepagePriceWrapper">
							<h4 class="homepageBikePrice">&euro; 123,45</h4>
						</div>
						<a href="">Bekijk</a>
					</div>
					<div class="homepageBike">
						<img src="Assets/images/Uploads/bike.png" alt="Bike">
						<p>Lorem Ipsum dolor si di amet</p>
						<div class="homepagePriceWrapper">
							<h4 class="homepageBikePrice">&euro; 123,45</h4>
						</div>
						<a href="">Bekijk</a>
					</div>
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