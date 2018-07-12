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
			<div class="right_icon" style="margin-bottom: 100px;">
				<a href="insert.php"><img src="img/add.png" title="Add new contact"></a>
			</div>
			<?php
				// Connect to db
				require 'inc/connect.php';

				// All data from db
				$query = "SELECT * FROM contacts";

				// Save here the number of all queries from db
				$result = mysqli_query($conn, $query);

				// If db is not empty
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_assoc($result)){
						?>

						<dir id="result"> 
							<a href="inc/removeContact.php?id=<?php echo $row['id'] ?>"><i class="fas fa-trash-alt" style="font-size: 30px; float: right; color: black;"></i></i></a>
							<p style="font-size: 18px;"><b>Name: </b><?php echo $row['fname'] . " " . $row['lname']; ?></p>
					<p style="font-size: 18px;"><b>Tel: </b><?php echo $row['tel']; ?></p>
						</dir>

						<?php
					}
				}else{
					echo "No contacts.";
				}
			?>



			<!--
			<form action="#" method="GET">
				<label><b>First name:</b><br/>
				<input type="text" name="criteria" placeholder="First or last name..." size="18"></label>
				<input type="submit" value="Search"><br/>				
			</form>
			!-->
		</div>

	</div>

</body>
</html>