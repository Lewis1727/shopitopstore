<?php
//variables
$post_id = 0;
$modelname = '';
$brand = '';
$size = '';
$price = '';
$material = '';
$description= '';
$sex = '';
$sold = 0;
$season = '';
$shoe_type = '';
$isEditingPost = false;
$errors = [];

//main function
function getAllPosts()
{
global $conn;

if ($_SESSION['user']['role'] == "admin") 
{
    $sql = "SELECT * FROM shoes";
    $result = mysqli_query($conn, $sql);
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $final_posts = array();
    foreach ($posts as $post) 
    {
        array_push($final_posts, $post);
    }
} 
    return $final_posts;
}

//actions
if (isset($_POST['create_post'])) { createPost($_POST); }

if (isset($_POST['update_post'])) {
    updatePost($_POST);
    }

if (isset($_GET['edit-post'])) {
    $isEditingPost = true;
    $post_id = $_GET['edit-post'];
    editPost($post_id);
    }

if (isset($_GET['delete-post'])) {
    $post_id = $_GET['delete-post'];
    deletePost($post_id);
    }

//functions
function esc(String $value){
	// bring the global db connect object into function
	global $conn;
	// remove empty space sorrounding string
	$val = trim($value); 
	$val = mysqli_real_escape_string($conn, $value);
	return $val;
}

function createPost($request_values)
{
    global $conn, $errors, $post_id, $modelname, $brand,$size,$price ,$material , $description, $sex ,$sold ,$season ,$shoe_type,  $image_1, $image_2, $image_3, $image_4, $image_5, $image_6;
    $modelname = esc($request_values['modelname']);
    $brand = esc($request_values['brand']);
    $size = esc($request_values['size']);
    $price = esc($request_values['price']);
    $material = esc($request_values['material']);
    $description = esc($request_values['description']);
    $sex = esc($request_values['sex']);
    $sold = esc($request_values['sold']);
    $season = esc($request_values['season']);
    $shoe_type = esc($request_values['shoe_type']);

    if (empty($modelname)) { array_push($errors, "Modelname is required"); }
    if (empty($brand)) { array_push($errors, "Brand is required"); }
    if ($size == 'Size...') { array_push($errors, "Size is required"); }
    if (empty($price)) { array_push($errors, "Price is required"); }
    if (empty($material)) { array_push($errors, "Material is required"); }
    if (empty($description)) { array_push($errors, "Description is required"); }
    if ($sex == 'Sex...') { array_push($errors, "Sex is required"); }
    if ($sold == 'Sold...') { array_push($errors, "Sold is required"); }
    if ($season == 'Season...') { array_push($errors, "Season is required"); }
    if (empty($shoe_type)) { array_push($errors, "Shoe type is required"); }

    $image_1 = $_FILES['image_1']['name'];
    if (!empty($image_1)){
    //{array_push($errors, "Image_1 is required");}
    $target = "../static/images/" . basename($image_1);
    if (!move_uploaded_file($_FILES['image_1']['tmp_name'], $target)) {
        array_push($errors, "Failed to upload image. Please check file settings for your server");
    }}

    $image_2 = $_FILES['image_2']['name'];
    if (!empty($image_2)){
    $target = "../static/images/" . basename($image_2);
    if (!move_uploaded_file($_FILES['image_2']['tmp_name'], $target)) {
        array_push($errors, "Failed to upload image. Please check file settings for your server");
    }}

    $image_3 = $_FILES['image_3']['name'];
    if (!empty($image_3)){
    $target = "../static/images/" . basename($image_3);
    if (!move_uploaded_file($_FILES['image_3']['tmp_name'], $target)) {
        array_push($errors, "Failed to upload image. Please check file settings for your server");
    }}

    if (!empty($image_4)){
    $image_4 = $_FILES['image_4']['name'];
    $target = "../static/images/" . basename($image_4);
    if (!move_uploaded_file($_FILES['image_4']['tmp_name'], $target)) {
        array_push($errors, "Failed to upload image. Please check file settings for your server");
    }}

    if (!empty($image_5)){
    $image_5 = $_FILES['image_5']['name'];
    $target = "../static/images/" . basename($image_5);
    if (!move_uploaded_file($_FILES['image_5']['tmp_name'], $target)) {
        array_push($errors, "Failed to upload image. Please check file settings for your server");
    }}

    if (!empty($image_6)){
    $image_6 = $_FILES['image_6']['name'];
    $target = "../static/images/" . basename($image_6);
    if (!move_uploaded_file($_FILES['image_6']['tmp_name'], $target)) {
        array_push($errors, "Failed to upload image. Please check file settings for your server");
    }}

    $post_check_query = "SELECT * FROM shoes WHERE modelname='$modelname' LIMIT 1";
    $result = mysqli_query($conn, $post_check_query);
    if (mysqli_num_rows($result) > 0) {
        array_push($errors, "A post already exists with that title.");
    }

    if (count($errors) == 0) {
        $query = "INSERT INTO shoes (modelname, brand, size, price, material , description, sex , sold , season , shoe_type, image_1, image_2, image_3, image_4, image_5, image_6) VALUES ('$modelname', '$brand', '$size', '$price' , '$material' , '$description', '$sex' ,'$sold' ,'$season' ,'$shoe_type',  '$image_1', '$image_2', '$image_3', '$image_4', '$image_5', '$image_6')";
        var_dump($query);
        if(mysqli_query($conn, $query)){
            $_SESSION['message'] = "Post created successfully";
            header('location: posts.php');
            exit(0);
        }
    }
}

function editPost($post_id){
    global $conn, $errors, $isEditingPost, $post_id, $modelname, $brand,$size,$price ,$material , $description, $sex ,$sold ,$season ,$shoe_type,  $image_1, $image_2, $image_3, $image_4, $image_5, $image_6;
    $sql = "SELECT * FROM shoes WHERE id=$post_id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $post = mysqli_fetch_assoc($result);

    $modelname = $post['modelname'];
    $brand =$post['brand'];
    $size = $post['size'];
    $price = $post['price'];
    $material = $post['material'];
    $description = $post['description'];
    $sex = $post['sex'];
    $sold = $post['sold'];
    $season = $post['season'];
    $shoe_type = $post['shoe_type'];
}

function updatePost($request_values)
{
    global $conn, $errors, $isEditingPost, $post_id, $modelname, $brand,$size,$price ,$material , $description, $sex ,$sold ,$season ,$shoe_type,  $image_1, $image_2, $image_3, $image_4, $image_5, $image_6;
    $modelname = esc($request_values['modelname']);
    $brand = esc($request_values['brand']);
    $size = esc($request_values['size']);
    $price = esc($request_values['price']);
    $material = esc($request_values['material']);
    $description = esc($request_values['description']);
    $sex = esc($request_values['sex']);
    $sold = esc($request_values['sold']);
    $season = esc($request_values['season']);
    $shoe_type = esc($request_values['shoe_type']);
    $post_id = esc($request_values['post_id']);

    if (empty($modelname)) { array_push($errors, "Modelname is required"); }
    if (empty($brand)) { array_push($errors, "Brand is required"); }
    if ($size == 'Size...') { array_push($errors, "Size is required"); }
    if (empty($price)) { array_push($errors, "Price is required"); }
    if (empty($material)) { array_push($errors, "Material is required"); }
    if (empty($description)) { array_push($errors, "Description is required"); }
    if ($sex == 'Sex...') { array_push($errors, "Sex is required"); }
    if ($sold == 'Sold...') { array_push($errors, "Sold is required"); }
    if ($season == 'Season...') { array_push($errors, "Season is required"); }
    if (empty($shoe_type)) { array_push($errors, "Shoe type is required"); }

    if (count($errors) == 0) {
        $query = "UPDATE shoes SET modelname='$modelname', brand='$brand', size='$size', price='$price', material='$material', description='$description', sex='$sex', sold='$sold', season='$season', shoe_type='$shoe_type' WHERE id='$post_id'";
        //var_dump($query);
        if(mysqli_query($conn, $query)){ 
            $_SESSION['message'] = "Post updated successfully";
            header('location: posts.php');
            exit(0);
        }
        $_SESSION['message'] = "Post updated successfully";
        header('location: posts.php');
        exit(0);
    }
}

function deletePost($post_id)
{
    global $conn;
    $sql = "DELETE FROM shoes WHERE id=$post_id"; 
    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Post successfully deleted";
        header("location: posts.php");
        exit(0);
        }
}


