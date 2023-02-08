
<?php
echo "Dziala przed if";
if(isset($_POST["submit_reg"]))
{
    $name = $_POST["name_reg"];
    $email = $_POST["email_reg"];
    $pwd = $_POST["pwd_reg"];
    $pwd2 = $_POST["pwd2_reg"];
    echo "Dziala przed require";
    require_once "database.php";
    require_once "functions.php";
    echo "Dziala po require";
    if(emptyInputSignup($name, $email, $pwd, $pwd2) !== false)
    {
        header("location:$_SERVER[HTTP_REFERER]?error=emptyinput");
        echo "Puste pola";
        exit();
    }
    if(invalidEmail($email) !== false)
    {
        header("location:$_SERVER[HTTP_REFERER]?error=invalidemail");
        echo "Bledny email";
        exit();
    }
    if(pwdMatch($pwd, $pwd2) !== false)
    {
        header("location:$_SERVER[HTTP_REFERER]p?error=passwordsdontmatch");
        echo "Niepasujace hasla";
        exit();
    }
    if(nameExists($conn, $name, $email) !== false)
    {
        header("location:$_SERVER[HTTP_REFERER]?error=nametaken");
        echo "Nazwa istnieje";
        exit();
    }


    createUser($conn, $name, $email, $pwd);
    
}  
else
{
    header("$_SERVER[HTTP_REFERER]");
    exit();
}
?>