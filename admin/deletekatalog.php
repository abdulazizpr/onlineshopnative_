<?php

	session_start();
	include "koneksi.php";
	
	$id=$_GET['id'];
	
	$delete_produk="delete from product where kd_kategori='$id'";
	
	$resulst=mysqli_query($conn,$delete_produk);
	
	$sql="delete from categori where kd_kategori='$id'";
	
	if(mysqli_query($conn,$sql)){
		header('location:katalog.php');
	}else{
		echo "Error".$sql."<br>".mysqli_error($conn);
	}
	

?>