<?php
	
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "online_shop";// <--- dbnya bedain

	$conn = mysqli_connect($host,$user,$pass,$db);
	
	if(!$conn){
		echo"failed to connect to database";
	}

?>