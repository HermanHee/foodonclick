<?php

/*
this is the working php file
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once "email-config.php";

function send_email($body, $subject, $email, $name){

    try{
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = HOST;                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = USERNAME;                     //SMTP username
        $mail->Password = PASSWORD;                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = PORT;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom("no-reply@foodonclick.com", 'Mailer');
        $mail->addAddress($email, $name);     //Add a recipient

        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $body;

        $mail->send();
    }catch (Exception $e){
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}
*/
	function send_email($body, $subject, $email, $name)
	{
	$headers = "From: FoodOnClick Singapore<foodonclicksimge@gmail.com>\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	if(mail($email, $subject, $body, $headers)){
			
	}
	else{
			echo "Sorry, failed when sending mail";
	}
	
	}
	
?>
