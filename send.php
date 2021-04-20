<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

if (($_POST['email'])&&(!$_POST['name'])&&(!$_POST['phone'])&&(!$_POST['message']))
{

  // Переменные, которые отправляет пользователь
$email = $_POST['email'];

// Формирование самого письма
$title = "New subscriber Best Tour Plan";
$body = "
<h2>New subscriber</h2>
<b>Email: </b> $email
";

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
   // $mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'smtp.mail.ru'; // SMTP сервера вашей почты
    $mail->Username   = 'landing.vladimir@mail.ru'; // Логин на почте
    $mail->Password   = 'OHA71ZslvRRmPRykXQTo'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('landing.vladimir@mail.ru', 'Владимир Иванов'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('greathunter@mail.ru');

// Отправка сообщения
$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body = $body;    

// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
//echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);

header('Location: newnewsletter.html');

} else {

// Переменные, которые отправляет пользователь
$name = $_POST['name'];
$phone = $_POST['phone'];
if ($_POST['email']) {
  $email = $_POST['email'];
}
$message = $_POST['message'];

// Формирование самого письма
$title = "New request to the Best Tour Plan";
if($email){
  $body = "
  <h2>New request</h2>
  <b>Name:</b> $name<br>
  <b>Phone:</b> $phone<br>
  <b>Email:</b> $email<br><br>
  <b>Message:</b><br>$message
  ";
}else {
  $body = "
  <h2>New request</h2>
  <b>Name:</b> $name<br>
  <b>Phone:</b> $phone<br><br>
  <b>Message:</b><br>$message
  ";
}



// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
   // $mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'smtp.mail.ru'; // SMTP сервера вашей почты
    $mail->Username   = 'landing.vladimir@mail.ru'; // Логин на почте
    $mail->Password   = 'OHA71ZslvRRmPRykXQTo'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('landing.vladimir@mail.ru', 'Владимир Иванов'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('greathunter@mail.ru');

// Отправка сообщения
$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body = $body;    

// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
//echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);

header('Location: thankyou.html');
}
