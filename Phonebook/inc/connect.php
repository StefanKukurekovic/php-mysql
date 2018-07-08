<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "phonebook";

// establish connection
$conn = mysqli_connect($serverName, $userName, $password, $dbName);

// check connection
if(!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

?>