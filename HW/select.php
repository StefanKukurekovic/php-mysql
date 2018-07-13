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
		<div id="wrap-style">
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

					<table>
						<tr>
							<th>ID</th>
							<th>First name</th>
							<th>Second name</th>
							<th>Agency</th>
						</tr>
						<tr>
							<td><?php echo $row['id'] ?></td>
							<td><?php echo $row['fname'] ?></td>
							<td><?php echo $row['lname'] ?></td>
							<td><?php echo $row['organisation'] ?></td>
						</tr>
					</table>
					<!--
						<i class="fas fa-user-secret" style="font-size: 30px; float: right; color: black;"></i>
						<p style="font-size: 18px;"><?php echo $row['id'] ?><b>  Name: </b><?php echo $row['fname'] . " " . $row['lname']; ?></p>
						<p style="font-size: 18px;"><b>Agency: </b><?php echo $row['organisation']; ?></p>
						!-->

						<?php


						/*
						echo $row['id'] . "<br>";
						echo "First name: " . $row['fname'] . "<br>";
						echo "Last name: " . $row['lname'] . "<br>";
						echo "Agency: " . $row['organisation']. "<br>";
						echo "--------------------------<br/>";*/
					}
				}else{
					echo "No contacts.";
				}
		?>
	</div>
	</div>

</body>
</html>