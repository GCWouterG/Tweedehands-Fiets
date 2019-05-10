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
	
	<div class="row">
		<div class="col-8">
			<div class="row" id="actions">
				<h1>Acties van de dag</h1>
				<div class="adWrapper">
					<div class="ad">
						<img src="Assets/images/Uploads/bike.png" alt="Bike">
						<p>Lorem Ipsum dolor si di amet</p>
					</div>
				</div>
			</div>
			<div class="row" id="bikes">
				<h1>Nieuwste fietsen</h1>
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

	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<?php require('Assets/footer.php');?>
</body>
</html>
