<?php
require_once ('../db/dbhelper.php');
require_once ('../utils/utility.php');

$id = $_GET['id'];
$sql      = "select * from users where id=".$id;
$user = executeResult($sql);

// update user 
if (!empty($_POST)) {
	$fullname = getPOST('fullname');
	$password = getPOST('password');
	$email    = getPOST('email');
	$birthday = getPOST('birthday');
	$address  = getPOST('address');

    if ($fullname != '' && $password != '' && $email != '') {
		//save user into database
		$password = getPwdSecurity($password);

		$sql = "update users set fullname = '$fullname', password='$password', email='$email', birthday='$birthday', address='$address' where id = ".$id;
		// echo $sql;//SQL Injection
		execute($sql);
		// die();

		//chuyen sang trang login.php
		header('Location: users.php');
		die();
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Registation Page</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Edit User</h2>
			</div>
			<div class="panel-body">
				<form method="post" id="RegisterForm">
					<div class="form-group">
					  <label for="usr">Full Name:</label>
					  <input required="true" type="text" class="form-control" id="usr" name="fullname" value="<?=$user[0]['fullname']?>">
					</div>
					<div class="form-group">
					  <label for="email">Email:</label>
					  <input required="true" type="email" class="form-control" id="email" name="email" value="<?=$user[0]['email']?>">
					</div>
					<div class="form-group">
					  <label for="birthday">Birthday:</label>
					  <input required="true" type="date" class="form-control" id="birthday" name="birthday" value="<?=$user[0]['birthday']?>">
					</div>
					<div class="form-group">
					  <label for="pwd">Password:</label>
					  <input required="true" type="password" class="form-control" id="pwd" name="password">
					</div>
					<div class="form-group">
					  <label for="address">Address:</label>
					  <input required="true" type="text" class="form-control" id="address" name="address" value="<?=$user[0]['address']?>">
					</div>
					<button class="btn btn-success">Update User</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>