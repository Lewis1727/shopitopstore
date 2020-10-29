<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/public_functions.php') ?>

<?php
//global $conn;
// include('config.php');

if(isset($_POST["action"]))
{

	global $conn;

	$query = "SELECT * FROM shoes WHERE sold = 0 ";

	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
		$query .= "
		 AND price BETWEEN ".$_POST["minimum_price"]." AND ".$_POST["maximum_price"]."
		";
	}
	//  var_dump($query);
	
	if(isset($_POST["brand"]))
	{
		$brand = implode("','", $_POST["brand"]);
		$query .="
		AND brand IN ('".$brand."')
		";
    }
    
    if(isset($_POST["season"]))
	{
		$season = implode("','", $_POST["season"]);
		$query .="
		AND season IN('".$season."')
		";
    }
    
    if(isset($_POST["material"]))
	{
		$material = implode("','", $_POST["material"]);
		$query .="
		AND material IN('".$material."') 
		";
	}

	if(isset($_POST["sex"]))
	{
		$sex = implode("','", $_POST["sex"]);
		$query .="
		AND sex IN ('".$sex."')
		";
	}

	if(isset($_POST["size"]))
	{
		$size = implode("','", $_POST["size"]);
		$query .="
		AND size IN ('".$size."')
		";
    }
		
	if(isset($_POST["shoe_type"]))
	{
		$shoe_type = implode("','", $_POST["shoe_type"]);
		$query .="
		AND shoe_type IN ('".$shoe_type."')
		";
    }
		
	$result = mysqli_query($conn, $query );
	// var_dump($result);
    $output = '';
    
	if($result->num_rows>0)
	{	

		
        while($row=$result->fetch_assoc())
		{

			// if (empty($_GET)):
			// 	array_multisort(array_column($row, "created_at"), SORT_DESC, $output); 
			// elseif ($_GET["sort"] == "1"):
			// 	array_multisort(array_column($row, "modelname"), SORT_ASC, $output); 
			// elseif ($_GET["sort"] == "2"):
			// 	array_multisort(array_column($row, "price"), SORT_ASC, $output); 
			// elseif ($_GET["sort"] == "3"):    
			// 	array_multisort(array_column($row, "price"), SORT_DESC, $output); 
			// endif;


            $output .= ' 
                <div class="shoe_post">
                    <div class="shoe_img">
                        <img src="'. BASE_URL . 'static/images/' . $row['image_1'] . '" class="img-thumbnail" alt="">
                    </div>    
                    <a href="single_post.php?id='. $row['id'] . '">
                        <div class="shoe_info">
                            <h6>'. $row["modelname"] . " | " . $row["brand"] . '</h6>
                            <span><p>'.$row['price']. ' UAH' .'</p></span>
                        </div>
                    </a>
				</div>';
				
				
		}

						

		// while($row=$result->fetch_assoc())
		// {
        //     $output .= ' 
		// 	<div class="all_posts">'.
		// 		 $shoes = getShoes(); 
		
					
		// 			if (empty($_GET)):
		// 				array_multisort(array_column($shoes, "created_at"), SORT_DESC, $shoes); 
		// 			elseif ($_GET["sort"] == "1"):
		// 				array_multisort(array_column($shoes, "modelname"), SORT_ASC, $shoes); 
		// 			elseif ($_GET["sort"] == "2"):
		// 				array_multisort(array_column($shoes, "price"), SORT_ASC, $shoes); 
		// 			elseif ($_GET["sort"] == "3"):    
		// 				array_multisort(array_column($shoes, "price"), SORT_DESC, $shoes); 
		// 			endif;
					
		
		// 			foreach ($shoes as $shoe) :'
		// 					<div class="shoe_post">
		// 						<div class="shoe_img">
		// 							<img src=" ' . BASE_URL . 'static/images/' . $shoe["image_1"] .' " class="img-thumbnail" alt="">
		// 						</div>    
		// 						<a href="single_post.php?modelname=' . $shoe["modelname"] .'">
		// 							<div class="shoe_info">
		// 								<h6 class="brand-filtered">' . $shoe['modelname'] . ','|', ' . $shoe['brand'] . '</h6>
		// 								<span><p class="price-filtered">' .  $shoe['price'] . ' UAH' . '</p></span>
		// 							</div>
		// 						</a>
		// 					</div>' . endforeach . '</div>';
		// }



		
	}
	else
	{
		$output = '<h5 class="notfound">Обувь не найдена...</h5>';
	}
	
	echo $output;
}

?>
