<?php
	
	session_start();
	include "koneksi.php";
	
	if(isset($_POST['update'])){
		
		$id=$_GET['id'];
		$nama=$_POST['nama'];
		$alamat=$_POST['alamat'];
		$no_hp=$_POST['no_hp'];
		$email=$_POST['email'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		
		$sql="update pembeli set nama='$nama' ,alamat='$alamat', no_hp='$no_hp', username='$username', password='$password' where id_user=$id";
		
		if(mysqli_query($conn,$sql)){
			header('location:user.php');
		}else{
			echo "Error".$query."<br>".mysqli_error($conn);
		}
		
	}

?>