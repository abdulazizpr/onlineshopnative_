<?php
	
	session_start();
	include "koneksi.php";

?>

<!DOCTYPE HTML>
<html>
<head>
	<title>azizSHOP</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link href="css/full-slider.css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/login.js"></script>
	<link rel="icon" href="img/a.png" type="image/gif" sizes="16x16">
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
					<li>
 
					  <div class="dropdown">
						<button type="button" class="btn btn-default navbar-btn" data-toggle="dropdown">Login</button>
					 
						<div class="dropdown-menu" style="padding: 10px; background: #ddd">
						  <form action="user/proses_login.php" role="form" method="POST">
							<div class="form-group">
							  <label for="user">Username</label>
							  <input type="text" class="form-control" id="user" placeholder="Username" name="username" />
							  <label for="password">Password</label>
							  <input type="password" class="form-control" id="password" placeholder="Password" name="password"/>
							</div>
							<button type="submit" class="btn btn-default" name="login">Log in</button>
							<p>Belum member? Silahkan <a href="daftar.php">daftar</a></p>
						  </form>
						</div>
					  </div>
					 
					</li>
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

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                            </ol>
                            <div class="carousel-inner">
								<div class="item active">
                                    <img class="slide-image" src="img/apple-iphone-6-16-gb-silver-1297-857005-1-zoom.jpg" alt="" width=800 height=100>
                                </div>
								<div class="item">
                                    <img class="slide-image" src="img/lg-wdm1070d6-mesin-cuci-front-loading-7-kg-putih-2185-891258-1-zoom.jpg" alt="" width=800 height=100>
                                </div>
								<div class="item">
                                    <img class="slide-image" src="img/philips-az385-cd-soundmachine-hitam-6673-754718-1-zoom.jpg" alt="" width=800 height=100>
                                </div>
								<div class="item">
                                    <img class="slide-image" src="img/samsung-32-led-tv-ua32fh4003-hitam-5630-254504-1-zoom.jpg" alt="" width=800 height=100>
                                </div>
								<div class="item">
                                    <img class="slide-image" src="img/sanyo-refrigerator-kulkas-2-pintu-srd235nsb-silver-3336-856093-1-zoom.jpg" alt="" width=800 height=100>
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
				</div>	
				</br>
				<h1>Produk Baru</h1>
                <div class="row">
					<?php
						$sql="select *from product group by kd_kategori";
						$hasil=mysqli_query($conn,$sql);
						while($data=mysqli_fetch_array($hasil)){
					?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="img/<?php echo $data['image_produk']?>" alt="" width=320 height=150>
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