<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/public_functions.php') ?>
<?php $shoes = getShoes(); ?>
<?php $spring_shoes = getSpringShoes(); ?>
<?php $autumn_shoes = getAutumnShoes(); ?>
<?php require_once( ROOT_PATH . '/includes/head_section.php') ?>
<title>ShopitopStore | Home </title>
</head>
<link rel="icon" type="image/png" href="/favicon.png"/>
<body>
<div class="container"> 
    <?php include( ROOT_PATH . '/includes/navbar.php') ?>
    <hr>
    <?php include( ROOT_PATH . '/includes/banner.php') ?>
    <hr>
    <div class="content">
        <div class="badge-span"><a href="/all_shoes.php"><span class="badge badge-light">Новая обувь</span></a></div>
        
        
        <?php array_multisort(array_column($shoes, "created_at"), SORT_DESC, $shoes); ?>
        <div class="slider">
        <?php $i = 0;
            foreach ($shoes as $shoe):
            if ($i == 4) { break; }?>
       
            <div class="slider__wrapper">
                <div class="slider__item carousel-item active shoe_post_index">
                    <div class="shoe_img">
                        <img src="<?php echo BASE_URL . 'static/images/' . $shoe['image_1']; ?>" class="img-thumbnail" alt="">
                    </div>    
                    <a href="single_post.php?id=<?php echo $shoe['id']; ?>">
                        <div class="shoe_info">
                            <h6 class="shoe_name"><?php echo $shoe['modelname'],' | ', $shoe['brand']; ?></h6>
                            <span><p class="shoe_price"><?php echo $shoe['price'] . ' UAH'; ?></p></span>
                        </div>
                    </a>
                </div>
            </div>
            
        <?php $i++; endforeach ?>
        
        <a class="slider__control slider__control_left" href="#" role="button"></a>
        <a class="slider__control slider__control_right slider__control_show" href="#" role="button"></a>
        </div>

        <div class="badge-span"><span class="badge badge-light">Весна/Лето</span></div>
        <?php array_multisort(array_column($spring_shoes, "created_at"), SORT_ASC, $spring_shoes); ?>
        <?php $i = 0;
            foreach ($spring_shoes as $spring_shoe):
            if ($i == 4) { break; }?>
        
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel">
                <div class="carousel-item active shoe_post_index">
                    <div class="shoe_img">
                        <img src="<?php echo BASE_URL . 'static/images/' . $spring_shoe['image_1']; ?>" class="img-thumbnail" alt="">
                    </div>    
                    <a href="single_post.php?id=<?php echo $spring_shoe['id']; ?>">
                        <div class="shoe_info">
                            <h6 class="shoe_name"><?php echo $spring_shoe['modelname'],' | ', $spring_shoe['brand']; ?></h6>
                            <span><p class="shoe_price"><?php echo $spring_shoe['price'] . ' UAH'; ?></p></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <?php $i++; endforeach ?>

        <div class="badge-span"><span class="badge badge-light">Осень/Зима</span></div>
        <?php array_multisort(array_column($autumn_shoes, "created_at"), SORT_ASC, $autumn_shoes); ?>
        <?php $i = 0;
            foreach ($autumn_shoes as $autumn_shoe):
            if ($i == 4) { break; }?>
        
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel">
                <div class="carousel-item active shoe_post_index">
                    <div class="shoe_img">
                        <img src="<?php echo BASE_URL . 'static/images/' . $autumn_shoe['image_1']; ?>" class="img-thumbnail" alt="">
                    </div>    
                    <a href="single_post.php?id=<?php echo $autumn_shoe['id']; ?>">
                        <div class="shoe_info">
                            <h6 class="shoe_name"><?php echo $autumn_shoe['modelname'],' | ', $autumn_shoe['brand']; ?></h6>
                            <span><p class="shoe_price"><?php echo $autumn_shoe['price'] . ' UAH'; ?></p></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <?php $i++; endforeach ?>
       
    </div>

    <?php include( ROOT_PATH . '/includes/footer.php') ?>

