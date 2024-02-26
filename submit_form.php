<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $comment = $_POST["comment"];

    $to = "naomi222001220@gmail.com";  
    $subject = "New Message from $name";
    $message = "Name: $name\nEmail: $email\nComment: $comment";

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'naomi222001220@gmail.com'; // Replace with your Gmail address
        $mail->Password   = 'Naomicy@123'; // Replace with your Gmail password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress($to);

        // Content
        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        $referrer = $_SERVER['HTTP_REFERER'];
        if (strpos($referrer, 'resume.html') !== false) {
            header("Location: resume.html");
        } elseif (strpos($referrer, 'index.html') !== false) {
            header("Location:index.html");
        } 

        exit();
    } catch (Exception $e) {
        // Error in sending email
        echo 'Error: ' . $mail->ErrorInfo;
    }
}
?>
