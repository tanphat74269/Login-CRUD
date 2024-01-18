<?php
// var_dump($_COOKIE);

$status = $msg = '';

if (isset($_COOKIE['status'])) {
	$status = $_COOKIE['status'];
}
if (isset($_COOKIE['msg'])) {
	$msg = $_COOKIE['msg'];
}

echo $msg.'-'.$status;

foreach ($_COOKIE as $key => $value) {
	echo '<br/>'.$key.'-'.$value;
}