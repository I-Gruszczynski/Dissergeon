<?php
if(isset($_POST["submit_log"]))
{
    $email = $_POST["email_log"];
    $pwd = $_POST["pwd_log"];

    require_once "database.php";
    require_once "functions.php";

    if(emptyInputLogin($email, $pwd) !== false)
    {
        header("location: ../../pages/main.php?error=emptyinput");
        exit();
    }
    
    loginUser($conn, $email, $pwd);
}
else
{
    header("location: ../../pages/main.php");
    exit();
}