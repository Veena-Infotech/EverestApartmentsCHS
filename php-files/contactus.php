<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';

if (empty($name) || empty($email) || empty($message)) {
    http_response_code(400); // Bad request
    echo json_encode(["success" => false, "message" => "All fields are required."]);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400); // Bad request
    echo json_encode(["success" => false, "message" => "Invalid email format."]);
    exit;
}

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'veenatheveenagroup@gmail.com';
    $mail->Password   = 'phac mbga bbli vmow'; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    $mail->setFrom('veenatheveenagroup@gmail.com', 'Everest Apartments CHS Website');
    $mail->addAddress('ompandey.veenagroup@gmail.com', 'Society');

    $mail->isHTML(true);
    $mail->Subject = 'Message From Everest Apartments CHS Website';
    $mail->Body    = "Name: $name <br> Email: $email <br> Message: $message";

    $mail->send();
    echo json_encode(["success" => true, "message" => "Message has been sent successfully."]);
} catch (Exception $e) {
    http_response_code(500); // Internal server error
    echo json_encode(["success" => false, "message" => "Message could not be sent."]);
}
?>
