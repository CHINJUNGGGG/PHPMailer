<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing true enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 1;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'junghwn18@gmail.com';                 // SMTP username
    $mail->Password = '*******';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, ssl also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('junghwn18@gmail.com', 'CHINJUNGLIVE');
    $mail->addAddress('chinjunglele@gmail.com', 'Panupong Kluekaew');     // Add a recipient
    
   // $subject = 'สวัสดีกูทำได้แล้ว';
    $body = '<p>By kalipzarr </p>';

    //Content
    $mail->isHTML(true);                                 
    $mail->Subject = 'Test send Mail';
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();
    echo '<script> window.open("http://www.google.com")';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo ' Mailer Error: '. $mail->ErrorInfo;
}