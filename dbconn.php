<?php

// connection parameters
$db_host = 'localhost';
$username = 'root';
$password = '';
$database = 'web_php_cars';
$port = '3308';

// create connection to database
$conn = mysqli_connect($db_host, $username, $password, $database, $port);
if (!$conn) {
	die('connection failed: ' . mysqli_error($conn));
}
