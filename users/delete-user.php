<?php
require_once ('../db/dbhelper.php');
require_once ('../utils/utility.php');

$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id=".$id;
execute($sql);

header('Location: users.php');
