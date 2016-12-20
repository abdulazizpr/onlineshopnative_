<?php

	include "koneksi.php";
	session_start();
	
	
	if(isset($_POST['Ok'])){
		
		$kategori=$_POST['kategori'];
		$nama_produk=$_POST['nama_produk'];
		$harga=$_POST['harga_produk'];
		$stok=$_POST['stok_produk'];
		date_default_timezone_get('Jakarta');
		$tanggal = mktime(date("m"),date("d")+1,date("Y"));
		$tgl_id = date("dmY",$tanggal);
		$tgl_input = date("Y-m-d",$tanggal);
		$fileName = $_FILES['gbjalan']['name'];//ambil nama file gambar
		
		
		
		$id_terakhir="select max(a.kd_produk) as kd_terakhir from product a,categori b where a.kd_kategori=b.kd_kategori and b.nama_kategori='$kategori'";
		
		$result=mysqli_query($conn,$id_terakhir);
		
		if($result){
			$row = mysqli_fetch_assoc($result);
			$id_lama = $row['kd_terakhir'];
			
			$kd_lama = substr($id_lama,14,17);
			$kd_lama++;
			
			if($kd_lama<1){
				$kd_baru = '000'. 1;
			}else if($kd_lama>=1 && $kd_lama<10){
				$kd_baru = '000'.$kd_lama;
			}else if($kd_lama>=10 && $kd_lama<=99){
				$kd_baru = '00'.$kd_lama;
			}else if($kd_lama>=100 && $kd_lama<=999){
				$kd_baru = '0'.$kd_lama;
			}else{
				$kd_baru = $kd_lama;
			}
		}
		
		$kode_id="select kd_kategori from categori where nama_kategori='$kategori'";
		
		$execute = mysqli_query($conn,$kode_id);
		$ambilkode = mysqli_fetch_assoc($execute);
		$kd_katalog = $ambilkode['kd_kategori'];
		
		//simpan ke database
		$id_barang = $kd_katalog.'-'.$tgl_id.'-'.$kd_baru;
		$sql = "insert into product(kd_produk,nama_produk,image_produk,tgl_input_produk,harga_produk,stok_produk,kd_kategori)values('$id_barang','$nama_produk','$fileName',NOW(),$harga,$stok,'$kd_katalog')";
		
		//simpan gambar
		$gambar="../img/".$_FILES['gbjalan']['name'];
		move_uploaded_file($_FILES['gbjalan']['tmp_name'],$gambar);
			
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
		<title>Input Berhasil</title>
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
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
<?php
	if(mysqli_query($conn,$sql)){
?>		
		<div class="alert alert-success" role="alert">
			<strong> Berhasil </strong> Barang anda berhasil di inputkan</br>
			Kembali ke <a href="user.php">Halaman Admin</a>
		</div>
		<div class="tab-content">
				<div role="tabpanel" class="tab-pane  fade in active" id="1">
					<div class="col-md-5">
						<div class="row" style="margin-bottom: 15px;">
							<div class="form-group">
								<div class="col-md-5">
									<label for="">ID Barang</label>
							</div>
							<div class="col-md-7">
								<?php echo $id_barang;?>
							</div>
							</div>
						</div>
						<div class="row" style="margin-bottom: 15px;">
							<div class="form-group">
								<div class="col-md-5">
									<label for="">Katalog</label>
								</div>
								<div class="col-md-7">
									<?php echo $kategori;?>
								</div>
							</div>
						</div>
						<div class="row" style="margin-bottom: 15px;">
							<div class="form-group">
								<div class="col-md-5">
									<label for="">Nama Barang</label>
								</div>
								<div class="col-md-7">
									<?php echo $nama_produk;?>
								</div>
							</div>
						</div>
						<div class="row" style="margin-bottom: 15px;">
							<div class="form-group">
								<div class="col-md-5">
									<label for="">Harga Barang</label>
								</div>
								<div class="col-md-7">
									Rp <?php echo number_format($harga,2,",","."); ?>
								</div>
							</div>
						</div>
						<div class="row" style="margin-bottom: 15px;">
							<div class="form-group">
								<div class="col-md-5">
									<label for="">Stok</label>
								</div>
								<div class="col-md-7">
									<?php echo $stok;?>
								</div>
							</div>
						</div>
						<div class="row" style="margin-bottom: 15px;">
							<div class="form-group">
								<div class="col-md-5">
									<label for="">Gambar</label>
								</div>
								<div class="col-md-7">
									<img src="<?php echo $gambar;?>" width=100 height=100>
								</div>
							</div>
						</div>
					</div>
					<p></p>
				</div>
			</div>
		</div>
	
	</body>
	 <footer id="footer">
    <p>&copy; 2015 Abdul Aziz Priatna. All rights reserved.</p>
  </footer>
</html>
	<?php
		}else{
			echo "gagal";
		}
		
	}	
	?>