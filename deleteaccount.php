<?php
	//Init Variables
	$title = "Delete Account";
	$msg = "";
     $successmsg = "Your account has been deleted";

	//Header
	require 'header.php';

	//Check if logged in
	if($log_status == true) {

		//----------USER INPUT VALIDATION----------

		//Check for submitbutton
		if(ISSET($_POST['submitbutton'])) {

		     //check if password field is empty
		     if (!empty($_POST['password'])) {

				//-----Get password from database-----

				//Select all of same user_name from t_users
				$user_id = $_SESSION['user_id'];
				$sql = "SELECT * FROM t_users WHERE user_id='$user_id'";
				$userdata = mysqli_query($conn, $sql) or DIE('Bad Select Query');

				//If user exists in database
				if($row = mysqli_fetch_array($userdata)){

					//Check if passwords match
					if(password_verify($_POST['password'], $row['user_password'])){

						//-----User has been verified-----

                              //Insert the new user into the database
						$user_id = $_SESSION['user_id'];
						$user_active = false;
						$sql = "UPDATE `t_users` SET `user_active` = 0 WHERE `t_users`.`user_id` = $user_id;";
                              mysqli_query($conn, $sql);
                              $msg = $successmsg;

						//-----IMMEDIATLY log the user out-----
						//Unset Session Variables
						session_unset();

						//Destroy Session
						session_destroy();

						//Refresh page
						header('location: deleteaccount.php');
                         }else{
                              $msg = "Password is incorrect.";
                         }

				}else{
					$msg = "Uh, you were somehow logged into an account that doesn't exist in the database. This should not be possible, please contact me at GreenBalaclavaMan@protonmail.com, I would love to know how you managed this.";
				}

		     }else{
		          $msg = "Please enter your password.";
		     }
		}
	}else{
		//-----user is not logged in, redirect-----
		header('Location: index.php');
	}
?>
<html>
	<div class="div-content">

		<h1>
			Delete Account
		</h1>

		<!--Delete Account Form-->
          <form method="POST" action="deleteaccount.php">
			<p>
				Enter your password to verify your identity.
			</p>
               <input type="password" name="password" placeholder="Password">
               <input type="submit" name="submitbutton" value="Delete Account">
          </form>
<?php
     	if ($msg == $successmsg) {
?>
		     <font color="lime">
		     <p>
		          <?php echo $msg; ?>
		     </p>
<?php
		}else{
?>
		     <font color="red">
		     <p>
		          <?php echo $msg; ?>
		     </p>
<?php
		}
?>
	</div>
</html>
<?php

	//Footer
	require 'footer.php';

?>
