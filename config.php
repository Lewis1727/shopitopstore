<?php 
	session_start();
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$conn = mysqli_connect("localhost", "root", "", "SHOPITOPSTORE");

	if (!$conn) {
		die("Error connecting to database: " . mysqli_connect_error());
	} else {
		$conn->set_charset("utf8"); }

	define ('ROOT_PATH', realpath(dirname(__FILE__)));
	define('BASE_URL', 'https://shopitopstore.com/');
?>
