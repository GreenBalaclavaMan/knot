<?php
     $conn = mysqli_connect('localhost','root','','db_lobsterboard');//or DIE('No Connection');
	// Check connection
	if (!$conn) {
	  die("Error - Could not connect to database!" . mysqli_connect_error());
	}
?>
