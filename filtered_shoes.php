<?php include('config.php'); ?>
<?php include('includes/public_functions.php'); ?>
<?php include('includes/head_section.php'); ?>
<?php 
	// Get posts under a particular topic
	if (isset($_GET['sex'])) {
		$sex = $_GET['sex'];
		$shoes = getPublishedPostsBySex($sex);
	}
?>
    <!-- <title>Shopitop Store | </title> -->

    <?php if (getSexNameByShoes($sex) == 'мужчин') { ?>
    <title>Shopitop Store | Men's</title>
    <?php } ?>
    <?php if (getSexNameByShoes($sex) == 'женщин') { ?>
    <title>Shopitop Store | Women's</title>
    <?php } ?>
    <?php if (getSexNameByShoes($sex) == 'детей') { ?>
    <title>Shopitop Store | Children's</title>
    <?php } ?>

    <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css' rel='stylesheet' type='text/css'>   

</head>
<link rel="icon" type="image/png" href="/favicon.png"/>
<body>
<div class="container filteredmain" style="overflow-x: hidden;">

    <?php include( ROOT_PATH . '/includes/navbar.php'); ?>
    
    <hr>   
    <?php if (getSexNameByShoes($sex) == 'мужчин') { ?>
        <div class="banner">
            <ul class="list-group banner-group list-group-horizontal-sm">
                <li class="list-group-item banner-list">
                    <a class="nav-link banner-link" href="filtered_shoes.php?sex=женщин">Женская обувь</a>
                </li>
                <li class="list-group-item banner-list">
                    <a class="nav-link banner-link chosen" href="filtered_shoes.php?sex=мужчин">Мужская обувь</a>
                </li>
                <li class="list-group-item banner-list">
                    <a class="nav-link banner-link" href="filtered_shoes.php?sex=детей">Детская обувь</a>
                </li>
            </ul>
        </div>
    <?php } ?>
    <?php if (getSexNameByShoes($sex) == 'женщин') { ?>
        <div class="banner">
            <ul class="list-group banner-group list-group-horizontal-sm">
                <li class="list-group-item  banner-list">
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
    <?php if (getSexNameByShoes($sex) == 'детей') { ?>
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

    

    <div class="filtered_posts" id="result">
        <?php array_multisort(array_column($shoes, "created_at"), SORT_DESC, $shoes); ?>
        <?php foreach ($shoes as $shoe): ?>
            <div class="shoe_post_filtered shoe_post">
                <div class="shoe_img">
                    <img src="<?php echo BASE_URL . 'static/images/' . $shoe['image_1']; ?>" class="img-thumbnail" alt="">
                </div>    
                <a href="single_post.php?id=<?php echo $shoe['id']; ?>">
                    <div class="shoe_info">
                        <h6 class="brand-filtered"><?php echo $shoe['modelname'],' | ', $shoe['brand']; ?></h6>
                        <span><p class="price-filtered"><?php echo $shoe['price'] . ' UAH'; ?></p></span>
                    </div>
                </a>
            </div>
        <?php endforeach ?>
    </div>
    
    <!-- <div class="filtered-main" style="margin-top: -30%;">  -->
    <div class="filtered-main add"> 
        <h6>Цена</h6>
                    <input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="5000" />
                    <p id="price_show">0 UAH - 5000 UAH</p>
                    <div id="price_range"></div>

                <hr>

        <h6>Сезон</h6>
            <?php 
                global $conn;
                $sql = "SELECT DISTINCT(season) FROM shoes WHERE sold = '0' ORDER BY id DESC";
                $result = mysqli_query($conn, $sql);
                $shoes = mysqli_fetch_all($result, MYSQLI_ASSOC);
                foreach($result as $row){
            ?>
                <div class="list-group-item checkbox" style="width: 70%; margin-left: 20px;">
                    <label>
                        <input  type="checkbox" class="form-check-input product_check season" id="season" name="season" value="<?php echo $row['season']; ?>"> 
                        <?php echo $row['season']; ?>
                    </label>
                </div>
                <?php } ?>
            
            <hr>

        <h6>Бренд</h6>
                <?php 
                    global $conn;
                    $sql = "SELECT DISTINCT(brand) FROM shoes WHERE sold = '0' ORDER BY id DESC";
                    $result = mysqli_query($conn, $sql);
                    $shoes = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    foreach($result as $row){
                ?>
                <div class="list-group-item checkbox" style="margin-left: 20px;">
                    <label>
                        <input type="checkbox" class="form-check-input product_check brand" id="brand"  name="brand" value="<?php echo $row['brand']; ?>"> 
                        <?php echo $row['brand']; ?>
                    </label>
                </div>
                <?php } ?>
            
            <hr>

            <h6>Тип обуви</h6>
                <?php
                    global $conn;
                    $sql = "SELECT DISTINCT(shoe_type) FROM shoes WHERE sold = '0' ORDER BY id DESC";
                    $result = mysqli_query($conn, $sql);
                    $shoes = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    foreach($result as $row){
                ?>
                <div class="list-group-item checkbox" style="margin-left: 20px;">
                    <label>
                        <input type="checkbox" class="form-check-input product_check shoe_type" id="shoe_type" value="<?php echo $row['shoe_type']; ?>"> 
                        <?php echo $row['shoe_type']; ?>
                    </label>
                </div>
                <?php } ?>

            <hr>

        <h6>Материал</h6>
                <?php
                    global $conn;
                    $sql = "SELECT DISTINCT(material) FROM shoes WHERE sold = '0' ORDER BY id DESC";
                    $result = mysqli_query($conn, $sql);
                    $shoes = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    foreach($result as $row){
                ?>
                <div class="list-group-item checkbox" style="margin-left: 20px;">
                    <label>
                        <input type="checkbox" class="form-check-input product_check material" id="material" value="<?php echo $row['material']; ?>"> 
                        <?php echo $row['material']; ?>
                    </label>
                </div>
                <?php } ?>

            <hr>

        <h6>Размер</h6>
                <?php 
                    global $conn;
                    $sql = "SELECT DISTINCT(size) FROM shoes WHERE sold = '0' ORDER BY ABS(size) ";
                    $result = mysqli_query($conn, $sql);
                    $shoes = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    foreach($result as $row){
                ?>
                <div class="list-group-item checkbox" style="width: 70%; margin-left: 20px;">
                    <label>
                        <input  type="checkbox" class="form-check-input product_check size" id="size" name="size" value="<?php echo $row['size']; ?>"> 
                        <?php echo $row['size']; ?>
                    </label>
                </div>
                <?php } ?>

                
  
    </div>

   
    <script>
        $(document).ready(function(){

            $('.product_check').click(function(){
                filter_data();
            });

            $('#price_range').slider({
                range:true,
                min:0,
                max:5000,
                values:[0, 5000],
                step:10,
                stop:function(event, ui)
                {
                    $('#price_show').html(ui.values[0] + ' UAH' + ' - ' + ui.values[1] + ' UAH');
                    $('#hidden_minimum_price').val(ui.values[0]);
                    $('#hidden_maximum_price').val(ui.values[1]);
                    filter_data();
                }
            });
            
            function get_filter(class_name)
            {
                var filter = [];
                $('.'+class_name+':checked').each(function(){
                    filter.push($(this).val());
                });
                return filter;
            }

            function filter_data()
            {
                var action = 'action';
                var brand = get_filter('brand');
                var material = get_filter('material');
                var season = get_filter('season');
                var sex = get_filter('sex');
                var size = get_filter('size');
                var shoe_type = get_filter('shoe_type');
                var minimum_price = $('#hidden_minimum_price').val();
                var maximum_price = $('#hidden_maximum_price').val();
                var sex = "<?php echo $sex?>";
                $.ajax({
                    url:"action_filter.php",
                    method:"POST",
                    data:{action:action, brand:brand, material:material, minimum_price:minimum_price, maximum_price:maximum_price, season:season, sex:sex, size:size, shoe_type:shoe_type},
                    success:function(data){
                        $('.filtered_posts').html(data);
                    }
                });
            }
   
        });
    </script>


<?php include( ROOT_PATH . '/includes/footer_fixed.php'); ?>

