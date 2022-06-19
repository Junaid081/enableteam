<?php 
 include('server.php');

if(!isset($_SESSION['username'])){
  $_SESSION['msg']='You must login first to view this page';
	
  header('Location: login.php');

}
if(isset($_GET['logout'])){
	session_destroy();
	unset($_SESSION['username']);
	header('Location: login.php');	
}



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<title>Comment System</title>
</head>
<body>

<?php if(isset($_SESSION['success'])): ?>
<div>
	<h3>
	<?php 
	// echo $_SESSION['success'];
	unset($_SESSION['success']);
	?>
	</h3>
</div>
<?php endif ?>

<!-- If the user login print information about him.-->
 <?php if(isset($_SESSION['username'])) :?>
 	<h3>Welcome <strong><?php echo $_SESSION['username']; ?></strong></h3>
 	<button><a href="index.php?logout='1'">Logout</a></button>
<?php endif ?>

<form method="post" action="index.php">
	<div class="container">
		<div class="row">
	    <div class="col-sm-12">
		    <textarea name="userComments" rows="2" cols="100"></textarea>
			</div>

			<div class="col-sm-12">
		    <input type="submit" name="addComment" style="background-color:blue; color: white;">
			</div>
		</div>
	</div>
	<?php $_SESSION['userID']; ?>
</form>


</body>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>