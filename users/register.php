<?php
require_once('../db/dbhelper.php');
require_once('../utils/utility.php');

$user = validateToken();
if($user != null) {
    header('Location: users.php');
    die();
}
require_once('form-register.php');
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
				<h2 class="text-center">Registation Page</h2>
			</div>
			<div class="panel-body">
				<form method="post" id="RegisterForm">
					<div class="form-group">
					  <label for="usr">Full Name:</label>
					  <input required="true" type="text" class="form-control" id="usr" name="fullname">
					</div>
					<div class="form-group">
					  <label for="email">Email:</label>
					  <input required="true" type="email" class="form-control" id="email" name="email">
					</div>
					<div class="form-group">
					  <label for="birthday">Birthday:</label>
					  <input required="true" type="date" class="form-control" id="birthday" name="birthday">
					</div>
					<div class="form-group">
					  <label for="pwd">Password:</label>
					  <input required="true" type="password" class="form-control" id="pwd" name="password">
					</div>
					<div class="form-group">
					  <label for="confirmation_pwd">Confirmation Password:</label>
					  <input required="true" type="password" class="form-control" id="confirmation_pwd" name="confirmation_pwd">
					</div>
					<div class="form-group">
					  <label for="address">Address:</label>
					  <input required="true" type="text" class="form-control" id="address" name="address">
					</div>
					<button class="btn btn-success">Register</button>
				</form>
			</div>
		</div>
	</div>
<script type="text/javascript">
	$(function() {
		$('#RegisterForm').submit(function() {
			if($('[name=password]').val() != $('[name=confirmation_pwd]').val()) {
				alert('Password is not matching, plz check it again!!!')
				return false;
			}
			return true;
		})
	})
</script>
</body>
</html>