<?php
$password = $email = '';

if (!empty($_POST)) {
	$password = getPOST('password');
	$email    = getPOST('email');

	if ($password != '' && $email != '') {
		//save user into database
		$password = getPwdSecurity($password);

		$sql  = "select * from users where email = '$email' and password = '$password'";
		$data = executeResult($sql);
		if ($data != null && count($data) > 0) { // nếu user có tồn tại trong database
			//Cach 1: basic
			// setcookie('login', 'true', time()+7*24*60*60, '/');
			//Cach 2: Nang cao
			$token = getPwdSecurity(time().$data[0]['email']);
			setcookie('token', $token, time()+7*24*60*60, '/');

			$sql = "update users set token = '$token' where id = ".$data[0]['id'];
			execute($sql); // sửa

			//login thanh cong
			//chuyen sang trang users.php
			header('Location: users.php');
			die();
		}
	}
}