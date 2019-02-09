<?php
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->SMTPSecure = 'sls';
$mail->SMTPAuth = true;
$mail->isHTML();
$mail->Username = 'landf2020@gmail.com';
$mail->Password = 'Anik1234';
$mail->setFrom('no_replay@howtocode.org');
$mail->Subject = 'hello world';
$mail->Body = 'A test email';
$mail->AddAddress('anikraju110@gmail.com');