<?php
	
	session_start();
	include "koneksi.php";

	if(isset($_POST['tambah'])){
		
		$nama=$_POST['nama'];
		$alamat=$_POST['alamat'];
		$no_hp=$_POST['no_hp'];
		$email=$_POST['email'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		
		$sql="insert into pembeli (nama,alamat,no_hp,email,username,password) values ('$nama','$alamat','$no_hp','$email','$username','$password')";
		
		
	}
	
?>

<!DOCTYPE html>
<?php
	if($_SESSION['logged_in']!=true){
		header('location:index.php');
	}
	
	$username=$_SESSION['admin'];
?>

<html>
	<head>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/app.css">
	<link rel="icon" href="../img/a.png" type="image/gif" sizes="16x16">
    <title>Halaman Admin | User</title>
	</head>
	<body>
		<header>
			<div class="container-fluid">
			<a href="index.php">
			<h1>Panel <?php echo $username;?></h1>
			</a>
		</header>
		<div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="user.php">Data User</a></li>
            <li><a href="katalog.php">List Katalog</a></li>
            <li class="active"><a href="barang.php">Data Barang</a></li>
            <li><a href="brg.php">Input Barang</a></li>
            <li><a href="transaksi.php">Data Transaksi</a></li>
			<li><a href="view.php">Report View</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
		<?php if(mysqli_query($conn,$sql)){?>
		<div class="alert alert-success" role="alert">
			<strong> Berhasil </strong> </br>User berhasil di inputkan
		</div>
		<h2>Data User</h2>
		<form action="tambahuser.php" method="post">
		<table class="table table-hover">
			<thead>
			<tr>
				<th>No.</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>No HP</th>
				<th>email</th>
				<th>username</th>
				<th>Aksi</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<?php
					$query="select *from pembeli";
					$hasil=mysqli_query($conn,$query);
					$i=1;
					while($data=mysqli_fetch_assoc($hasil)){
				?>
				<td><?php echo $i;?></td>
				<td><?php echo $data['nama'];?></td>
				<td><?php echo $data['alamat'];?></td>
				<td><?php echo $data['no_hp'];?></td>
				<td><?php echo $data['email'];?></td>
				<td><?php echo $data['username'];?></td>
				<td>
				<a href="updateuser.php?id=<?php echo $data['id_user'];?>" class="btn btn-xs btn-success">Update</a>  
				<a href="deleteuser.php?id=<?php echo $data['id_user'];?>" class="btn btn-xs btn-danger">Delete</a>
				</td>
			</tr>
				<?php
					$i++;
				}
				?>
			</tbody>	
		</table>
		</div>	<input type="submit" name="tambah" value="Tambah User" class="btn btn-primary">
		</form>
		<?php
		}else{
			echo "Error".$sql."<br>".mysqli_error($conn);
		}
		?>
		<!-- Bagian Footer -->
  <footer id="footer">
    <p>&copy; 2015 Abdul Aziz Priatna. All rights reserved.</p>
  </footer>
	</body>
</html>