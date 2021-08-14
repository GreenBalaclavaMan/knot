<?php
	//Init Variables
	$title = "Knot View";
	$msg = "";
	$account_id = "";
	$account_name = "";
	$account_joindate = "";

	//Header
	require 'header.php';

	//GET data (see what i did there, haha, a m o g u s)
	if(ISSET($_GET['id'])) {
		//Request account data from db
		$user_id = preg_replace("/[^0-9]/", "", $_GET['id']); //strip non numeric data, preventing sneaky injection business
		$sql = "SELECT * FROM `t_users` WHERE user_id='$user_id'";
		$userdata = mysqli_query($conn, $sql) or DIE('Bad Select Query');

		//Check if user was found in the database
		if($row = mysqli_fetch_array($userdata)){
			//Store data in variables
			$account_id = $row['user_id'];
			$account_name = $row['user_name'];
			$account_joindate = $row['user_joindate'];
		}else{
			//User does not exist in database
		}
	}else{
		$msg = "You're knot supposed to be here...";
	}
?>
<html>
	<div class="div-content">
		<h1>
			Knot View
		</h1>
		<p>
			<?php echo($msg); ?>
		</p>

		<!--GET data-->
		<p>
			<?php echo($account_name); ?>
		</p>
	</div>
</html>
<?php

	//Footer
	require 'footer.php';

?>
