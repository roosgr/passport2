<?php
	
define('DB_NAME', ' ');
define('DB_USER', ' ');
define('DB_PASSWORD', ' ');
define('DB_HOST', ' ');

$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

if (!$link) {
	die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db(DB_NAME, $link);

if (!$db_selected) {
	die('Cant use ' . DB_NAME . ': ' . mysql_error());
}

$value = $_POST['interests1'];
$value2 = $_POST['sex1'];
$value3 = $_POST['age1'];
$value4 = $_POST['language1'];

$sql = "INSERT INTO demo (interests1, sex1, age1, language1) VALUES ('$value', '$value2', '$value3', '$value4')";

if (!mysql_query($sql)) {
	die('Error: ' . mysql_error());
}

mysql_close();
?>
