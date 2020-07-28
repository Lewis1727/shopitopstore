<?php  include('../config.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/head_section.php'); ?>
<?php  include('includes/registration_login.php'); ?>
<title>Admin | Dashboard</title>
</head>
<body>
    <?php if (isset($_SESSION['user']['username'])): ?>
        <?php if ($_SESSION['user']['role'] == "admin"): ?>
            <div class="container">
            <?php include( ROOT_PATH . '/admin/includes/navbar.php') ?>




            </div>
        
        <?php else: 
            header('location:' . BASE_URL . 'admin/login.php'); 
            endif ?>
    <?php else: 
        header('location:' . BASE_URL . 'admin/login.php');
        endif?>

        
    
</body>
</html>