<?php
	//Init Variables
	$title = "View Account";

	//Header
	require 'header.php';

	//Check if logged in
	if(!ISSET($_SESSION['user_id'])) {
		//Not logged in
		//Redirect to login page
		header('location: login.php');
	}else{
		//Logged in

		//Request account data from db
		$user_id = $_SESSION['user_id'];
		$sql = "SELECT * FROM `t_users` WHERE user_id='$user_id'";
		$userdata = mysqli_query($conn, $sql) or DIE('Bad Select Query');

		//Check if user was found in the database
		if($row = mysqli_fetch_array($userdata)){
			//Store data in variables
			$account_id = $row['user_id'];
			$account_name = $row['user_name'];
			$account_birthday = $row['user_birthday'];
			$account_email = $row['user_email'];
			$account_password = substr($row['user_password'], 0, 16); //Truncated version of the password hash
			$account_team = $row['team_id'];
		}else{
			//User does not exist in database
		}
?>
<html>
	<div class="div-content">
		<h1>
			Your Account
		</h1>

		<p>
			<a href="logout.php">Logout</a>
		</p>

		<p>
			Here is all of the info associated with your account in the database.
		</p>

		<!--User account info-->
		<table>
			<tr>
				<td class="cell-heading">
					ID
				</td>
				<td>
					<?php echo($account_id); ?>
				</td>
			</tr>
			<tr>
				<td class="cell-heading">
					Username
				</td>
				<td>
					<?php echo($account_name); ?>
				</td>
			</tr>
			<tr>
				<td class="cell-heading">
					Creation Date
				</td>
				<td>
					<?php echo($account_birthday); ?>
				</td>
			</tr>
			<tr>
				<td class="cell-heading">
					Email
				</td>
				<td>
					<?php echo($account_email); ?>
				</td>
			</tr>
			<tr>
				<td class="cell-heading">
					Password Hash (truncated)
				</td>
				<td>
					<?php echo($account_password); ?>
				</td>
			</tr>
			<tr>
				<td class="cell-heading">
					Team ID
				</td>
				<td>
					<?php echo($account_team); ?>
				</td>
			</tr>
		</table>

		<p>
			<a href="deleteaccount.php">Delete Account</a>
		</p>

	</div>
</html>
<?php
	}

	//Footer
	require 'footer.php';

?>
