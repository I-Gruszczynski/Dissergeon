<?php
require "register.php";
require "PHPMailer.php";
require "SMTP.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST["submit_reg"]))
{
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = "true";
    $mail->SMTPSecure = "tls";
    $mail->Port = "587";
    $mail->Username = "igor.grusz@gmail.com";
    $mail->Password = "jlexowuvtlsuwaix";
    $mail->Subject = "Test Email using PHPMailer";
    $mail->setFrom("igor.grusz@gmail.com");
    $mail->Body = "This is plain text email body"; 
    $mail->addAddress($_POST["email_reg"]);

    if($mail->Send())
    {
        echo "<script type='text/javascript'>alert('Email Sent')</script>";
    }
    else
    {
        echo "<script type='text/javascript'>alert('Error')</script>";
    }
    $mail->smtpClose();

}
?>