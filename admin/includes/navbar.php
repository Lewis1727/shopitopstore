<div class="navbar navbar-expand-lg navbar-dark static-top">
  <div class="navbar-brand">
    <a href="/"><h2>Shopitop Store</h2></a>
  </div>

  <div class = "navbar-collapse" id="navbarResponsive">
      <ul class="admin-nav navbar-nav ml-auto">
          <li class="nav-item active">
              <a class="nav-link" href="<?php echo BASE_URL . 'admin/dashboard.php'; ?>">Главная<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL . 'admin/posts.php'; ?>">Управлять</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL . 'admin/create_post.php'; ?>">Создать</a>
          </li>
          <li class="nav-item logout">
          <a href="<?php echo BASE_URL . '/logout.php'; ?>" class="logout-btn btn btn-danger">logout</a>
          </li>
      </ul>
  </div>
</div>


