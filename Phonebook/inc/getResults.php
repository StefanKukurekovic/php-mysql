<?php
// connect to db
require 'connect.php';

// Check if user has entert some search criteria
if(isset($_GET['criteria'])) {
	if(!empty($_GET['criteria'])){	
		
		// crop empty spaces from beining and the end of the string
		$criteria = trim($_GET['criteria']);

		// Basic safety measures
		$criteria = mysqli_real_escape_string($conn, $criteria);

		// Query: select all fields from the table 'contacts' where neme is 'something that looks like criteria' (it can also be just a part of a name or just one letter)
		$query = "SELECT * FROM contacts WHERE fname LIKE '%{$criteria}%' OR lname LIKE '%{$criteria}%'";
		$result = mysqli_query($conn, $query);

		// if the number of rows is > 0 there is some value and it needs to be process
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				?>
				<div id="result">
					<i class="fas fa-user-check" style="font-size: 30px; float: right;"></i>
					<p style="font-size: 18px;"><b>Name: </b><?php echo $row['fname'] . " " . $row['lname']; ?></p>
					<p style="font-size: 18px;"><b>Tel: </b><?php echo $row['tel']; ?></p>
				</div>
				<?php
			}
			echo "Number of results: " . mysqli_num_rows($result);
		}else{
			?>
			<p style="color: white;"><b>No results!</b></p>
			<?php
		}

	}else{ 
		// If the user clicked SUBMIT with out any input
		echo "Criteria is empty.<br/>";
	}
}
?>