<?php include('../config.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/post_functions.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/head_section.php'); ?>

<title>Admin | Create Post</title>
</head>
    <?php if (isset($_SESSION['user']['username'])): ?>   
        <?php if ($_SESSION['user']['role'] == "admin"): ?>
            <div class="container">
                <?php include(ROOT_PATH . '/admin/includes/navbar.php') ?>
                <hr>
                <div class="action create-post-div">
                <?php if ($isEditingPost === true): ?>
                    <h5 class="page-title">Изменить</h5>
                <?php else: ?>
                    <h5 class="page-title ">Создать</h5>
                <?php endif ?>
                <hr>
                    <form class="form-group" method="post" enctype="multipart/form-data" action="<?php echo BASE_URL . 'admin/create_post.php'; ?>" >
                        <?php include(ROOT_PATH . '/includes/errors.php') ?>

                        <?php if ($isEditingPost === true): ?>
					        <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                        <?php endif ?>

                        <input class="form-control" type="text" name="modelname" value="<?php echo $modelname; ?>" placeholder="Название модели">

                        <input class="form-control" type="text" name="brand" value="<?php echo $brand; ?>" placeholder="Бренд">

                       
                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="size" value="<?php echo $size; ?>">
                            <?php if ($isEditingPost === true): ?>
                                <option selected><?php echo $size; ?></option>
                                <?php for ($i = 17; $i <= 46; $i++) {
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                } ?>      
                            <?php else: ?>
                                <option selected>Размер...</option>
                                <?php for ($i = 17; $i <= 46; $i++) {
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                } ?>
                            <?php endif ?>
                        </select>

                        <input type="text" class="form-control" name="price" value="<?php echo $price; ?>" placeholder="Цена">

                        <input class="form-control" type="text" name="material" value="<?php echo $material; ?>" placeholder="Материал">

                        <textarea class="form-control description" name="description"  rows="3"  placeholder="Описание"><?php echo $description; ?></textarea>
                        
                        <select class="custom-select mr-sm-2" name="sex" value="<?php echo $sex; ?>">
                            <?php if ($isEditingPost === true): ?>
                                <option selected><?php echo $sex; ?></option>
                                <option>man</option>
                                <option>woman</option>
                                <option>children</option>
                            <?php else: ?>
                                <option selected>Пол...</option>
                                <option>man</option>
                                <option>woman</option>
                                <option>children</option>
                            <?php endif ?>
                        </select>

                        <select class="custom-select mr-sm-2" name="sold" value="<?php echo $sold; ?>">
                            <?php if ($isEditingPost === true): ?>
                                <option selected><?php echo $sold; ?></option>
                                <option>0</option>
                                <option>1</option>
                            <?php else: ?>
                                <option selected>Продано...</option>
                                <option>0</option>
                                <option>1</option>
                            <?php endif ?>
                        </select>

                        <select class="custom-select mr-sm-2" name="season" value="<?php echo $season; ?>">
                            <?php if ($isEditingPost === true): ?>
                                <option selected><?php echo $season; ?></option>
                                <option>spring-summer</option>
                                <option>autumn-winter</option>
                            <?php else: ?>
                                <option selected>Сезон...</option>
                                <option>spring-summer</option>
                                <option>autumn-winter</option>
                            <?php endif ?>
                        </select>

                        <input type="text" class="form-control" name="shoe_type" value="<?php echo $shoe_type; ?>" placeholder="Тип обуви">

                        <?php if ($isEditingPost == true): ?>
					        <label style="float: left; margin: 5px auto 5px;"></label>
				        <?php else: ?>
					        <label style="float: left; margin: 5px auto 5px;">Image 1</label>				
                            <input class="form-control-file" type="file" name="image_1">
                            <label style="float: left; margin: 5px auto 5px;">Image 2</label>				
                            <input class="form-control-file" type="file" name="image_2">
                            <label style="float: left; margin: 5px auto 5px;">Image 3</label>				
                            <input class="form-control-file" type="file" name="image_3">
                            <label style="float: left; margin: 5px auto 5px;">Image 4</label>				
                            <input class="form-control-file" type="file" name="image_4">
                            <label style="float: left; margin: 5px auto 5px;">Image 5</label>				
                            <input class="form-control-file" type="file" name="image_5">
                            <label style="float: left; margin: 5px auto 5px;">Image 6</label>				
					        <input class="form-control-file" type="file" name="image_6">
                        <?php endif ?>
                        <hr>
                        <?php if ($isEditingPost === true): ?> 
                            <button type="submit" class="btn btn-success" name="update_post">Обновить</button>
                        <?php else: ?>
                            <button type="submit" class="btn btn-success" name="create_post">Создать</button>
                        <?php endif ?>
            
                    </form>
                </div>
            </div>        
        <?php else: 
            header('location:' . BASE_URL . 'admin/login.php'); 
            endif ?>
    <?php else: 
        header('location:' . BASE_URL . 'admin/login.php');
        endif?>

        
    
</body>
</html>