<?php
	
	session_start();
	include "koneksi.php";
	
	if(isset($_POST['update'])){
		
		$kd_katalog=$_GET['id'];
		$nama_katalog=$_POST['nama_kategori'];
		
		$sql = "update categori set nama_kategori='$nama_katalog' where kd_kategori='$kd_katalog'";
		
		if(mysqli_query($conn,$sql)){
			header('location:katalog.php');
		}
		
	}

?>