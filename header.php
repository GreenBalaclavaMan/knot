<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
	//Gain Conn
	require 'scripts/dbc.php';

	//Session Setup
	require 'sessionsetup.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
     <head>
     	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1.0">

     	<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />

          <link rel="preconnect" href="https://fonts.googleapis.com">
          <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
          <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">

          <!--Page Title-->
          <title>
               <?php echo "LobsterBoard - " . $title; ?>
          </title>
     </head>

     <body>

          <!-- start of main page content. -->
          <div class="div-main">

               <!--Banner-->
               <div class="div-header">
				<!--Logo-->
				<div class="header-logo">
	                    <a href="index.php">
	                         <img class="header-logo" src="images/logo.png" alt="WebOTP Logo">
	                    </a>
				</div>

				<!--Navigation Links-->
				<div class="header-navigation">
	                    <a class="navigation-link" href="viewaccount.php">Account</a>
				</div>
			</div>

</html>
