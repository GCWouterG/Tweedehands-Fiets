<?php
	$pageTitle = "Home";
	require('Assets/header.php');
?>
<div id="main">
	<div id="banner">
	
		<img src="Assets/images/banner.jpg" alt="Bike in front of a wall with two windows." style="visibility: hidden; width: 100%;">
	
		<div id="perfectBike">
		
			<form>				
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
			</form>
		
		</div>
	
	</div>
	
	<div class="row" id="homepageContent">
		<div class="col-8">
			<div class="row" id="actions">
				<h1>Acties van de dag</h1>
				<div id="homepageBikesWrapper">
					<div class="homepageBike">
						<img src="Assets/images/Uploads/bike.png" alt="Bike">
						<p>Lorem Ipsum dolor si di amet</p>
						<h4 class="homepageBikeOriginalPrice">&euro; 123,45</h4><h4 class="homepageBikeActionPrice">&euro; 123,45</h4>
						<a href="">Bekijk</a>
					</div>
				</div>
				<div id="homepageBikesWrapper">
					<div class="homepageBike">
						<img src="Assets/images/Uploads/bike.png" alt="Bike">
						<p>Lorem Ipsum dolor si di amet</p>
						<h4 class="homepageBikeOriginalPrice">&euro; 123,45</h4><h4 class="homepageBikeActionPrice">&euro; 123,45</h4>
						<a href="">Bekijk</a>
					</div>
				</div>
				<div id="homepageBikesWrapper">
				<div id="homepageBikesWrapper">
					<div class="homepageBike">
						<img src="Assets/images/Uploads/bike.png" alt="Bike">
						<p>Lorem Ipsum dolor si di amet</p>
						<h4 class="homepageBikeOriginalPrice">&euro; 123,45</h4><h4 class="homepageBikeActionPrice">&euro; 123,45</h4>
						<a href="">Bekijk</a>
					</div>
				</div>
			</div>
			<div class="row" id="bikes">
				<h1>Nieuwste fietsen</h1>
			</div>
		</div>
		</div>
		<div class="col-4">
			<div class="row" id="category">
			 <h3>Categorieën</h3>
			</div>
			<div class="row" id="rating">
				<h3>Beoordeling</h3>
			</div>	
		</div>
	</div>

</div>
	<?php require('Assets/footer.php');?>
</body>
</html>
