<?php
if (isset($_POST['reset'])) {
    $email = $_POST['email'];
} else {
    exit();
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'mail/Exception.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'cseeng148@gmail.com';                     //SMTP username
    $mail->Password   = 'cseeng148@gmail';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('cseeng148@gmail.com', 'Admin');
    $mail->addAddress($email);     //Add a recipient

    $code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'), 0, 10);
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Password Reset';
    $mail->Body    = 'To reset your password click <a href="http://localhost/trail mine/official-forgot-password.php?code=' . $code . '">here</a>. </br>Reset your password in a day.';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $verifyQuery = $con->query("SELECT * FROM official_details WHERE id = '$id'");
    if ($verifyQuery->num_rows) {
        $codeQuery = $con->query("UPDATE official_details SET code = '$code' WHERE ID = '$id'");
        $mail->send();
        echo 'Message has been sent, ceck your email';
    }
    $con->close();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
