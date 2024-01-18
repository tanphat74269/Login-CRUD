<?php
$fullname = $password = $email = $birthday = $address = '';

if (!empty($_POST)) {
	$fullname = getPOST('fullname');
	$password = getPOST('password');
	$email    = getPOST('email');
	$birthday = getPOST('birthday');
	$address  = getPOST('address');

	if ($fullname != '' && $password != '' && $email != '') {
		// lưu dữ liệu vào database
		$password = getPwdSecurity($password); // bảo mật

		$sql = "insert into users (fullname, password, email, birthday, address) values ('$fullname', '$password', '$email', '$birthday', '$address')";
		// echo $sql;//SQL Injection
		execute($sql); // thêm
		// die();

		//chuyen sang trang login.php
		header('Location: login.php');
		die();
	}
}