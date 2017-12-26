<?php
	
   // require('mailer/class.phpmailer.php');
	//require('mailer/class.smtp.php');
	require('mailer/PHPMailerAutoload.php');

	require_once("mail_configuration.php");


$mail = new PHPMailer();

/*if(class_exists('PHPMailer')){
	echo "class exists!";
}else{
	echo "class not exists!";
}*/

$emailBody = "<div>" . $user["userid"] . ",<br><br><p>Click this link to recover your password<br><a href='" . PROJECT_HOME . "reset_password.php?name=" . $user["userid"] . "'>" . PROJECT_HOME . "reset_password.php?name=" . $user["userid"] . "</a><br><br></p>Regards,<br> Admin.</div>";

$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port     = PORT;  
$mail->Username = MAIL_USERNAME;
$mail->Password = MAIL_PASSWORD;
$mail->Host     = MAIL_HOST;
$mail->Mailer   = MAILER;

$mail->SetFrom(SERDER_EMAIL, SENDER_NAME);
$mail->AddReplyTo(SERDER_EMAIL, SENDER_NAME);
$mail->ReturnPath=SERDER_EMAIL;	
$mail->AddAddress($user["mailid"]);
$mail->Subject = "Forgot Password Recovery";		
$mail->MsgHTML($emailBody);
$mail->IsHTML(true);

$error_message = "";
$success_message = "";

if(!$mail->Send()) {
	$error_message = 'Problem in Sending Password Recovery Email';
} else {
	$success_message = 'Please check your email to reset password!';
}

?>
