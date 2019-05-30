<?php
// estabilishing database connection
include 'dbconn.php';


// FILTER CAR CATEGORIES
if (isset($_GET['filter'])) {
	// constructing the query string, getting fields from the json message
	$pattern = $_GET['pattern'];
	$query = "SELECT * FROM cars WHERE category LIKE '{$pattern}'";
	// running the query on the connection
	$result = mysqli_query($conn, $query);
	// construct the divs for the cars
	$cars = '<div id="display_area">';
	while ($row = mysqli_fetch_array($result)) {
		$cars .= construct_div($row['id'], $row['model'], $row['engine_power'], $row['fuel'], $row['year'], $row['color'], $row['price']);
	}
	$cars .= '</div>';
	// return the string as a response to the ajax handler
	echo $cars;
	// exiting the script so other blocks wont run
	exit();
}


// INSERT CAR INTO DATABASE
if (isset($_POST['save'])) {
	// constructing the query string, getting fields from the json message
	$query = "INSERT INTO cars (category ,model, engine_power, fuel, year, color, price) VALUES (
		'{$_POST['category']}',
		'{$_POST['model']}',
		'{$_POST['engine_power']}',
		'{$_POST['fuel']}',
        '{$_POST['year']}',
		'{$_POST['color']}',
		'{$_POST['price']}'
	)";
	// running the query on the connection
	mysqli_query($conn, $query);
	// exiting the script so other blocks wont run
	exit();
}

// DELETE CAR FROM DATABASE
if (isset($_GET['delete'])) {
	// constructing the query string, getting fields from the json message
	$query = "DELETE FROM cars WHERE id=" . $_GET['id'];
	// running the query on the connection
	mysqli_query($conn, $query);
	// exiting the script so other blocks wont run
	exit();
}

// UPDATE CAR IN DATABASE
if (isset($_POST['update'])) {
	// getting fields from the json message
	$id = $_POST['id'];
	$model = $_POST['model'];
	$engine_power = $_POST['engine_power'];
	$fuel = $_POST['fuel'];
	$year = $_POST['year'];
	$color = $_POST['color'];
	$price = $_POST['price'];
	// constructing the query string
	$query = "UPDATE cars SET model='{$model}', engine_power='{$engine_power}', fuel='{$fuel}', year='{$year}', color='{$color}', price='{$price}' WHERE id=" . $id;
	// running the query on the connection
	if (mysqli_query($conn, $query)) {
		//$id = mysqli_insert_id($conn);
		// if it was successful, construct the div for the updated content
		$saved_car = construct_div($id, $model, $engine_power, $fuel, $year, $color, $price);
		// return the string as a response to the ajax handler
		echo $saved_car;
	} else {
		echo "Error: " . mysqli_error($conn);
	}
	exit();
}


// SELECT CARS FROM DATABASE - RUN THIS ON LOAD
$query = "SELECT * FROM cars"; // query string
$result = mysqli_query($conn, $query); // running the query on the connection
// construct the divs for the cars
$cars = '<div id="display_area">';
while ($row = mysqli_fetch_array($result)) {
	$cars .= construct_div($row['id'], $row['model'], $row['engine_power'], $row['fuel'], $row['year'], $row['color'], $row['price']);
}
$cars .= '</div>';


function construct_div($id, $model, $engine_power, $fuel, $year, $color, $price) {
	return '
	<div class="card-wrapper" data-id="' . $id . '">
		<div class="card">
			<div class="card-body">
				<div class="form-group row mb-0">
					<label class="col-sm-2 col-form-label">Model</label>
					<label class="display_model col-sm-10 col-form-label">' . $model . '</label>
				</div>
				<div class="form-group row mb-0">
					<label class="col-sm-2 col-form-label">HP</label>
					<label class="display_engine_power col-sm-10 col-form-label">' . $engine_power . '</label>
				</div>
				<div class="form-group row mb-0">
					<label class="col-sm-2 col-form-label">Fuel</label>
					<label class="display_fuel col-sm-10 col-form-label">' . $fuel . '</label>
				</div>
				<div class="form-group row mb-0">
					<label class="col-sm-2 col-form-label">Year</label>
					<label class="display_year col-sm-10 col-form-label">' . $year . '</label>
				</div>
				<div class="form-group row mb-0">
					<label class="col-sm-2 col-form-label">Color</label>
					<label class="display_color col-sm-10 col-form-label">' . $color . '</label>
				</div>
				<div class="form-group row mb-0">
					<label class="col-sm-2 col-form-label">Price</label>
					<label class="display_price col-sm-10 col-form-label">' . $price . '</label>
				</div>
			</div>
			<div class="card-footer">
				<button class="modify btn btn-outline-info" data-id="' . $id . '">Modify</button>
				<button class="delete btn btn-outline-danger ml-4" data-id="' . $id . '" >Remove</button>
			</div>
		</div>
		<br><br>
  	</div>';
}
