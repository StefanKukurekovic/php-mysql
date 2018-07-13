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

	<div id="wrap-insert">
		<form action="#" method="POST">	  
			<label><b>First name:</b><br/>
				<input type="text" name="fname" placeholder="First name..." size="28" style="margin-bottom: 5px;">
				</label><br/>
				<label><b>Last name:</b><br/>
				<input type="text" name="lname" placeholder="Last name..." size="28" style="margin-bottom: 5px;">
				</label><br/>
				<label><b>Tel:</b><br/>
				<input type="text" name="organisation" placeholder="Agency..." size="28">
				</label>
				<input type="submit" name="insert" value="Insert">								
			</form>

			<?php
				// [1] Check if parameters are set (if the button "Insert" is clicked)
				if(isset($_POST['insert'])){
					// [2] Check if ALL parameters we need are sent
					if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['organisation'])){
						// [3] Check if sent parameters are not empty
						if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['organisation'])) {

							// Remove empty spaces from beginning and the end of variables
							$fname = trim($_POST['fname']);
							$lname = trim($_POST['lname']);
							$organisation = trim($_POST['organisation']);

							// Connect to db
							require 'inc/conn.php';

							// Basic safety measures
							$fname = mysqli_real_escape_string($conn, $fname);
							$lname = mysqli_real_escape_string($conn, $lname);
							$organisation = mysqli_real_escape_string($conn, $organisation);

							// writing into db
							$query = "INSERT INTO  agents (fname, lname, organisation) VALUES ('{$fname}', '{$lname}', '{$organisation}')";

							// If query was executed successfully without error send this message
							if(mysqli_query($conn, $query) === TRUE){
								echo "New record successfully created.";
							}else{
								echo "Error!";
							}
						}else{
							// [3] If some fields are not filled
							echo "All fields must be filled in.";
						}
					}else{
						// [2] If some of the parameters are not sent
						echo "All parameters must be sent!";
					}
				}
			?>
	</div>

</body>
</html>