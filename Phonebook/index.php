<!DOCTYPE html>
<html>
<head>
	<title>Phonebook</title>
	<link rel="icon" href="img/favicon.ico"> 
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>
	<div id="wrap">
		<div id="search">
			<i class="fas fa-search" title="Search for contacts"></i>
			<a href="insert.php"><i class="fas fa-user-plus" title="Add new contact"></i></a>
			<a href="remove.php"><i class="fas fa-trash-alt"></i></a>

			<form action="#" method="GET">
				<input type="text" name="criteria" placeholder="First or last name..." size="18"> 
				<input type="submit" value="Search"><br/>				
			</form>
		</div>

		<?php
			include 'inc/getResults.php';
		?>

	</div>

</body>
</html>