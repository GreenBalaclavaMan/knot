<?php
     $conn = mysqli_connect('localhost','root','','db_knot');//or DIE('No Connection');
	// Check connection
	if (!$conn) {
	  die("Error - Could not connect to database!" . mysqli_connect_error());
	}
?>
