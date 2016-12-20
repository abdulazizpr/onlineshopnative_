<?php

	if(isset($_POST['login'])){
		session_start();
		
		include "koneksi.php";
		
		$username=$_POST['username'];
		$password=$_POST['password'];
		
		$query=mysqli_query($conn,"select *from admin where username='$username' and password='$password'");
		$data=mysqli_fetch_array($query,MYSQLI_ASSOC);
		
		if($username==$data['username'] && $password==$data['password']){
			$_SESSION['admin'] = $username;
			$_SESSION['logged_in'] = true;
			header('location:user.php');
		}else{
			echo "username/password salah silahkan coba lagi";
		}
	}


?>