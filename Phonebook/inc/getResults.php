<?php
// Ukljuci konekciju iz connect.php fajla
require 'connect.php';

// Da li je korisnik upisao neki kriterijum za pretragu
if(isset($_GET['criteria'])) {
	if(!empty($_GET['criteria']))
	{	// iseci razmake sa pocetka i kraja stringa
		$criteria = trim($_GET['criteria']);
		// Osnovne zastitne mere
		$criteria = mysqli_real_escape_string($conn, $criteria);

		// Query: selektuj sva polja iz tabele contact gde je ime "nesto sto lici na kriterijum" (moze biti i deo imena ili slovo)
		$query = "SELECT * FROM contacts WHERE fname LIKE '%{$criteria}%' OR lname LIKE '%{$criteria}%'";
		$result = mysqli_query($conn, $query);
		// ako je broj redova koji je vracen u $result > 0 -> znaci da imamo neki rezultat i da ga treba obraditi
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
			echo "No results.<br/>";
		}

	}else{ //ukoliko je korisnik samo kliknuo SUBMIT bez unosa
		echo "Criteria is empty.<br/>";
	}
}
?>