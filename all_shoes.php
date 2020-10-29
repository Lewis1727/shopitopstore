<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/public_functions.php') ?>

<?php require_once( ROOT_PATH . '/includes/head_section.php') ?>
<link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css' rel='stylesheet' type='text/css'>   

<title>ShopitopStore | Shoes </title>
</head>
<link rel="icon" type="image/png" href="/favicon.png"/>
<body>
<div class="container" style="overflow-x: hidden;"> 
    <?php include( ROOT_PATH . '/includes/navbar.php') ?>

    <div class="content allmain">
        <div class="badge-span" style="font-size:120%; margin-top: 5px; margin-bottom:5px;"><span class="badge badge-light">Вся обувь</span></div>
        
        <div class="dropdown">
            <button class="btn btn-sm btn-secondary dropdown-toggle sortbtn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               сортировать по
            </button>
            <div class="dropdown-menu divshow" aria-labelledby="dropdownMenuButton">
                <a href="./all_shoes.php?sort=1" class="dropdown-item sortlist" href="">название</a>
                <hr>
                <a href="./all_shoes.php?sort=2" class="dropdown-item sortlist" href="">цена от меньшей к большей</a>
                <hr>
                <a href="./all_shoes.php?sort=3" class="dropdown-item sortlist" href="">цена от большей к меньшей</a>
            </div>
        </div>


    <div class="filtered-main" style="margin-top: 0px">       

            <h6>Цена</h6>
				<input type="hidden" id="hidden_minimum_price" value="0" />
                <input type="hidden" id="hidden_maximum_price" value="5000" />
                <p id="price_show">0 грн - 5000 грн</p>
                <div id="price_range"></div>

            <hr>
            <h6>Для</h6>
            <?php 
                    global $conn;
                    $sql = "SELECT DISTINCT(sex) FROM shoes WHERE sold = '0' ORDER BY id ";
                    $result = mysqli_query($conn, $sql);
                    $shoes = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    foreach($result as $row){
                ?>
                <div class="list-group-item checkbox" style="width: 70%; margin-left: 20px;">
                    <label>
                        <input  type="checkbox" class="form-check-input product_check sex" id="sex" name="sex" value="<?php echo $row['sex']; ?>"> 
                        <?php echo $row['sex']; ?>
                    </label>
                </div>
                <?php } ?>
            
            <hr>

            <h6>Сезон</h6>
            <?php 
                    global $conn;
                    $sql = "SELECT DISTINCT(season) FROM shoes WHERE sold = '0' ORDER BY id DESC";
                    $result = mysqli_query($conn, $sql);
                    $shoes = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    foreach($result as $row){
                ?>
                <div class="season list-group-item checkbox " style="width: 70%; margin-left: 20px;">
                    <label>
                        <input  type="checkbox" class="form-check-input product_check season" id="season" name="season" value="<?php echo $row['season']; ?>"> 
                        <?php echo $row['season']; ?>
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

            
            
        </div>


        <div class="all_posts">
        <?php $shoes = getShoes(); ?>

            <?php 
            if (empty($_GET)):
                array_multisort(array_column($shoes, "created_at"), SORT_DESC, $shoes); 
            elseif ($_GET["sort"] == "1"):
                array_multisort(array_column($shoes, "modelname"), SORT_ASC, $shoes); 
            elseif ($_GET["sort"] == "2"):
                array_multisort(array_column($shoes, "price"), SORT_ASC, $shoes); 
            elseif ($_GET["sort"] == "3"):    
                array_multisort(array_column($shoes, "price"), SORT_DESC, $shoes); 
            endif;
            ?>

            <?php foreach ($shoes as $shoe): ?>
            
                    <div class="shoe_post">
                        <div class="shoe_img">
                            <img src="<?php echo BASE_URL . 'static/images/' . $shoe['image_1']; ?>" class="img-thumbnail" alt="">
                        </div>    
                        <a href="single_post.php?id=<?php echo $shoe['id']; ?>">
                            <div class="shoe_info all_h6">
                                <h6 class="brand-filtered"><?php echo $shoe['modelname'],'|', $shoe['brand']; ?></h6>
                                <span><p class="price-filtered"><?php echo $shoe['price'] . ' грн'; ?></p></span>
                            </div>
                        </a>
                    </div>
            
            <?php endforeach ?>
        </div>

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
                    $('#price_show').html(ui.values[0] + ' грн' + ' - ' + ui.values[1] + ' грн');
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
                $.ajax({
                    url:"action.php",
                    method:"POST",
                    data:{action:action, brand:brand, material:material, season:season, sex:sex, size:size, shoe_type:shoe_type, minimum_price:minimum_price, maximum_price:maximum_price},
                    success:function(data){
                        $('.all_posts').html(data);
                    }
                });
            }
            
   
        });
    </script>

     


    <?php include( ROOT_PATH . '/includes/footer_fixed.php') ?>
