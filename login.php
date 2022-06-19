<?php include('server.php'); 
 echo "<script> alert('You must login to access this page');</script>";
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registeration</title>
</head>
<body>
<div class="container">
	<div class="header">
		<h2>Login</h2>
	</div>
	<form action="login.php" method="POST">
		<label>Username</label>
		<input type="text" name="username" required><br>
		<label>Password</label>
		<input type="password" name="password1" required><br>
		<button type="submit" name="login_user">Login</button>
		<?php include('errors.php') ?>
		<p>New Here then go to <a href="registeration.php"><b>Registeration page</b></a></p>
	</form>
</div>
</body>
</html>
