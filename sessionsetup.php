<?php
	//Get session status
	/*
	switch(session_status()) {
		case 0:
			$session_status = "DISABLED";
			break;
		case 1:
			$session_status = "NONE";
			break;
		case 2:
			$session_status = "ACTIVE";
			break;
	}
	*/

	//setup of session
	session_start();

	//Check if logged in
	if(ISSET($_SESSION['user_id'])) {
		$log_status = true;
	}else{
		$log_status = false;
	}
?>
