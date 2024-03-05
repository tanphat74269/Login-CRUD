<?php
session_start();

require_once ('../db/dbhelper.php');
require_once ('../utils/utility.php');

$user = validateToken();
if ($user == null) {
	header('Location: login.php');
	die();
}

$page = getGet('page');
$numPage = 3;
$limit = ($page - 1) * $numPage;
$sql      = "select id, fullname, email, birthday, address from users limit $limit, 3";
$userList = executeResult($sql);

echo json_encode($userList);

// $count = $limit + 1;
// foreach ($userList as $item) {
// 	echo '<tr>
// 			<td>'.(++$count).'</td>
// 			<td>'.$item['fullname'].'</td>
// 			<td>'.$item['email'].'</td>
// 			<td>'.$item['birthday'].'</td>
// 			<td>'.$item['address'].'</td>
// 			<td><button class="btn btn-warning">Edit</button></td>
// 			<td><button class="btn btn-danger">Delete</button></td>
// 		</tr>';
// }