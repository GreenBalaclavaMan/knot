<?php
	//Init Variables
	$title = "Create Account";
	$msg = "";
     $successmsg = "Account successfully created";
	$user_name = "";
	$user_email = "";

	//Header
	require 'header.php';

	//----------USER INPUT VALIDATION----------

	//Check for submitbutton
	if(ISSET($_POST['submitbutton'])) {

          //check if newuser field is empty
          if (!empty($_POST['newuser'])) {

			//-----Username duplicate check-----

			//Select all of same user_name from t_users
			$newuser = $_POST['newuser'];
			$sql = "SELECT * FROM t_users WHERE user_name='$newuser' AND user_active=true";
			$userdata = mysqli_query($conn, $sql) or DIE('Bad Select Query');
			$dupcount = 0;

			while($row = mysqli_fetch_array($userdata)){
				if($_POST['newuser'] == $row['user_name']){
					$dupcount ++;
				}
			}



			//If no duplicates
			if ($dupcount == 0){
				$user_name = $_POST['newuser'];

				//Validate email
				if (filter_var($_POST['newemail'], FILTER_VALIDATE_EMAIL)) {
					$user_email = $_POST['newemail'];

		               //check if password field is empty
		               if (!empty($_POST['newpassword'])) {
		                    //check if retype password field is empty
		                    if (!empty($_POST['newpassword2'])) {
		                         //check if passwords match
		                         if ($_POST['newpassword'] == $_POST['newpassword2']) {
								//Hash the password
								$user_password = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);

								//user_verified
								$user_verified = false;

								//user_active
								$user_active = true;

	                                   //Insert the new user into the database
	                                   $sql = "INSERT INTO `t_users`(`user_id`, `user_name`, `user_birthday`, `user_email`, `user_password`, `user_verified`, `user_active`) VALUES (NULL,'$user_name',NULL,'$user_email','$user_password','$user_verified', '$user_active')" or DIE('Bad Insert Query');
	                                   mysqli_query($conn, $sql);
	                                   $msg = $successmsg;

								//Clear form
								$user_name = "";
								$user_email = "";
		                         }else{
		                              $msg = "Passwords do not match.";
		                         }

		                    }else{
		                         $msg = "Please confirm password.";
		                    }

		               }else{
		                    $msg = "Please enter a password.";
		               }
				}else{
					$msg = "Invalid email format";
				}
			}else{
				$msg = "The username, " . $_POST['newuser'] . ", is already taken. Please try a different one.";
			}

          }else{
               $msg = "Please enter a username.";
          }

     }
?>
<html>
	<div class="div-content">

		<h1>
			Account Creation
		</h1>

		<!--Create Account Form-->
          <form method="POST" action="createaccount.php">
			<label for="newuser">Username</label>
               <input type="text" id="newuser" name="newuser" placeholder="Your new username" value="<?php echo($user_name); ?>">
			<label for="newemail">Email</label>
			<input type="text" id="newemail" name="newemail" placeholder="Your email" value="<?php echo($user_email); ?>">
			<label for="newpassword">Password</label>
               <input type="password" id="newpassword" name="newpassword" placeholder="A password">
               <input type="password" name="newpassword2" placeholder="Confirm your password">
               <input type="submit" name="submitbutton" value="Create Account">
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
		<p>
		     When you're done, you can <a href="login.php" color="aqua">login</a>.
		</p>
	</div>
</html>
<?php

	//Footer
	require 'footer.php';

?>
