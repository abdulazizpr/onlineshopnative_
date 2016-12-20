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
		<table class="table table-hover">
			<thead>
			<tr>
				<th>No.</th>
				<th>Kode Transaksi</th>
				<th>Nama User</th>
				<th>Nama Barang</th>
				<th>Jumlah Beli</th>
				<th>Tanggal Transaksi</th>
				<th>Total</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<?php
					$query="select a.kode_transaksi,b.nama,c.nama_produk,a.jumlah_yang_dibeli,a.tgl_transaksi,a.total from transaksi a,pembeli b,product c, categori d where a.id_user=b.id_user and a.kd_produk=c.kd_produk and c.kd_kategori=d.kd_kategori";
					$hasil=mysqli_query($conn,$query);
					$i=1;
					while($data=mysqli_fetch_array($hasil)){
				?>
				<td><?php echo $i;?></td>
				<td><?php echo $data['kode_transaksi'];?></td>
				<td><?php echo $data['nama'];?></td>
				<td><?php echo $data['nama_produk'];?></td>
				<td><?php echo $data['jumlah_yang_dibeli'];?></td>
				<td><?php echo $data['tgl_transaksi'];?></td>
				<td>Rp <?php echo number_format($data['total'],2,",",".");?></td>
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