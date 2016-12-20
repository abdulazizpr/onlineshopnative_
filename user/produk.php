<?php

	session_start();
	include "koneksi.php";
	
?>

<!DOCTYPE html>
<?php
	if($_SESSION['logged_in']!=true){
		header('location:../index.php');
	}
	
	$username=$_SESSION['username'];
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>azizSHOP | Produk</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link href="../css/full-slider.css" rel="stylesheet">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<link rel="icon" href="../img/a.png" type="image/gif" sizes="16x16">
	<style>
		.carousel-inner > .item > img,
		.carousel-inner > .item > a > img {
		width: 70%;
		margin: auto;
		}
	</style>
</head>
<body>
	<div class="navbar navbar-inverse">
		<div class="container">
			<a href="index.php" class="navbar-brand" style="color:white">azizSHOP</a>
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php">Home</a></li>
					<li><a href="produk.php">Produk</a></li>
					<li><a href="pesan.php">Cara Pemesanan</a></li>
					<li><a href="kontak.php">Kontak</a></li>
					<li><a href='logout.php'><?php echo $username?> (Keluar)</a></li>
				</ul>
			</div>			
		</div>
	</div>
	<!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <div class="list-group">
					<?php
						$sql="select *from categori";
						$hasil=mysqli_query($conn,$sql);
						while($data=mysqli_fetch_array($hasil)){
					?>
                    <a href="kategori.php?id=<?php echo $data['kd_kategori']?>" class="list-group-item"><?php echo $data['nama_kategori']?></a>
					<?php
						}
					?>
				</div>
            </div>
			<h1>Semua Produk</h1>
            <div class="col-md-9">
			
                <div class="row">
					<?php
						$sql="select *from product";
						$hasil=mysqli_query($conn,$sql);
						while($data=mysqli_fetch_array($hasil)){
					?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="../img/<?php echo $data['image_produk']?>" alt="" width=320 height=150>
                            <div class="caption">
                                <h4><a href="barang.php?id=<?php echo $data['kd_produk']?>"><?php echo $data['nama_produk']?></a>
                                </h4>
                                <p>Rp <?php echo number_format($data['harga_produk'],2,",",".")?></p>
                            </div>
                        </div>
                    </div>
					<?php
						}
					?>
                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

</body>
</html>