<?php

if(isset($_GET['id'])){
	$id = $_GET['id'];
	require 'connect.php';

	// id = {$id} is important, not to delete the whole db
	$query = "DELETE FROM contacts WHERE id = {$id}";

	mysqli_query($conn, $query);

	// redirection to the page we came from (for user not to end up on the empty oage)
	header("Location: ../remove.php");
}


?>