<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
	<link rel="stylesheet" type="text/css" href="css/style.css?<?php echo time(); ?>">
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
						
						echo $row['id'] . "<br>";
						echo "First name: " . $row['fname'] . "<br>";
						echo "Last name: " . $row['lname'] . "<br>";
						echo "Agency: " . $row['organisation']. "<br>";
						echo "--------------------------<br/>";
					}
				}else{
					echo "No contacts.";
				}
		?>
	</div>

</body>
</html>