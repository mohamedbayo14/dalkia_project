<?php

require 'C:\Users\marti\Desktop\cours 3A-IF\PING\PhpMailer2\PHPMailer-5.2.25\PHPMailerAutoload.php';

echo ('bonjour ');
$mail = new PHPMailer();
$mail -> isSMTP();
echo ('bonjour  ');
$mail -> SMTPAuth = true;
$mail -> SMTPSecure = 'ssl';
$mail -> Host = 'smtp.gmail.com';
$mail -> Port = '465';
$mail -> isHTML();
$mail -> Username = 'gaetanmartin6178@gmail.com';
$mail -> Password = 'kdUZA$yRW6k4';
$mail -> SetFrom ('projetping.esigelec@gmail.com');
$mail -> Subject = 'Hello World !' ;
$mail -> Body = 'this is a test mail to World Champion Bobby Fischer';
$mail -> AddAddress ('gm6178d@gmail.com');
echo ('try another ');

$mail -> send();


if($mail -> send())
    echo('mail successfully sent    ');
else
    echo('something wrong happened  ');



echo ('////bonjour');

?>