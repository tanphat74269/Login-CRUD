<?php
$fullname = $password = $email = $birthday = $address = '';

if (!empty($_POST)) {
	$fullname = getPOST('fullname');
	$password = getPOST('password');
	$email    = getPOST('email');
	$birthday = getPOST('birthday');
	$address  = getPOST('address');

	if ($fullname != '' && $password != '' && $email != '') {
		//save user into database
		$password = getPwdSecurity($password);

		$sql = "insert into users (fullname, password, email, birthday, address) values ('$fullname', '$password', '$email', '$birthday', '$address')";
		// echo $sql;//SQL Injection
		execute($sql);
		// die();

		//chuyen sang trang login.php
		header('Location: login.php');
		die();
	}
}