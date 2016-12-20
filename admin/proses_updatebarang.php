<?php

	session_start();
	include "koneksi.php";
	
	if(isset($_POST['update'])){
		
		$id=$_GET['id'];
		$nama_produk=$_POST['nama_produk'];
		$harga_produk=$_POST['harga_produk'];
		$stok_produk=$_POST['stok_produk'];
		
		$sql="update product set nama_produk='$nama_produk' , harga_produk=$harga_produk, stok_produk=$stok_produk where kd_produk='$id'";
		
		if(mysqli_query($conn,$sql)){
			header('location:barang.php');
		}else{
			echo "Error ".$sql."<br>".mysqli_error($conn);
		}
		

		
	}
	
?>