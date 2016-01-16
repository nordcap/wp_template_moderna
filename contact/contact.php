<?php
/*
Credits: Bit Repository
URL: http://www.bitrepository.com/
*/


include 'config.php';

error_reporting(E_ALL ^ E_NOTICE);

$post = (!empty($_POST)) ? true : false;

if ($post) {

    $name = stripslashes($_POST['name']);
    $email = trim($_POST['email']);
    $subject = stripslashes($_POST['subject']);
    $message = stripslashes($_POST['message']);


    $error = '';


    if (!$error) {
        $mail = mail(WEBMASTER_EMAIL, $subject, $message,
            "From: " . $name . " <" . $email . ">\r\n"
            . "Reply-To: " . $email . "\r\n"
            . "X-Mailer: PHP/" . phpversion());


        if ($mail) {
            echo 'OK';?>
            <hr>
            <a href="<?php print_r( $_SERVER['HTTP_REFERER']);?>">Вернуться в контактную форму</a>

        <?php
        }

    }


}
?>