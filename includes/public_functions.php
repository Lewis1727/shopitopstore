<?php 

$errors= [];

	function esc(String $value)
	{	
		global $conn;

		$val = trim($value); 
		$val = mysqli_real_escape_string($conn, $value);

		return $val;
	}

function getShoes()
{
    global $conn;
    $sql = "SELECT * FROM shoes WHERE sold=false";
    $result = mysqli_query($conn, $sql);
    $shoes = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $final_shoes = array();

    foreach ($shoes as $shoe) {
		$shoe['sex'] = getShoeSex($shoe['sex']); 
		
		array_push($final_shoes, $shoe);
	}
	return $final_shoes;
}

function getShoeSex($sex){
	global $conn;
	$sql = "SELECT sex FROM shoes LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$sex = mysqli_fetch_assoc($result);
	return $sex;
}

function getPublishedPostsBySex($sex) {
	global $conn;
	$sql = "SELECT * FROM shoes WHERE sex = '$sex' AND sold=false";
	$result = mysqli_query($conn, $sql);
	$shoes = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_shoes = array();
	foreach ($shoes as $shoe) {
		// $shoe['sex'] = getShoeSex($shoe['sex']); 
		array_push($final_shoes, $shoe);
	}
	return $final_shoes;
}

function getSexNameByShoes($sex)
{
    global $conn;
	$sql = "SELECT sex FROM shoes WHERE sex= '$sex'";
	$result = mysqli_query($conn, $sql);
	$shoes = mysqli_fetch_assoc($result);
	return $shoes['sex'];
}

function getPost($id){
	global $conn;
	$id = $_GET['id'];
	$sql = "SELECT * FROM shoes WHERE id='$id' AND sold=0";
	$result = mysqli_query($conn, $sql);
	$shoe = mysqli_fetch_assoc($result);
	return $shoe;
}

function getSpringShoes()
{
    global $conn;
    $sql = "SELECT * FROM shoes WHERE season='весна-лето' and sold=false";
    $result = mysqli_query($conn, $sql);
    $shoes = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $final_shoes = array();

    foreach ($shoes as $shoe) {
		// $shoe['sex'] = getShoeSex($shoe['sex']); 
		
		array_push($final_shoes, $shoe);
	}
	return $final_shoes;
}

function getAutumnShoes()
{
    global $conn;
    $sql = "SELECT * FROM shoes WHERE season='осень-зима' and sold=false";
    $result = mysqli_query($conn, $sql);
    $shoes = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $final_shoes = array();

    foreach ($shoes as $shoe) {
		// $shoe['sex'] = getShoeSex($shoe['sex']); 
		
		array_push($final_shoes, $shoe);
	}
	return $final_shoes;
}


?>
