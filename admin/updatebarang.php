<?php

	session_start();
	include "koneksi.php";
	
	$id=$_GET['id'];
	$query="select *from product where kd_produk='$id'";
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
		<title>Update Barang</title>
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
		<h2>Update Barang</h2>
		<div class="tab-content">
				<div role="tabpanel" class="tab-pane  fade in active" id="1">
					<div class="col-md-5">
		<form action="proses_updatebarang.php?id=<?php echo $data['kd_produk'];?>" method="POST">
				<div class="row" style="margin-bottom: 15px;">
					<div class="form-group">
						<div class="col-md-5">
							<label for="">Nama Barang</label>
						</div>
						<div class="col-md-7">
							<input type="text" class="form-control" id="" name="nama_produk" value="<?php echo $data['nama_produk'];?>">
						</div>
					</div>
				</div>
				<div class="row" style="margin-bottom: 15px;">
					<div class="form-group">
						<div class="col-md-5">
							<label for="">Harga Barang</label>
						</div>
						<div class="col-md-7">
							<input type="text" class="form-control" id="" <input type="text" name="harga_produk" value="<?php echo $data['harga_produk'];?>">
						</div>
					</div>
				</div>
				<div class="row" style="margin-bottom: 15px;">
					<div class="form-group">
						<div class="col-md-5">
							<label for="">Stok Produk</label>
						</div>
						<div class="col-md-7">
							<input type="text" class="form-control" id="" name="stok_produk" value="<?php echo $data['stok_produk'];?>">
						</div>
					</div>
				</div>
				<button type="submit" name="update" class="btn btn-primary">Simpan</button>
				<button type="submit" name="batal" class="btn btn-warning">Batal</button>
			</div>
		</div>
		</div>
		</form>
 <footer id="footer">
    <p>&copy; 2015 Abdul Aziz Priatna. All rights reserved.</p>
  </footer>		
	</body>
</html>