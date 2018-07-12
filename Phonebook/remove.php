<!DOCTYPE html>
<html>
<head>
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
				<img src="img/remove.png" title="Remove contact">
			</div>
			<div  class="left_icon">
				<a href="index.php"><img src="img/search.png" title="Search for contacts"></a>
			</div>
			<div class="right_icon">
				<a href="insert.php"><img src="img/add.png" title="Add new contact"></a>
			</div>
			<form action="#" method="GET">
				<label><b>First name:</b><br/>
				<input type="text" name="criteria" placeholder="First or last name..." size="18"></label>
				<input type="submit" value="Search"><br/>				
			</form>
		</div>

	</div>

</body>
</html>