<?php
	
	session_start();
	include "koneksi.php";
	
	if(isset($_POST['ya'])){
		
		$kd_produk=$_GET['id'];
		
		$sql_stok="select stok_produk from product where kd_produk='$kd_produk'";
		$hasil_stok=mysqli_query($conn,$sql_stok);
		$ambil_stok=mysqli_fetch_assoc($hasil_stok);
		$stok=$ambil_stok['stok_produk'];
		$jumlah=$_POST['jumlah'];
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
	<title>azizSHOP | Transaksi</title>
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
			<div class="col-md-9">
			<?php
				if($jumlah>$stok){
			?>
			<div class="alert alert-warning" role="alert">
				<p>Maaf anda melebihi jumlah stok<p>
				<p>Kembali ke <a href="index.php">Beranda</a></p>
			</div>
			<?php
				}else{	
				$username=$_SESSION['username'];
				
				$sql_product="select *from product where kd_produk='$kd_produk'";
				$hasil_product=mysqli_query($conn,$sql_product);
				$data_product=mysqli_fetch_assoc($hasil_product);
				
				$total_harga=$data_product['harga_produk']*$jumlah;
				date_default_timezone_get('Asean/Jakarta');
				$tanggal = mktime(date("m"),date("d")+1,date("Y"));
				$tgl_id = date("Ymd",$tanggal);
				$tgl_input = date("Y-m-d",$tanggal);
				
				
				$sql_trx="select max(kode_transaksi) as kd_lama from transaksi";
				$hasil_trx=mysqli_query($conn,$sql_trx);
				if($hasil_trx){
					$kd_lama=mysqli_fetch_assoc($hasil_trx);
					$id_lama=$kd_lama['kd_lama'];
					
					$kode_lama=substr($id_lama,2,3);
					$kode_lama++;
					
					if($kode_lama<1){
						$kode_baru='T000'. 1;
					}else if($kode_lama<=9){
						$kode_baru='T000'.$kode_lama;
					}else if($kode_lama>=10 && $kode_lama<=99){
						$kode_baru = 'T00'.$kode_lama;
					}else if($kode_lama>=100 && $kode_lama<=999){
						$kode_baru = 'T0'.$kode_lama;
					}else{
						$kode_baru = 'T'.$kode_lama;
					}
					
				}
				
				$sql_user="select *from pembeli where username='$username'";
				$hasil_user=mysqli_query($conn,$sql_user);
				$user=mysqli_fetch_assoc($hasil_user);
				
				$kode_transaksi=$kode_baru.'-'.$tgl_id;
				
				$sql="insert into transaksi values('$kode_transaksi','$user[id_user]','$kd_produk',$jumlah,'$tgl_input','$total_harga')";
				if(mysqli_query($conn,$sql)){
					$id=$user['id_user'];
			?>			
				
					<div class="row">
						<?php
							$query="select c.image_produk, a.kode_transaksi,b.nama,c.nama_produk,a.jumlah_yang_dibeli,c.harga_produk,a.tgl_transaksi,a.total from transaksi a,pembeli b,product c, categori d where a.id_user=b.id_user and a.kd_produk=c.kd_produk and c.kd_kategori=d.kd_kategori and c.kd_produk='$kd_produk'";
							$hasil=mysqli_query($conn,$query);
							$data=mysqli_fetch_array($hasil);
						?>
						<div class="alert alert-success" role="alert">
							<strong> <h2>Transaksi Berhasil</h2> </strong> </br>
							<p>Kembali ke <a href="index.php">Beranda</a><p>	
							</br>
							<img src="../img/<?php echo $data['image_produk']?>" alt="" width=320 height=250>
								<table>
									<tr>
										<td>Kode Transaksi</td>
										<td>&nbsp;</td>
										<td>:</td>
										<td>&nbsp;</td>
										<td> <?php echo $data['kode_transaksi'];?></td>
									</tr><tr>
										<td>Nama Pembeli</td>
										<td>&nbsp;</td>
										<td>:</td>
										<td>&nbsp;</td>
										<td> <?php echo $data['nama'];?></td>
									</tr>
									<tr>
										<td>Barang Yang dibeli</td>
										<td>&nbsp;</td>
										<td>:</td>
										<td>&nbsp;</td>
										<td> <?php echo $data['nama_produk'];?></td>
									</tr>
									<tr>
										<td>Jumlah Barang</td>
										<td>&nbsp;</td>
										<td>:</td>
										<td>&nbsp;</td>
										<td> <?php echo $jumlah;?></td>
									</tr>
									<tr>
										<td>Harga Barang</td>
										<td>&nbsp;</td>
										<td>:</td>
										<td>&nbsp;</td>
										<td> Rp <?php echo number_format($data['harga_produk'],2,",",".")?></td>
									</tr>
									<tr>
										<td>Tanggal Pembelian</td>
										<td>&nbsp;</td>
										<td>:</td>
										<td>&nbsp;</td>
										<td> <?php echo $data['tgl_transaksi'];?></td>
									</tr>
									<tr>
										<td>Total Harga</td>
										<td>&nbsp;</td>
										<td>:</td>
										<td>&nbsp;</td>
										<td> Rp <?php echo number_format($total_harga,2,",",".")?></td>
									</tr>
								</table>
							</div>
					</div>
				</div>
            </div>

        </div>

    </div>
    <!-- /.container -->

</body>
</html>
<?php				
				}
			}
	}else{
		header('location:index.php');
	}
?>