<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
	<link rel="stylesheet" type="text/css" href="css/style.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>
	<div id="side">
		<a href="select.php">
			<div class="select">
				<p>SELECT</p>
			</div>
		</a>

		<a href="insert.php">
			<div class="insert">
				<p>INSERT</p>
			</div>
		</a>

		<a href="delete.php">
			<div class="delete">
				<p>DELETE</p>
			</div>
		</a>
	</div>

	<div id="wrap">
		<?php
				// Connect to db
				require 'inc/conn.php';

				// All data from db
				$query = "SELECT * FROM agents";

				// Save here the number of all queries from db
				$result = mysqli_query($conn, $query);

				// If db is not empty
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_assoc($result)){
						?>

						<dir id="result"> 
							<a href="inc/deleteContact.php?id=<?php echo $row['id'] ?>"><i class="fas fa-trash-alt" style="font-size: 30px; float: right; color: black;"></i></i></a>
							<p style="font-size: 18px;"><b>Name: </b><?php echo $row['fname'] . " " . $row['lname']; ?></p>
					<p style="font-size: 18px;"><b>Agency: </b><?php echo $row['organisation']; ?></p>
						</dir>

						<?php
					}
				}else{
					echo "No contacts.";
				}
			?>
	</div>

</body>
</html>