<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sell a car</title>
    <link rel="stylesheet" href="./resources/bootstrap-css/bootstrap.min.css">
    <script src="./resources/jquery-3.4.0.min.js"></script>
    <script src="scripts.js"></script>
</head>

<body>
    <?php include 'navbar.html'; ?>
    <br><br>
    <div class="container mt-5">
        <form id="newcar">
            <div class="form-group row">
                <label class="col-form-label col-sm-2" for="category">Category</label>
                <select name="category" id="category" class="form-control col-sm-10">
                    <option value="motorbike">Motorbike</option>
                    <option value="suv">SUV</option>
                    <option value="sportscar">Sports car</option>
                </select>
            </div>
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
            <button type="reset" class="btn btn-outline-danger">Reset</button>
            <button type="button" class='btn btn-outline-success ml-4' id="submit_btn">Post</button>
        </form>
    </div>
</body>

</html>