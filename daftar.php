<?php
	session_start();
	include "koneksi.php";
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>azizSHOP | Daftar</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link href="css/full-slider.css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
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
			<h1>Silahkan Daftar</h1>
			<div class="col-md-5">
            <form action="proses_daftar.php" method="post" role="form" style="margin-top: 30px;">
              <div class="row" style="margin-bottom: 15px;">
                <div class="form-group">
                  <div class="col-md-5">
                    <label for="">Nama</label>
                  </div>
                  <div class="col-md-7">
                    <input type="text" class="form-control" id="" name="nama" placeholder="Masukan Nama">
                  </div>
                </div>
              </div>
              <div class="row" style="margin-bottom: 15px;">
				<div class="form-group">
				  <div class="col-md-5">
					<label for="">Alamat Rumah</label>
				  </div>
				  <div class="col-md-7">
					<textarea class="form-control" rows="3" name="alamat" placeholder="Masukan Alamat Rumah"></textarea>
				  </div>
				</div>
			  </div>
			  <div class="row" style="margin-bottom: 15px;">
                <div class="form-group">
                  <div class="col-md-5">
                    <label for="">No. Hp</label>
                  </div>
                  <div class="col-md-7">
                    <input type="text" class="form-control" id="" name="no_hp" placeholder="Masukan No. HP">
                  </div>
                </div>
              </div>
			  <div class="row" style="margin-bottom: 15px;">
                <div class="form-group">
                  <div class="col-md-5">
                    <label for="">Email</label>
                  </div>
                  <div class="col-md-7">
                    <input type="text" class="form-control" id="" name="email" placeholder="Masukan Email">
                  </div>
                </div>
              </div>
			  <div class="row" style="margin-bottom: 15px;">
                <div class="form-group">
                  <div class="col-md-5">
                    <label for="">Username</label>
                  </div>
                  <div class="col-md-7">
                    <input type="text" class="form-control" id="" name="username" placeholder="Masukan Username">
                  </div>
                </div>
              </div>
			  <div class="row" style="margin-bottom: 15px;">
                <div class="form-group">
                  <div class="col-md-5">
                    <label for="">Password</label>
                  </div>
                  <div class="col-md-7">
                    <input type="password" class="form-control" id="" name="password" placeholder="Masukan Password">
                  </div>
                </div>
              </div>
              <button type="submit" name="daftar" class="btn btn-primary">Daftar</button>
              <button type="submit" class="btn btn-warning">Batal</button>
          </div>
        </div>

    </div>
    <!-- /.container -->

</body>
</html>