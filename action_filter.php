<?php require_once('config.php') ?>
<?php
//global $conn;
// include('config.php');

if(isset($_POST["action"]))
{

    global $conn;

	$query = "SELECT * FROM shoes WHERE sold = 0 AND sex = '$_POST[sex]' ";
	
	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
		$query .= "
		 AND price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
		";
	}

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
    $output = '';
    
	if($result->num_rows>0)
	{
        while($row=$result->fetch_assoc())
		{
            $output .= ' 
                <div class="shoe_post">
                    <div class="shoe_img">
                        <img src="'. BASE_URL . 'static/images/' . $row['image_1'] . '" class="img-thumbnail" alt="">
                    </div>    
                    <a href="single_post.php?modelname='. $row['modelname'] . '">
                        <div class="shoe_info">
                            <h6>'. $row["brand"] . " " . $row["modelname"] . '</h6>
                            <span><p>'.$row['price'].'</p></span>
                        </div>
                    </a>
                </div>';
		}
	}
	else
	{
		$output = '<h5 class="notfound">Обувь не найдена...</h5>';
	}
	echo $output;
}

?>