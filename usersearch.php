<?php
	//Init Variables
	$title = "View Account";
	$msg = "";

	//Header
	require 'header.php';

	//Check for input
	if(ISSET($_POST['submitbutton'])) {
		if(ISSET($_POST['searchquery'])) {
			if($_POST['searchquery'] != '') {

				//Perform query
				$searchquery = $_POST['searchquery'];
				$sql = "SELECT * FROM `t_users` WHERE user_name='$searchquery'";
				$querydata = mysqli_query($conn, $sql);

				//Check if user was found in the database
				if($row = mysqli_fetch_array($querydata)){
					//redirect to knotview.php with $row['user_id']
					header('location: knotview.php?id=' . $row[0]);
				}else{
					$msg = "User does not exist in database.";
				}
			}else{
				$msg = "Please enter a search query";
			}
		}
	}
?>
<html>
	<div class="div-content">
		<h1>
			User Search
		</h1>

		<!--User search-->
		<form method="POST" action="usersearch.php">
			<input type="text" name="searchquery" placeholder="Enter a persons name">
			<input type="submit" name="submitbutton" value="Search">
		</form>

		<p>
			<?php echo($msg); ?>
		</p>
	</div>
</html>
<?php

	//Footer
	require 'footer.php';

?>
