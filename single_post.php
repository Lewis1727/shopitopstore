<?php  include('config.php'); ?>
<?php  include('includes/public_functions.php'); ?>

<?php 
	if (isset($_GET['modelname'])) {
		$shoe = getPost($_GET['modelname']);
	}
?>

<?php include('includes/head_section.php'); ?>
<title> <?php echo $shoe['modelname'] ?> | SHOPITOP</title>
</head>
<body>
<div class="container">
        <?php include( ROOT_PATH . '/includes/navbar.php'); ?>
        <hr>
        <?php if ($shoe['sex'] == 'man') { ?>
        <div class="banner">
            <ul class="list-group banner-group list-group-horizontal-sm">
                <li class="list-group-item banner-list">
                    <a class="nav-link banner-link" href="filtered_shoes.php?sex=woman">Женская обувь</a>
                </li>
                <li class="list-group-item banner-list">
                    <a class="nav-link chosen banner-link" href="filtered_shoes.php?sex=man">Мужская обувь</a>
                </li>
                <li class="list-group-item banner-list">
                    <a class="nav-link banner-link" href="filtered_shoes.php?sex=children">Детская обувь</a>
                </li>
            </ul>
        </div>
        <?php } ?>
        <?php if ($shoe['sex'] == 'woman') { ?>
        <div class="banner">
            <ul class="list-group banner-group list-group-horizontal-sm">
                <li class="list-group-item banner-list">
                    <a class="nav-link banner-link chosen" href="filtered_shoes.php?sex=woman">Женская обувь</a>
                </li>
                <li class="list-group-item banner-list">
                    <a class="nav-link banner-link" href="filtered_shoes.php?sex=man">Мужская обувь</a>
                </li>
                <li class="list-group-item banner-list">
                    <a class="nav-link banner-link" href="filtered_shoes.php?sex=children">Детская обувь</a>
                </li>
            </ul>
        </div>
        <?php } ?>
        <?php if ($shoe['sex'] == 'children') { ?>
        <div class="banner">
            <ul class="list-group banner-group list-group-horizontal-sm">
                <li class="list-group-item banner-list">
                    <a class="nav-link banner-link" href="filtered_shoes.php?sex=woman">Женская обувь</a>
                </li>
                <li class="list-group-item banner-list">
                    <a class="nav-link banner-link" href="filtered_shoes.php?sex=man">Мужская обувь</a>
                </li>
                <li class="list-group-item banner-list">
                    <a class="nav-link banner-link chosen" href="filtered_shoes.php?sex=children">Детская обувь</a>
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
                                <p class="shoe-sex"><?php if($shoe['sex'] == 'man') {echo "Мужская обвуь";}
                                                        if($shoe['sex'] == 'woman') {echo "Женская обувь";}
                                                        if($shoe['sex'] == 'children') {echo "Детская обувь";}  ?></p>
                                <div class="shoeprice">
                                    <?php echo $shoe['price'] . ' UAH'; ?>
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
                                        <!-- <label for="InputName">Name</label> -->
                                        <input class="form-control" type="text" name="name" placeholder="Имя и фамилия" />
                                        <!-- <label for="InputName">Phone</label> -->
                                        <input class="form-control" type="varchar" name="phone" placeholder="Телефон" />
                                        <input type="hidden" name="modelname" value="<?php echo $shoe['modelname'];?>" />
                                        <button type="submit" class="btn btn-primary submitbutton">Подтвердить</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="div-shoe-type">
                            <hr>   
                            <p class="p-shoe-type" style="margin-left: 10px;"><?php echo 'Также '.$shoe['shoe_type'].':';?></p>
                            <hr>
                        </div>

                        <?php 
                            global $conn;
                            $shoe_type = ($shoe['shoe_type']);
                            $shoe_id = $shoe['id'];
                            $sql = "SELECT * FROM shoes WHERE shoe_type='$shoe_type' and sold=0 and id!='$shoe_id'";
                            $result = mysqli_query($conn, $sql);
                            if ($result->num_rows>0){
                            while($row = mysqli_fetch_object($result)){	
                            $shoes_similar = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            // $final_shoes_similar = array();
                            // foreach ($shoes_similar as $shoe) { 
                            //     array_push($final_shoes_similar, $shoe);
                            //}
                       ?>
                      
                        <?php array_multisort(array_column($shoes_similar, "created_at"), SORT_DESC, $shoes_similar); ?>
                        <?php $i = 0;
                              foreach ($shoes_similar as $shoe):
                              if ($i == 4) { break; }
                        ?>

                        <div class="single_content">
                            <div class="addition shoe_post">
                                <div class="shoe_img">
                                    <img src="<?php echo BASE_URL . 'static/images/' . $shoe['image_1']; ?>" class="img-thumbnail" alt="">                         
                                </div>    
                                    <a href="single_post.php?modelname=<?php echo $shoe['modelname']; ?>">
                                        <div class="shoe_info">
                                            <h6 class="shoe_name"><?php echo $shoe['modelname'],'|', $shoe['brand']; ?></h6>
                                            <span><p class="shoe_price" ><?php echo $shoe['price'] . ' UAH'; ?></p></span>
                                        </div>
                                    </a>
                                </div>
                            <!-- </div> -->
                            <?php $i++; endforeach ?> 
                             <?php }} else { ?>                                
                            <div class="nosimilar">
                                <!-- <p class="p-nosimilar">No more <?php echo $shoe['shoe_type']?>...</p> -->
                                <p class="p-nosimilar">Нет похожих...</p>
                            </div>
                            <?php } ?>
                        
                
                    <?php } ?>
                </div>	
            </div>	
            </div>
        <!-- </div> -->
<!-- </div>        -->

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
<!-- </div>	 -->