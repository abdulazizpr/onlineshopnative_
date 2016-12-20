<?php

	include "koneksi.php";
	session_start();
	
	if(isset($_POST['tambah'])){
		header("location:login.php");
	}else{
		header("location:index.php");
	}	

?>