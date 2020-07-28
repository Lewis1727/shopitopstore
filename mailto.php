<?php 
if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['modelname'])){
$name = $_POST['name'];
$phone = $_POST['phone'];
$modelname = $_POST['modelname'];
$myemail = 'daniil2003478@gmail.com';
$to = $myemail;
$subject = 'New Order';
$body = '<html>
            <body>
                <h2>New Order</h2>
                <hr>
                <p>Name:<br>'.$name.'</p>
                <p>Phone:<br>'.$phone.'</p>
                <p>Modelname:<br>'.$modelname.'</p>
            </body>
        </html>';

$headers = "From: $myemail\n";

$send = mail($to, $subject, $body, $headers);
if ($send){
    echo '<br>';
    echo 'order was sent';
} else {
    echo 'something is wrong';
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>