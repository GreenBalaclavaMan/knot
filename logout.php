<?php

	//Session Setup
	require 'sessionsetup.php';

	//Unset Session Variables
	session_unset();

	//Destroy Session
     session_destroy();

	//Redirect to index
     header('location:index.php');
?>
