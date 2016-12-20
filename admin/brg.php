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
		<title>Halaman Admin | Input Barang</title>
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
		<h2>Input Barang</h2>
		<!-- Tab panes -->
      <div class="tab-content">

        <div role="tabpanel" class="tab-pane  fade in active" id="1">
          
          <div class="col-md-5">
		<form action="proses_barang.php" method="post" enctype="multipart/form-data">
			<div class="row" style="margin-bottom: 15px;">
                <div class="form-group">
                  <div class="col-md-5">
                    <label for="">Kategori</label>
                  </div>
                  <div class="col-md-7">
                    <select class="form-control" name="kategori">
                      <?php 
						$query="select *from categori";
						$hasil=mysqli_query($conn,$query);
						while($data=mysqli_fetch_array($hasil)){
					?>
					<option value="<?php echo $data['nama_kategori'];?>"><?php echo $data['nama_kategori'];?></option>
					<?php
						}
					?>
                    </select>
                  </div>
                </div>
             </div>
			<div class="row" style="margin-bottom: 15px;">
                <div class="form-group">
                  <div class="col-md-5">
                    <label for="">Nama Barang</label>
                  </div>
                  <div class="col-md-7">
                    <input type="text" class="form-control" id="" name="nama_produk" placeholder="Nama Barang">
                  </div>
                </div>
            </div>	
			<div class="row" style="margin-bottom: 15px;">
                <div class="form-group">
                  <div class="col-md-5">
                    <label for="">Upload Gambar</label>
                  </div>
                  <div class="col-md-7">
                    <input type="file" class="form-control" id="" name="gbjalan" required>
                  </div>
                </div>
            </div>
			<div class="row" style="margin-bottom: 15px;">
                <div class="form-group">
                  <div class="col-md-5">
                    <label for="">Harga Barang</label>
                  </div>
                  <div class="col-md-7">
                    <input type="text" class="form-control" id="" name="harga_produk" placeholder="Harga Produk">
                  </div>
                </div>
            </div>
			<div class="row" style="margin-bottom: 15px;">
                <div class="form-group">
                  <div class="col-md-5">
                    <label for="">Stok</label>
                  </div>
                  <div class="col-md-7">
                    <input type="text" class="form-control" id="" name="stok_produk" placeholder="Stok">
                  </div>
                </div>
            </div>
			<button type="submit" name="Ok" class="btn btn-primary">Input</button>
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