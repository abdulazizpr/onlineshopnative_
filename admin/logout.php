<?php
	session_start();
	
	unset($_SESSION["admin"]);
	unset($_SESSION["logged_in"]);
	header('location:index.php');

?>