<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "phonebook";

// Uspostavi konekciju
$conn = mysqli_connect($serverName, $userName, $password, $dbName);

// Provera konekcije
if(!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

?>