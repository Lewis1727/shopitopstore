<?php  include('../config.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/post_functions.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/head_section.php'); ?>

<?php $posts = getAllPosts(); ?>

<title>Admin | Manage Posts</title>
</head>

<?php if (isset($_SESSION['user']['username'])): ?>  
    <?php if ($_SESSION['user']['role'] == "admin"): ?>
        <div class="container" style="overflow: unset;">
            <?php include( ROOT_PATH . '/admin/includes/navbar.php') ?>
        
            <?php if (empty($posts)): ?>
                    <h4 style="text-align: center; margin-top: 20px;">No posts in the database.</h4>
            <?php else: ?>
                <div class="main">
                <table class="table table-bordered table-hover">
                    <thead class="">
                        <th></th>
                        <th>Номер</th>
                        <th>Название модели</th>
                        <th>Бренд</th>
                        <th>Размер</th>
                        <th>Цена</th>
                        <th>Материал</th>
                        <th>Описание</th>
                        <th>Пол</th>
                        <th>Сезон</th>
                        <th>Тип обуви</th>
                        <th>Sold</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php foreach ($posts as $key => $post): ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $post['number']; ?></td>
                                <td><a 	target="_blank"
								        href="<?php echo BASE_URL . 'single_post.php?id=' . $post['id'] ?>">
									    <?php echo $post['modelname']; ?>	
								</a></td>	
                                <td><?php echo $post['brand']; ?></td>
                                <td><?php echo $post['size']; ?></td>
                                <td><?php echo $post['price']; ?></td>
                                <td><?php echo $post['material']; ?></td>
                                <td><?php echo $post['description']; ?></td>
                                <td><?php echo $post['sex']; ?></td>
                                <td><?php echo $post['season']; ?></td>
                                <td><?php echo $post['shoe_type']; ?></td>
                                <?php if ($post['sold'] == 0) 
                                    {
                                    echo '<td class=""><span class="badge badge-success">no</span></td>';
                                    } else {
                                    echo '<td class=""><span class="badge badge-danger">yes</span></td>';
                                    };
                                ?>
                                <td>
								    <a class="btn btn-warning edit" href="create_post.php?edit-post=<?php echo $post['id'] ?>"><i class="fa fa-edit"></i></a>
							    </td>
							    <td>
								    <a class="btn btn-danger delete" href="create_post.php?delete-post=<?php echo $post['id'] ?>"><i class="fa fa-trash"></i></a>
							    </td>
                                                                    





                            </tr>
                        <?php endforeach ?>
                    </tbody>        
                </table>
                </div>
            <?php endif ?>  
        </div>
    <?php else: 
        header('location:' . BASE_URL . 'admin/login.php'); 
        endif ?>

<?php else: 
    header('location:' . BASE_URL . 'admin/login.php');
    endif?>

</body>
</html>

