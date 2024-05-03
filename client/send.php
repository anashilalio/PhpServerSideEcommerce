<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: *");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$postData = file_get_contents("php://input");
$request = json_decode($postData);
$email= $request->email;
$subject = $request->subject;
$message = $request->message;

require '../vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'anaslike41@gmail.com';
    $mail->Password   = 'Iamanois';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress($email); // Use the email from the request

    $mail->isHTML(true);
    $mail->Subject = $subject; // Use the subject from the request
    $mail->Body    = $message; // Use the message from the request

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>