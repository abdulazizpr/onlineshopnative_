<?php

	if(isset($_POST['login'])){
		session_start();
		
		include "koneksi.php";
		
		$username=$_POST['username'];
		$password=$_POST['password'];
		
		 $query="select *from pembeli where username='$username' and password='$password'";
		// $data=mysqli_fetch_array($query,MYSQLI_ASSOC);
		
		$result = mysqli_query($conn,$query)or die(mysqli_error());
		$num_row = mysqli_num_rows($result);
		$row=mysqli_fetch_array($result);
		if( $num_row ==1 ){
			$_SESSION['userid']=$row['userid'];
			$_SESSION['username']=$username;
			$_SESSION['logged_in']=true;
			header("location:index.php");
			//echo 'hi there';
			//exit;
		 }
		 else{
			?>			
			<script language="JavaScript">
			alert('Username atau password Anda salah');
			document.location='index.php'
			</script>
		<?php	
			}
	}
?>