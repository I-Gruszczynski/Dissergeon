<?php

require "PHPMailer.php";
require "SMTP.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function emptyInputSignup($name, $email, $pwd, $pwd2)
{
     $result;
     if(empty($email) || empty($name) || empty($pwd) || empty($pwd2))
     {
        $result = true;
     }
     else
     {
        $result = false;
     }

     return $result;
}

function invalidEmail($email)
{
     $result;
     if(!filter_var($email, FILTER_VALIDATE_EMAIL))
     {
        $result = true;
     }
     else
     {
        $result = false;
     }

     return $result;
}

function pwdMatch($pwd, $pwd2)
{
     $result;
     if($pwd !== $pwd2)
     {
        $result = true;
     }
     else
     {
        $result = false;
     }

     return $result;
}

function nameExists($conn, $name, $email)
{
   $sql = "SELECT * FROM users WHERE usersName = ? OR usersEmail = ?;";
   $stmt = mysqli_stmt_init($conn);
   
   if (!mysqli_stmt_prepare($stmt, $sql))
   {
      header("location: ../../pages/main.php?error=stmtfailed");
      exit();
   }

   mysqli_stmt_bind_param($stmt, "ss", $name, $email);
   mysqli_stmt_execute($stmt);

   $resultData = mysqli_stmt_get_result($stmt);
   
   if ($row = mysqli_fetch_assoc($resultData))
   {
      return $row;
   }
   else
   {
      $result = false;
      return $result;
   }

   mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $pwd)
{
   $sql = "INSERT INTO users (usersEmail, usersName, usersPwd) VALUES (?, ?, ?);";
  
   $stmt = mysqli_stmt_init($conn);

   if(!mysqli_stmt_prepare($stmt, $sql))
   {
      header("location: ../../pages/main.php?error=stmtfailed");
      exit();
   }

   $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

   mysqli_stmt_bind_param($stmt, "sss", $email, $name, $hashedPwd);
   mysqli_stmt_execute($stmt);

   //mail sent
   $mail = new PHPMailer();
   $mail->isSMTP();
   $mail->Host = "smtp.gmail.com";
   $mail->SMTPAuth = "true";
   $mail->SMTPSecure = "tls";
   $mail->Port = "587";//465
   $mail->Username = "igor.grusz@gmail.com";
   $mail->Password = "jlexowuvtlsuwaix";
   //haslo do Dissergeon: rlwosixixvgpuczp jlexowuvtlsuwaix
   $mail->Subject = "Potwierdz swoj adres email";
   $mail->setFrom("igor.grusz@gmail.com");
   $mail->Body = "Czesc $name
   Witamy na stronie Dissgeon. Aby rozpocząć korzystanie ze strony, musisz potwierdzic swoj adres email
   Aby to zrobic kliknij w link ponizej:
   
   http://195.117.36.77/dissgeon_website/pages/verification_site.php"; 
   $mail->addAddress($_POST["email_reg"]);

   if($mail->Send())
   {
       echo "<script type='text/javascript'>alert('Email Sent')</script>";
       header("location:$_SERVER[HTTP_REFERER]?error=emailsent");
       exit();
   }
   else
   {
       echo "<script type='text/javascript'>alert('Error')</script>";
       echo "Mailer Error : " . $mail->ErrorInfo;
       header("location:$_SERVER[HTTP_REFERER]?error=emailerror");
       exit();
   }
   $mail->smtpClose();

   header("location:$_SERVER[HTTP_REFERER]?error=none");
   exit();
}

function loginUser($conn, $email, $pwd)
{

   $nameExists = nameExists($conn, $email, $email);

   if ($nameExists === false)
   {
      header("location: ../../pages/main.php?errorLogin=wronglogin");
      exit();
   }

  /*
   $pwdHashed = $nameExists["usersPwd"];
   $checkPwd = password_verify($pwd, $pwdHashed);
   
   if ($checkPwd === false)
   {
      header("location: ../../pages/main.php?errorLogin=wronglogin");
      exit();
   }
   else
   {*/
   
      session_start();
      /*if($nameExists["verif"] == false)
      {
      header("location: ../../pages/main.php?errorLogin=not_verify");
      exit();
      }
      else
      {*/
      $_SESSION["usersid"] = $nameExists["usersId"];
      $_SESSION["usersname"] = $nameExists["usersName"];
      header("location: ../../pages/main.php?errorLogin=zalogowano"); 
      //}
      exit();
   //}
}

function emptyInputLogin($email, $pwd)
{
     $result;
     if(empty($email) || empty($pwd))
     {
        $result = true;
     }
     else
     {
        $result = false;
     }

     return $result;
}