<?php

$errors = array(); 

function esc(String $value)
{	
	global $conn;
	$val = trim($value);
	$val = mysqli_real_escape_string($conn, $value);
	return $val;
}

function getUserById($id)
{
	global $conn;
	$sql = "SELECT * FROM users WHERE id=$id LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$user = mysqli_fetch_assoc($result);
	return $user; 
}

// LOG USER IN
	if (isset($_POST['login_btn'])) {
		$username = esc($_POST['username']);
		$password = esc($_POST['password']);

		if (empty($username)) { array_push($errors, "Username required"); }
		if (empty($password)) { array_push($errors, "Password required"); }
		if (empty($errors)) {
			//$password = md5($password); // encrypt password
			$sql = "SELECT * FROM users WHERE username='$username' and password='$password' LIMIT 1";
			echo var_dump($sql);
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				$reg_user_id = mysqli_fetch_assoc($result)['id']; 

				$_SESSION['user'] = getUserById($reg_user_id); 
				if (in_array($_SESSION['user']['role'], ["admin"])) {
					header('location: ' . BASE_URL . 'admin/dashboard.php');
					exit(0);
				}
            } else {
				array_push($errors, 'Wrong credentials');
			}
		}
	}



?>