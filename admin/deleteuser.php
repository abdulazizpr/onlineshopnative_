<?php
	
	session_start();
	include "koneksi.php";

	$id=$_GET['id'];
	
	$sql="delete from pembeli where id_user=$id";
	
	if(mysqli_query($conn,$sql)){
		header('location:user.php');
	}else{
		echo "Error".$sql."<br>".mysqli_error($conn);
	}
	
?>