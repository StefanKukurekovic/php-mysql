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
				<img src="img/add.png" title="Add new contacts">
			</div>
			<div  class="left_icon">
				<a href="index.php"><img src="img/search.png" title="Search for contacts"></a>
			</div>
			<div class="right_icon">
				<a href="remove.php"><img src="img/remove.png" title="Remove contact"></a>
			</div>

			<form action="#" method="POST"><!-- POST method now, just to see how it works here, instead of GET!--> 	  <label><b>First name:</b><br/>
				<input type="text" name="fname" placeholder="First name..." size="18" style="margin-bottom: 5px;">
				</label><br/>
				<label><b>Last name:</b><br/>
				<input type="text" name="lname" placeholder="Last name..." size="18" style="margin-bottom: 5px;">
				</label><br/>
				<label><b>Tel:</b><br/>
				<input type="text" name="tel" placeholder="Telephone..." size="18">
				</label>
				<input type="submit" name="insert" value="Insert">								
			</form>
		</div>
		<div id="message">
			<?php
				// [1] Check if parameters are set (if the butten "Insert" is clicked)
				if(isset($_POST['insert'])){
					// [2] Check if ALL parameters we need are sent
					if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['tel'])){
						// [3] Check if sent parameters are not empty
						if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['tel'])) {

							// Remove empty spaces from beginning and the end of variables
							$fname = trim($_POST['fname']);
							$lname = trim($_POST['lname']);
							$tel = trim($_POST['tel']);

							// Connect to db
							require 'inc/connect.php';

							// Basic safety measures
							$fname = mysqli_real_escape_string($conn, $fname);
							$lname = mysqli_real_escape_string($conn, $lname);
							$tel = mysqli_real_escape_string($conn, $tel);

							// writing into db
							$query = "INSERT INTO  contacts (fname, lname, tel) VALUES ('{$fname}', '{$lname}', '{$tel}')";

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

	</div>

</body>
</html>