<?php
// if (!isset($_COOKIE['login']) || $_COOKIE['login'] != 'true') {
// 	header('Location: login.php');
// 	die();
// }

require_once ('../db/dbhelper.php');
require_once ('../utils/utility.php');

//Cach 2
$user = validateToken();
if ($user == null) {
	header('Location: login.php');
	die();
}

// Lưu danh sách user vào biến $userList
$sql      = "select * from users";
$userList = executeResult($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Users Page</title>
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
				<h2 class="text-center">Users Page - <?=$user['fullname']?>(<a href="logout.php">logout</a>)</h2>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Full Name</th>
							<th>Email</th>
							<th>Birthday</th>
							<th>Address</th>
							<th style="width: 50px;"></th>
							<th style="width: 50px;"></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$count = 0;
						foreach ($userList as $item) {
							echo '<tr>
									<td>'.(++$count).'</td>
									<td>'.$item['fullname'].'</td>
									<td>'.$item['email'].'</td>
									<td>'.$item['birthday'].'</td>
									<td>'.$item['address'].'</td>
									<td><button class="btn btn-warning">Edit</button></td>
									<td><button class="btn btn-danger">Delete</button></td>
								</tr>';
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>