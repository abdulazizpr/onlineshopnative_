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
		<title>Halaman Admin | Barang</title>
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
            <li><a href="katalog.php">List Katalog</a></li>
            <li class="active"><a href="barang.php">Data Barang</a></li>
            <li><a href="brg.php">Input Barang</a></li>
            <li><a href="transaksi.php">Data Transaksi</a></li>
			<li><a href="view.php">Report View</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
		<h2 style="margin-bottom: 30px;">Data Barang</h2>
		<form method="post">
		<p>
		Kategori : 
		<select name="kategori">
			<?php
				$query="select *from categori";
				$hasil=mysqli_query($conn,$query);
				while($data=mysqli_fetch_assoc($hasil)){
				?>
				<option value="<?php echo $data['nama_kategori'];?>"><?php echo $data['nama_kategori'];?></option>
				<?php
				}
				?>
		</select>
		<input type="submit" value="Lihat" name="cek" class="btn btn-primary">			
		</p>
		</form>
		<?php
			if(isset($_POST['cek'])){
		?>
		<table class="table table-hover">
			<thead>
			<tr>
				<th>No.</th>
				<th>Kd_Barang</th>
				<th>Nama Barang</th>
				<th>Gambar Barang</th>
				<th>Harga</th>
				<th>Stok</th>
				<th>Aksi</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<?php
					$nama_kategori=$_POST['kategori'];
					$query="select a.kd_produk,a.nama_produk, a.image_produk, a.tgl_input_produk,a.harga_produk,a.stok_produk from product a,categori b where a.kd_kategori=b.kd_kategori and b.nama_kategori='$nama_kategori'";
				
					$hasil=mysqli_query($conn,$query);
					$i=1;
					while($data=mysqli_fetch_assoc($hasil)){
				?>
				<td><?php echo $i;?></td>
				<td><?php echo $data['kd_produk'];?></td>
				<td><?php echo $data['nama_produk'];?></td>
				<td>
				 <img src="../img/<?php echo $data['image_produk']; ?>" width=100 height=100 />
				</td>
				<td>Rp <?php echo number_format($data['harga_produk'],2,",",".")?></td>
				<td><?php echo $data['stok_produk'];?></td>
				<td><a href="updatebarang.php?id=<?php echo $data['kd_produk'];?>" class="btn btn-xs btn-success" >Update</a> 
				<a href="deletebarang.php?id=<?php echo $data['kd_produk']?>" class="btn btn-xs btn-danger">Delete</a></td>
			</tr>
		<?php
				$i++;
				}
			}	
		?>
			</tbody>
		</table>
		
		<footer id="footer">
			<p>&copy; 2015 Abdul Aziz Priatna. All rights reserved.</p>
		</footer>
	</body>
</html>