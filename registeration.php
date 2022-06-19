<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registeration</title>
</head>
<body>
<div class="container">
	<div class="header">
		<h2>Registeration</h2>
	</div>
	<form action="registeration.php" method="post">
		<?php include('errors.php') ?>
		<label>Username</label>
		<input type="text" name="username" required><br>
		<label>Email</label>
		<input type="email" name="email" required><br>
		<label>Password</label>
		<input type="password" name="password1" required><br>
		<label>Confirm Password</label>
		<input type="password" name="password2" required><br>
		<button type="submit" name="reg_user">Submit</button>
		<p>Already a User <a href="login.php"><b>Login</b></a></p>
	</form>
</div>
</body>
</html>