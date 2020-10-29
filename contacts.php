<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/head_section.php') ?>
<title>ShopitopStore | Home </title>
</head>
<body>
<div class="container"> 
    <?php include( ROOT_PATH . '/includes/navbar.php') ?>
    <hr>
    <h5 class="about_us">Свяжитесь с нами</h5>
    <hr>
    
    <table class="table table-bordered">
   <thead class="thead-light">
    <tr>
      <th scope="col">Телефон</th>
      <th scope="col">График работы</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><a href="tel:+380673243700"> +380 67 324 37 00</a></td>
      <td>Пн-пт: 09:00 - 18:00;<br> Сб: 10:00 - 14:00;<br> Вс: выходной</td>
    </tr>
  </tbody>
</table>

<?php include( ROOT_PATH . '/includes/footer.php') ?>

</div>
