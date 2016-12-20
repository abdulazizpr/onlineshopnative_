<?php
	
	session_start();
	include "koneksi.php";
	
	$id=$_GET['id'];
	$query="select *from pembeli where id_user=$id";
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
		<title>Halaman Admin | Update User</title>
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
		<h2>UPDATE USER</h2>
		<!-- Tab panes -->
		 <div class="tab-content">
			<div role="tabpanel" class="tab-pane  fade in active" id="1">
				<div class="col-md-5">
		<form action="proses_updateuser.php?id=<?php echo $data['id_user'];?>" method="POST"role="form" style="margin-top: 30px;">
			
              <div class="row" style="margin-bottom: 15px;">
                <div class="form-group">
                  <div class="col-md-5">
                    <label for="">Nama</label>
                  </div>
                  <div class="col-md-7">
                    <input type="text" class="form-control" id="" name="nama" value="<?php echo $data['nama'];?>">
                  </div>
                </div>
              </div>
              <div class="row" style="margin-bottom: 15px;">
				<div class="form-group">
				  <div class="col-md-5">
					<label for="">Alamat Rumah</label>
				  </div>
				  <div class="col-md-7">
					<textarea class="form-control" rows="3" name="alamat"><?php echo $data['alamat'];?></textarea>
				  </div>
				</div>
			  </div>
			  <div class="row" style="margin-bottom: 15px;">
                <div class="form-group">
                  <div class="col-md-5">
                    <label for="">No. Hp</label>
                  </div>
                  <div class="col-md-7">
                    <input type="text" class="form-control" id="" name="no_hp" value="<?php echo $data['no_hp'];?>">
                  </div>
                </div>
              </div>
			  <div class="row" style="margin-bottom: 15px;">
                <div class="form-group">
                  <div class="col-md-5">
                    <label for="">Email</label>
                  </div>
                  <div class="col-md-7">
                    <input type="text" class="form-control" id="" name="email" value="<?php echo $data['email'];?>">
                  </div>
                </div>
              </div>
			  <div class="row" style="margin-bottom: 15px;">
                <div class="form-group">
                  <div class="col-md-5">
                    <label for="">Username</label>
                  </div>
                  <div class="col-md-7">
                    <input type="text" class="form-control" id="" name="username" value="<?php echo $data['username'];?>">
                  </div>
                </div>
              </div>
			  <div class="row" style="margin-bottom: 15px;">
                <div class="form-group">
                  <div class="col-md-5">
                    <label for="">Password</label>
                  </div>
                  <div class="col-md-7">
                    <input type="password" class="form-control" id="" name="password" value="<?php echo $data['password'];?>">
                  </div>
                </div>
              </div>
              <button type="submit" name="update" class="btn btn-primary">Simpan</button>
              <button type="submit" class="btn btn-warning">Batal</button>
        
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