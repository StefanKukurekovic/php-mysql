<!DOCTYPE html>
<html>
<head>
	<!-- Phonebook.php !-->
	<title>Phonebook</title>
	<link rel="icon" href="img/favicon.ico"> 
	<!-- ?'php echo time(); ?> -> will add the current timestamp on the end of a file path, so it will always be unique and never loaded from cache. This solves the problem of browser not showing updates right away!-->
	<link rel="stylesheet" type="text/css" href="css/style.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>
	<div id="wrap">
		<div id="search">
			<div class="top_icon">
				<i class="fas fa-search" title="Search for contacts"></i>
			</div>
			<div  class="left_icon">
				<a href="insert.php"><i class="fas fa-user-plus" title="Add new contact"></i></a>
			</div>
			<div class="right_icon">
				<a href="remove.php"><i class="fas fa-trash-alt"></i></a>
			</div>
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