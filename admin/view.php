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
		<title>Halaman Admin | Report View</title>
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
		<h1>Total Harian</h1>
		</br>
		<table class="table table-hover">
			<thead>
			<tr>
				<th>No.</th>
				<th>Tanggal Transaksi</th>
				<th>Jumlah Yang Terjual Per Hari</th>
				<th>Total Barang Yang Terjual Per Hari</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<?php
					$query="select a.tgl_transaksi,sum(a.jumlah_yang_dibeli) as jumlah_yang_terjual,sum(a.total) as total_harga 
					from transaksi a, product b where a.kd_produk=b.kd_produk  group by a.tgl_transaksi order by a.tgl_transaksi desc,jumlah_yang_terjual desc";
					$hasil=mysqli_query($conn,$query);
					$hasil_jumlah=0;
					$hasil_total=0;
					$i=1;
					while($data=mysqli_fetch_array($hasil)){
				?>
				<td><?php echo $i;?></td>
				<td><?php echo $data['tgl_transaksi'];?></td>
				<td><?php echo $data['jumlah_yang_terjual'];?></td>
				<td>Rp <?php echo number_format($data['total_harga'],2,",",".");?></td>
			</tr>
				<?php
					$i++;
					$hasil_jumlah=$hasil_jumlah+$data['jumlah_yang_terjual'];
					$hasil_total=$hasil_total+$data['total_harga'];
				}
				?>
			<tr>
				<td colspan="2">Total</td>
				<td><?php echo $hasil_jumlah; ?></td>
				<td>Rp <?php echo number_format($hasil_total,2,",","."); ?></td>
			</tr>	
			</tbody>	
		</table>
		<h1>Total Per Barang</h1>
		</br>
		<table class="table table-hover">
			<thead>
			<tr>
				<th>No.</th>
				<th>Tanggal Transaksi</th>
				<th>Nama Produk</th>
				<th>Jumlah Yang Terjual</th>
				<th>Total Barang Yang Terjual</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<?php
					$query="select a.tgl_transaksi, b.nama_produk ,sum(a.jumlah_yang_dibeli) as jumlah_yang_terjual,sum(a.total) as total_harga 
					from transaksi a, product b where a.kd_produk=b.kd_produk  group by b.nama_produk order by a.tgl_transaksi desc,jumlah_yang_terjual desc";
					$hasil=mysqli_query($conn,$query);
					$i=1;
					$hasil_jumlah=0;
					$hasil_total=0;
					while($data=mysqli_fetch_array($hasil)){
				?>
				<td><?php echo $i;?></td>
				<td><?php echo $data['tgl_transaksi'];?></td>
				<td><?php echo $data['nama_produk'];?></td>
				<td><?php echo $data['jumlah_yang_terjual'];?></td>
				<td>Rp <?php echo number_format($data['total_harga'],2,",",".");?></td>
			</tr>
				<?php
					$i++;
					$hasil_jumlah=$hasil_jumlah+$data['jumlah_yang_terjual'];
					$hasil_total=$hasil_total+$data['total_harga'];
				}
				?>
			<tr>
				<td colspan="3">Total</td>
				<td><?php echo $hasil_jumlah; ?></td>
				<td>Rp <?php echo number_format($hasil_total,2,",","."); ?></td>
			</tr>					
			</tbody>	
		</table>
  <!-- Bagian Footer -->
  <footer id="footer">
    <p>&copy; 2015 Abdul Aziz Priatna. All rights reserved.</p>
  </footer>		
	</body>
</html>