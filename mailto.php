<?php

include "vendor/autoload.php";

use Telegram\Bot\Api;

if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['modelname']) && isset($_POST['number'])){

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $modelname = $_POST['modelname'];
    $number = $_POST['number'];
    if (empty($name)) {
        $error = true;
    }
    if (empty($phone)) {
        $error = true;
    }
    if ($error) {
       // echo "Заполните все поля";
     echo "<script>
        alert('Заполните все поля для отправки.');
        javascript:location.href=document.referrer;
        </script>";

    } else {
        $message = '
новый заказ
-------------------
Имя: '.$name.'   
Телефон: '.$phone.'
Название модели: '.$modelname.'
Код обуви: '.$number.'
';

        $bot = new \TelegramBot\Api\BotApi('1392313760:AAGfAtStSt0GiUsIeAWSXSDV1ZJeMCOOvNY');
        $chat_id = "-464283568";

        $response = $bot->sendMessage($chat_id, $message);

        echo "<script>
        alert('Заказ оформлен, в ближайшее время мы вам позвоним.');
        window.location.href='/';
        </script>";
    }  
}

?>
