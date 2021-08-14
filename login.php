<?php
	//Init Variables
	$title = "Login";
	$msg = "";
	$username = "";
	$password = "";

	//Header
	require 'header.php';

	//Check for submit
     if(ISSET($_POST['submitbutton'])) {

		//Check if username field is empty
		if (!empty($_POST['username'])) {

			//Query database for associated username
			$username = $_POST['username'];
			$password = $_POST['password'];
			$sql = "SELECT * FROM `t_users` WHERE user_name='$username' AND user_active=true";
			$userdata = mysqli_query($conn, $sql) or DIE('Bad Select Query');

			//Check if username exists in database
			if($row = mysqli_fetch_array($userdata)){

				//Check if password field is empty
				if(!empty($_POST['password'])) {

					//Check if passwords match
		               if(password_verify($password, $row['user_password'])){
						//login shenanigans
					     session_start();

	                         //Store user data in session
	                         $_SESSION['user_id'] = $row['user_id'];
	                         $_SESSION['user_name'] = $row['user_name'];

						//Redirect to account view
	                         header('location: viewaccount.php');
		               }else{
		                    $msg = "Incorrect password";
		               }

				}else{
					$msg = "Please enter a password";
				}

			}else{
				$msg = "User does not exist";
			}

		}else{
	          $msg = "Please enter a username";
		}
     }

?>

<html>
     <div class="div-content">

		<h1>
			Login
		</h1>

          <!--login form-->
          <form method="POST" action="login.php">
               <input type="text" name="username" placeholder="Username">
               <input type="password" name="password" placeholder="Password">
               <input type="submit" name="submitbutton" value="Login">
          </form>

          <p>
               <?php echo $msg; ?>
		</p>

		<p>
          	Dont have an account? You can create one <a href="createaccount.php" color="aqua">here</a>.
		</p>
     </div>
</html>
<?php

	//Footer
	require 'footer.php';

?>
