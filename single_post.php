<?php  include('config.php'); ?>
<?php  include('includes/public_functions.php'); ?>

<?php 
	if (isset($_GET['id'])) {
		$shoe = getPost($_GET['id']);
	}
?>

<?php include('includes/head_section.php'); ?>
<title> <?php echo $shoe['modelname'] ?> | SHOPITOP</title>
</head>
<link rel="icon" type="image/png" href="/favicon.png"/>
<body>
<div class="container">
        <?php include( ROOT_PATH . '/includes/navbar.php'); ?>
        <hr>
        <?php if ($shoe['sex'] == 'мужчин') { ?>
        <div class="banner">
            <ul class="list-group banner-group list-group-horizontal-sm">
                <li class="list-group-item banner-list">
                    <a class="nav-link banner-link" href="filtered_shoes.php?sex=женщин">Женская обувь</a>
                </li>
                <li class="list-group-item banner-list">
                    <a class="nav-link chosen banner-link" href="filtered_shoes.php?sex=мужчин">Мужская обувь</a>
                </li>
                <li class="list-group-item banner-list">
                    <a class="nav-link banner-link" href="filtered_shoes.php?sex=детей">Детская обувь</a>
                </li>
            </ul>
        </div>
        <?php } ?>
        <?php if ($shoe['sex'] == 'женщин') { ?>
        <div class="banner">
            <ul class="list-group banner-group list-group-horizontal-sm">
                <li class="list-group-item banner-list">
                    <a class="nav-link banner-link chosen" href="filtered_shoes.php?sex=женщин">Женская обувь</a>
                </li>
                <li class="list-group-item banner-list">
                    <a class="nav-link banner-link" href="filtered_shoes.php?sex=мужчин">Мужская обувь</a>
                </li>
                <li class="list-group-item banner-list">
                    <a class="nav-link banner-link" href="filtered_shoes.php?sex=детей">Детская обувь</a>
                </li>
            </ul>
        </div>
        <?php } ?>
        <?php if ($shoe['sex'] == 'детей') { ?>
        <div class="banner">
            <ul class="list-group banner-group list-group-horizontal-sm">
                <li class="list-group-item banner-list">
                    <a class="nav-link banner-link" href="filtered_shoes.php?sex=женщин">Женская обувь</a>
                </li>
                <li class="list-group-item banner-list">
                    <a class="nav-link banner-link" href="filtered_shoes.php?sex=мужчин">Мужская обувь</a>
                </li>
                <li class="list-group-item banner-list">
                    <a class="nav-link banner-link chosen" href="filtered_shoes.php?sex=детей">Детская обувь</a>
                </li>
            </ul>
        </div>
        <?php } ?>
        <hr>
	    <div class="content-main" >
            <div class="post-wrapper">
                <div class="full-post-div">
                    <?php if ($shoe['sold'] == 1){ ?>
				        <h2 class="post-title">Sorry... Error 404...</h2>
                    <?php } else { ?>       
                        <div class="post">   
                            <div class="postcard">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block singleimage" src="<?php echo BASE_URL . 'static/images/' . $shoe['image_1']; ?>" alt="First slide">
                                        </div>
                                        
                                        <?php if ($shoe['image_2'] != '') { ?>
                                        <div class="carousel-item">
                                            <img class="d-block singleimage" src="<?php echo BASE_URL . 'static/images/' . $shoe['image_2']; ?>" alt="Second slide">
                                        </div>
                                        <?php } ?>
                                         <?php if ($shoe['image_3'] != '') { ?>
                                        <div class="carousel-item">
                                            <img class="d-block singleimage" src="<?php echo BASE_URL . 'static/images/' . $shoe['image_3']; ?>" alt="Third slide">
                                        </div>
                                        <?php } ?>
                                        <?php if ($shoe['image_4'] != '') { ?>
                                        <div class="carousel-item">
                                            <img class="d-block singleimage" src="<?php echo BASE_URL . 'static/images/' . $shoe['image_4']; ?>" alt="Fourth slide">
                                        </div>
                                        <?php } ?>
                                        <?php if ($shoe['image_5'] != '') { ?>
                                        <div class="carousel-item">
                                            <img class="d-block singleimage" src="<?php echo BASE_URL . 'static/images/' . $shoe['image_5']; ?>" alt="Fifth slide">
                                        </div>
                                        <?php } ?>
                                        <?php if ($shoe['image_6'] != '') { ?>
                                        <div class="carousel-item">
                                            <img class="d-block singleimage" src="<?php echo BASE_URL . 'static/images/' . $shoe['image_6']; ?>" alt="sixth slide">
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div> 
                            </div> 



                            
                            <div class="postinfo">
                                <p class="shoe-sex"><?php if($shoe['sex'] == 'мужчин') {echo "Мужская обвуь";}
                                                        if($shoe['sex'] == 'женщин') {echo "Женская обувь";}
                                                        if($shoe['sex'] == 'детей') {echo "Детская обувь";}  ?></p>
                                <div class="shoeprice">
                                    <?php echo $shoe['price'] . ' грн'; ?>
                                </div>
                                <br>  
                                <div class="post-info">
                                    <div class="modelname">
                                        <?php echo $shoe['modelname'], ' | '; ?>
                                        <?php echo $shoe['brand']; ?>
                                        <hr>  
                                    </div>                            
                                        <p class="size-shoe"><span>Размер:</span> <?php echo $shoe['size'];?></p>
                                        <p class="material-shoe"><span>Материал:</span> <?php echo $shoe['material'];?></p>
                                        <p class="season-shoe"><span>Сезон:</span> <?php echo $shoe['season'];?></p>
                                    
                                </div>
                                <div class="description-shoe">
                                    <hr>
                                    <p><span>Описание:</span> <?php echo $shoe['description'];?></p>
                                </div>                      
                            </div>   
                            
                            <button class="btn btn-dark callbackbutton" onclick="callbackFunction()">Хотите сделать заказ?</button>
                            <div class="callback" id="callback" style="display: none;">
                                <form action="mailto.php" method="post">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="name" placeholder="Имя и фамилия" />
                                        <input class="form-control" type="varchar" name="phone" placeholder="Телефон" />
                                        <input type="hidden" name="modelname" value="<?php echo $shoe['modelname'];?>" />
                                        <input type="hidden" name="number" value="<?php echo $shoe['number'];?>" />
                                        <button type="id" class="btn btn-primary submitbutton">Подтвердить</button>
                                    </div>
                                </form>
                            </div>

                        </div>

                        <div class="div-shoe-type">
                            <hr>   
                            <p class="p-shoe-type" style="margin-left: 10px;"><?php echo 'Также '.$shoe['shoe_type'].':';?></p>
                            <hr>
                        </div>

                        <div class="single_content">
                            <?php 
                                global $conn;
                                $shoe_type = $shoe['shoe_type'];
                                $shoe_id = $shoe['id'];
                                $sql = "SELECT * FROM shoes WHERE shoe_type='$shoe_type' AND id!='$shoe_id' AND sold=0";
                                $result = mysqli_query($conn, $sql);
                                if ($result->num_rows>0){
                                // while($row = mysqli_fetch_object($result)){	    
                                $shoes_similar = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            
                                array_multisort(array_column($shoes_similar, "created_at"), SORT_DESC, $shoes_similar); 
                                
                                $i = 0;
                                foreach ($shoes_similar as $shoe_similar):
                                    if ($i == 4) { break; }
                            ?>

                                <div class="addition shoe_post">
                                    <div class="shoe_img">
                                        <img src="<?php echo BASE_URL . 'static/images/' . $shoe_similar['image_1']; ?>" class="img-thumbnail" alt="">                         
                                    </div>    
                                        <a href="single_post.php?id=<?php echo $shoe_similar['id']; ?>">
                                            <div class="shoe_info">
                                                <h6 class="shoe_name"><?php echo $shoe_similar['modelname'],'|', $shoe_similar['brand']; ?></h6>
                                                <span><p class="shoe_price" ><?php echo $shoe_similar['price'] . ' UAH'; ?></p></span>
                                            </div>
                                        </a>
                                </div>
                                
                                <?php 
                                    $i++; 
                                    endforeach; 
                                    } else { 
                                ?>                                
                                <div class="nosimilar">
                                    <p class="p-nosimilar">Нет похожих...</p>
                                </div>
                                <?php } ?>
                        
                        </div> 
                
                    <?php } ?>
               
            </div>	
        </div>

    <script>
        function callbackFunction() {
        var x = document.getElementById("callback");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
        }

    </script>


    <?php include( ROOT_PATH . '/includes/footer.php'); ?>

