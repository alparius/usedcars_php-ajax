<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>About</title>
	<link rel="stylesheet" href="./resources/bootstrap-css/bootstrap.min.css">
</head>

<body>
	<?php include 'navbar.html'; ?>

	<div class="container mt-5">
		<br><br>
		In this lab you will have to develop a server-side web application in PHP. The web application has to manipulate a Mysql
		database with 1 to 3 tables and should implement the following base operations on these tables: select, insert, delete,
		update. Also the web application must use AJAX for getting data asynchronously from the web server and the web
		application should contain at least 5 web pages (client-side html or server-side php).
		<br>
		For the database, you can use the mysql database on www.scs.ubbcluj.ro. On this myql server you have an account, a
		password and a database, all identical to your username and password on the SCS network.
		<br>
		Documentation can be found at: <br>
		1) http://www.cs.ubbcluj.ro/~forest/wp <br>
		2) http://www.php.net/manual/en <br>
		3) http://www.w3schools.com/php <br>
		4) http://www.w3schools.com/ajax <br>

		<br><br>
		<strong>Problems</strong>
		<br>
		Write a web application for managing a second-hand car business. The application should maintain various information
		about a car in the database (i.e. model, engine power, fuel, price, color, age, history etc.). The application should
		implement: car browsing (use AJAX for retrieving cars from a specific category), adding, removing and updating a car.
		Also, on the browsing page, the filter used for the previous browsing action (i.e. category), should be displayed (do
		this in javascript).
	</div>
</body>

</html>