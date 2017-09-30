<?php
require "helpers/mailer/PHPMailerAutoload.php";

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';

$mail->Host       = "mail.appley.io";
$mail->SMTPDebug  = 0;
$mail->SMTPAuth   = true;
$mail->Port       = 25;
$mail->Username   = "wcworship@appley.io";
$mail->Password   = ".v*P+[vH5^&2";  


$mail->setFrom('wcworship@appley.io', 'WC Worship');
$mail->addAddress('jwes.device@gmail.com', 'John');
$mail->isHTML(true);


$mail->Subject = 'Welcome to WC Worship';
$mail->Body    = '<h1>Hi,</h1>This is Rachel form WCWorship<br /><h4>Invite to join the team</h4><br /><br /><a style="margin-left:auto;margin-right:auto;text-align:center;padding:20px;font-size:20px;background-color: #0099ff;color: #fff">Accept invite</a>';
$mail->AltBody = 'Test Mail';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
 ?>