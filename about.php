<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/head_section.php') ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<title>ShopitopStore | Home </title>
</head>
<body>
<div class="container"> 
    <?php include( ROOT_PATH . '/includes/navbar.php') ?>
    <hr>
    <h4 class="about_us">Про нас</h4>
    <hr>
    <h5 class="about_us_info">В интернет магазине Shopitop Store собрана большая коллекция брендовой обуви 
        привезённой с Европы. Каждая модель уникальная, при потребности мы вышлем дополнительно
        информацию про модель или живые фотографии.</h5>
    <hr>
    <h4 class="about_us">Доставка</h4>
    <hr>
    <h5 class="about_us_info">
    <b>1. Доставка на отделение Новой Почти по Украине:</b><br>
    Отправка 1-3 рабочих дней.<br>
    В цену обуви не включена стоимость доставки и упаковочных материалов служб почтовой связи.<br>
    <b>2. Курьерская доставка по Киеву:</b><br>
    После оформления заказа с вами свяжется менеджер для уточнения удобного вам времени доставки, курьер доставит обувь в рабочее время.</h5>
    
    <div class="table-responsive about">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th rowspan="2">Метод доставки</th>
                    <th colspan="1">Способ доставки</th>
                    <th colspan="2">Способ оплаты</th>
                </tr>
                <tr>
                    <th>Стоимость и сроки</th>
                    <th>Оплата при получении</th>
                    <th>Предоплата</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                    <h6>Новая почта</h6>
                    </td>
                    <td>50-100 грн<br>(1-2 дня)</td>
                    <td>V</td>
                    <td>Visa, MasterCard</td>
                </tr>
                <tr>
                    <td>
                    <h6>Курьерская доставка</h6>
                    </td>
                    <td>60грн</td>
                    <td>V</td>
                    <td>Х</td>
                </tr>
            </tbody>
        </table>
    </div>

    <h5 class="about_us_info">Возможна адресная доставка Новой Почтой (стоимость которой на 40% выше обычной).</h5>
    <h5 class="about_us_info">Термины и цены являются приблизительными и могут изменяться.</h5>

    <hr>
    <h4 class="about_us">Оплата</h4>
    <hr>
    <h5 class="about_us_info">
    1. Предоплата на карту.<br>
    2. Наложеный платёж.<br>
    3. Наличными курьеру при получении.</h5>


<?php include( ROOT_PATH . '/includes/footer.php') ?>

</div> 
