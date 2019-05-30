<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Browse cars</title>
	<link rel="stylesheet" href="./resources/bootstrap-css/bootstrap.min.css">
	<script src="./resources/jquery-3.4.0.min.js"></script>
	<script src="scripts.js"></script>
</head>

<body>
	<?php include 'navbar.html'; ?>
	<br><br>

	<div class="container mt-5">
		<div class="row">

			<div class="col">
				<div id="car-container">
					<?php echo $cars; ?>
				</div>
			</div>

			<div class="col">
				<div class="position-fixed" style="left:55vw; top:7vw; width: 40vw;">

					<form>
						<div class="form-group">
							<label for="category"><h5>Select category:</h5></label>
							<select class="form-control" id="category">
								<option value="%" selected="selected">All categories</option>
								<option value="motorbike">Motorbikes</option>
								<option value="suv">SUVs</option>
								<option value="sportscar">Sports cars</option>
							</select>
						</div>
					</form>
					<br><br>

					<h5>Currently selected car:</h5>
					<form id="updatecar">
						<div class="form-group row">
							<label for="model" class="col-form-label col-sm-2">Model</label>
							<input type="text" name="model" id="model" class="form-control col-sm-10">
						</div>
						<div class="form-group row">
							<label for="engine_power" class="col-form-label col-sm-2">HP</label>
							<input type="text" name="engine_power" id="engine_power" class="form-control col-sm-10">
						</div>
						<div class="form-group row">
							<label for="fuel" class="col-form-label col-sm-2">Fuel</label>
							<input type="text" name="fuel" id="fuel" class="form-control col-sm-10">
						</div>
						<div class="form-group row">
							<label for="year" class="col-form-label col-sm-2">Year</label>
							<input type="text" name="year" id="year" class="form-control col-sm-10">
						</div>
						<div class="form-group row">
							<label for="color" class="col-form-label col-sm-2">Color</label>
							<input type="text" name="color" id="color" class="form-control col-sm-10">
						</div>
						<div class="form-group row">
							<label for="price" class="col-form-label col-sm-2">Price</label>
							<input type="text" name="price" id="price" class="form-control col-sm-10">
						</div>
						<br>
						<button type="reset" class="btn btn-outline-warning">Reset</button>
						<button type="button" class='btn btn-outline-success ml-4' id="update_btn">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>

</body>

</html>