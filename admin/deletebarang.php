<?php
	
	session_start();
	include "koneksi.php";

	$id=$_GET['id'];
	
	$sql="delete from product where kd_produk='$id'";
	
	if(mysqli_query($conn,$sql)){
		header('location:barang.php');
	}else{
		echo "Error".$sql."<br>".mysqli_error($conn);
	}
	
?>
