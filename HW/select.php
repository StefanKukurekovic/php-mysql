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

					// Table headers
					?>
						<table>
							<tr>
								<th class="td_first">ID</th>
								<th class="td_other">First name</th>
								<th class="td_other">Last name</th>
								<th class="td_other">Agency</th>
								<th class="td_last">Status</th>
							</tr>
						</table>
					<?php
				// If db is not empty
				if(mysqli_num_rows($result) > 0){

					// Couter is here for table style
					$i = 0;
					while($row = mysqli_fetch_assoc($result)){
					?>
						<table>
							<tr>
								<?php echo ($i % 2)?'<tr class="odd">':'<tr class="even">'; ?>
								<td class="td_first"><?php echo $row['id'] ?>.</td>
								<td class="td_other"><?php echo $row['fname'] ?></td>
								<td class="td_other"><?php echo $row['lname'] ?></td>
								<td class="td_other"><?php echo $row['organisation'] ?></td>
								<td class="td_last">Agent <i class="fas fa-user-secret" style="font-size: 25px; float: right; color: black;"></i></td>
							</tr>
						</table>
					<?php
					$i++;

					}
				}else{
					echo "No contacts.";
				}
		?>
	</div>
	</div>

</body>
</html>