<?php

session_start();

echo "Welcome back, " .$_SESSION['username'];

include('./includes/header.php');

if($_SESSION['username'] != NULL) {

	echo "You are currently logged in!";
	
} else {

	echo "You are currently logged out."
}

?>