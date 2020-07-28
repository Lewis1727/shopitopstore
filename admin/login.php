<?php  include('../config.php'); ?>
<?php  include('includes/registration_login.php'); ?>
<?php  include('includes/head_section.php'); ?>
	<title>shopitop | log in </title>
</head>
<body>
<div class="container">
    <div class="navbar navbar-expand-lg navbar-dark static-top">
        <div class="navbar-brand">
            <a href="/"> <h2>Shopitop Store</h2></a>
        </div>

        <div class = "collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Главная<span class="sr-only">(current)</span></a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Manage posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Create post</a>
                </li> -->
            </ul>
        </div>
    </div>

	<div class="login">
		<form method="post" action="login.php" >
            <div  class="form-group">
                <!-- <h5>Login</h5> -->
                <?php include(ROOT_PATH . '/includes/errors.php') ?>
                <input class="form-control" type="text" name="username" value=""  placeholder="Username">
                <input class="form-control" type="text" name="password" placeholder="Password">
                <button type="submit" class="btn btn-dark" name="login_btn">Login</button>
            </div>
		</form>
	</div>



