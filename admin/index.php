<?php
	include "koneksi.php";
?>

<html>
	<head>
		<!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/app.css">
	<link rel="icon" href="../img/a.png" type="image/gif" sizes="16x16">
		<title>Login Admin</title>
	</head>
	<body>
		<div class="container">

      <form class="form-signin" action="proses_login.php" method="POST">
        <h2 class="form-signin-heading">Log In Admin</h2>
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" class="form-control" name="password"placeholder="Password" required>
        <input class="btn btn-lg btn-primary btn-block" name="login" type="submit" value="Masuk">
      </form>

    </div> <!-- /container -->
	</body>
</html>