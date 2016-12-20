<?php

	session_start();
	include "koneksi.php";
	
	$id=$_GET['id'];
	$query="select *from categori where kd_kategori='$id'";
	$hasil=mysqli_query($conn,$query);
	$data=mysqli_fetch_assoc($hasil);

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
		<title>Update Katalog</title>
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
		<h2>Update Katalog</h2>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane  fade in active" id="1">
				<div class="col-md-5">
		<form action="proses_updatekatalog.php?id=<?php echo $data['kd_kategori'];?>" method="POST">
				<div class="row" style="margin-bottom: 15px;">
					<div class="form-group">
						<div class="col-md-5">
							<label for="">Nama Katalog</label>
						</div>
						<div class="col-md-7">
							<input type="text" class="form-control" id="" name="nama_kategori" value="<?php echo $data['nama_kategori'];?>">
						</div>
					</div>
				</div>
				<button type="submit" name="update" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</div>		
		</form>
  <!-- Bagian Footer -->
  <footer id="footer">
    <p>&copy; 2015 Abdul Aziz Priatna. All rights reserved.</p>
  </footer>		
	</body>
</html>