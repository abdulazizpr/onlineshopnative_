<?php
	session_start();
	include "koneksi.php";
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
		<title>Halaman Admin | List Katalog</title>
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
            <li  class="active"><a href="katalog.php">List Katalog</a></li>
            <li><a href="barang.php">Data Barang</a></li>
            <li><a href="brg.php">Input Barang</a></li>
            <li><a href="transaksi.php">Data Transaksi</a></li>
			<li><a href="view.php">Report View</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
		</br>
		<form action="proses_tambahkatalog.php" method="post">
			<input type="text" name="nama_kategori" placeholder="Masukan Katalog">
			<input type="submit" name="tambah" value="Tambah Katalog" class="btn btn-primary">
		</form>
		</br>
		<table class="table table-hover">
			<thead>
			<tr>
				<th>No.</th>
				<th>KODE KATALOG</th>
				<th>NAMA KATALOG</th>
				<th>Aksi</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<?php
					$query="select *from categori";
					$hasil=mysqli_query($conn,$query);
					$i=1;
					while($data=mysqli_fetch_array($hasil)){
				?>
				<td><?php echo $i;?></td>
				<td><?php echo $data['kd_kategori'];?></td>
				<td><?php echo $data['nama_kategori'];?></td>
				<td>
				<a href="updatekatalog.php?id=<?php echo $data['kd_kategori'];?>" class="btn btn-xs btn-success">Update</a>  
				<a href="deletekatalog.php?id=<?php echo $data['kd_kategori'];?>" class="btn btn-xs btn-danger">Delete</a> 
				</td>
			</tr>
				<?php
					$i++;
				}
				?>
			</tobdy>	
		</table>
		
  <!-- Bagian Footer -->
  <footer id="footer">
    <p>&copy; 2015 Abdul Aziz Priatna. All rights reserved.</p>
  </footer>		
	</body>
</html>