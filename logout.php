<?php  include('../config.php'); ?>
<?php 
	session_start();
	session_unset($_SESSION['user']);
	session_destroy();
    header('location: admin/login.php');
?>