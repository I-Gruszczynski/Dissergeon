<?php
    session_start();
    include "../scripts/php/article.php";
    $counterTitle = count($articles);
    $counterVideo = count($articles);
    $counterContext = count($articles);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/style_main.css"/>
    <link rel="stylesheet" type="text/css" href="../styles/style_headerss.css"/>
    <title>Dissgeon</title>
    <link rel="icon" type="image/x-icon" href="/images/gameLogo_con6.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=VT323&display=swap" rel="stylesheet">
</head>
<style>
 @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&family=VT323&display=swap');
</style>
<body>
    <header>
        <div id="header">
        <img id="header_toggle-menu" src="../images/toggle_menu.png" width="50px" height="50px">
            <div id="header_logo">
                <a href="main.php"><img src="../images/dissergeon_logo.png" width="300px" height="30px"/></a>
            </div>
            <div id="header_list">
                <ul id="header_list_ul">
                    <li class="header_list_li"><a href ='main.php'>Aktualności</a></li>
                    <li class="header_list_li"><a href ='about.php'>O grze</a></li>
                    <li class="header_list_li"><a href ='about_me.php'>O nas</a></li>
                    <li class="header_list_li"><a href="https://drive.google.com/uc?export=download&id=1lFk0gW3S3vbhOSY-rpwXVfApcrtD8c5Y&key=AIzaSyDS0-LD9CRr9YDum11elNjaKwUsTINYu4A&confirm=t&uuid=f643bb89-d6af-4d1c-bb72-d3ec8bfdab08" download="OFFLINE 1.0.zip">Pobierz grę</a></li>
                </ul>
            </div>
            <div id="header_login">
                <?php
                   if (isset($_SESSION["usersid"])) 
                    {
                        echo "<p id='header_login_log_done'>Witaj ".$_SESSION["usersname"]."</p>";
                        echo "<p id='header_login_register' style='cursor: pointer;'><a href='../scripts/php/logout.php' id='logout'>Wyloguj</a></p>";
                    }
                    else
                    {
                        echo "<p id='header_login_log' style='cursor: pointer;'>Zaloguj się</p>";
                        echo "<p id='header_login_register' style='cursor: pointer;'>Zarejestruj</p>";
                    }
                ?>
                <!--<p id="header_login_log" style="cursor: pointer;">Zaloguj się</p>
                <p id="header_login_register" style="cursor: pointer;">Zarejestruj</p>-->
            </div>
        </div>

    </header>
    <div style="clear:both"></div>
    <?php
    if(isset($_GET["errorLogin"]))
    {
        if($_GET["errorLogin"] == "zalogowano")
        {
            echo "<div id='login_box' style='display:none'>";
        }
        else
        {
            echo "<div id='login_box' style='display:block'>";
        }
    }
    else
    {
        echo "<div id='login_box' style='display:none'>";
    }
    ?>
        <form action="../scripts/php/login.php" method="post">
            <span id="login_box_close" style="position: absolute; right: 0%; top:0%; margin: 0px 10px; color:white; font-size:48px; font-weight: bold; cursor: pointer;">&times;</span>
            <h1>Login</h1>
            <hr/>
            <p></p><label class="login_box_label">Email lub nazwa</label></p>
            <p><input type="text" placeholder="Podaj email" name="email_log" class="login_box_textinput"/></p>
            <p><label class="login_box_label">Hasło</label></p>
            <p><input type="password" placeholder="Podaj hasło" name="pwd_log" class="login_box_textinput"/></p>
            
            <?php
            if(isset($_GET["errorLogin"]))
            {
                if($_GET["errorLogin"] == "emptyinput")
                {
                    echo "<p style='color:red'>Uzupełnij puste pola</p>";
                }
                else if($_GET["errorLogin"] == "wronglogin")
                {
                    echo "<p style='color:red'>Podano błędny email, nazwę lub hasło</p>";
                }
                else if($_GET["errorLogin"] == "not_verify")
                {
                    echo "<p style='color:red'>Nie zweryfikowano konta. Sprawdź pocztę</p>";
                }
                else
                {
                    echo "<p></p>";
                }
            }
            ?>

            <button type="submit" id="login_box_btn" name="submit_log">Zaloguj się</button>
        </form>
    </div>
    <?php
    if(isset($_GET["error"]))
                {
                    echo "<div id='register_box' style='display:block;'>";
                }
                else
                {
                    echo "<div id='register_box' style='display:none;'>";
                }
    ?>
        <form action="../scripts/php/register.php" method="post">
            <span id="register_box_close" style="position: absolute; right: 0%; top:0%; margin: 0px 10px; color:white; font-size:48px; font-weight: bold; cursor: pointer;">&times;</span>
            <h1>Rejestracja</h1>
            <hr/>
            <p><label class="register_box_label">Email i nazwa</label></p>
            <p><input type="text" placeholder="Podaj email" name="email_reg" class="register_box_textinput"/></p>
            <p><input type="text" placeholder="Podaj nazwe" name="name_reg" class="register_box_textinput"/></p>
            <p><label class="register_box_label">Hasło</label></p>
            <p><input type="password" placeholder="Podaj hasło" name="pwd_reg" class="register_box_textinput"/></p>
            <p><input type="password" placeholder="Powtórz hasło" name="pwd2_reg" class="register_box_textinput"/></p>
            <?php


                if(isset($_GET["error"]))
                {
                    if($_GET["error"] == "emptyinput")
                    {
                        echo "<p style='color:red'>Uzupełnij puste pola</p>";
                    }
                    else if($_GET["error"] == "invalidemail")
                    {
                        echo "<p style='color:red'>Błędny email</p>";
                    }
                    else if($_GET["error"] == "passwordsdontmatch")
                    {
                        echo "<p style='color:red'>Hasła nie są identyczne</p>";
                    }
                    else if($_GET["error"] == "stmtfailed")
                    {
                        echo "<p style='color:red'>Coś poszło nie tak</p>";
                    }
                    else if($_GET["error"] == "nametaken")
                    {
                        echo "<p style='color:red'>Nazwa już istnieje</p>";
                    }
                    else if($_GET["error"] == "none")
                    {
                        echo "<p style='color:green'>Użytkownik zarejestrowany</p>";
                    }
                    else if($_GET["error"] == "emailsent")
                    {
                        echo "<p style='color:green'>Email weryfikacyjny został wysłany</p>";
                    }
                    else
                    {
                     echo "<p></p>";
                    }
                }
                
                ?>
                <button type="submit" id="register_box_btn" name="submit_reg">Zarejestruj się</button>
        </form>
    </div>

    <main>
        <section>
            <div id="content">
                <?php for($i=1;$i<=count($articles);$i++):?>
                
                        <h1><?php 

                                    foreach ($articles as $article)
                                    {
                                        if($article['id'] == $counterTitle)
                                        {
                                        echo "<a href='articlePage.php?id=$article[id]' style='text-decoration:none;color:white'>";
                                        echo $article['title'];
                                        echo "</a>";
                                        }
                                    }
                                    $counterTitle--;
                            
                            ?></h1>
                        
                    
                        <div id = "content_video">
                        <?php 
                            
                                    foreach ($articles as $article)
                                    {
                                        if($article['id'] == $counterVideo)
                                        {
                                        echo $article['image'];
                                        }
                                    }
                               
                                $counterVideo--;
                            ?>
                        </div>
                
                        <article>
                        <?php
                           
                                    foreach ($articles as $article)
                                    {
                                        if($article['id'] == $counterContext)
                                        {
                                        echo $article['context'];
                                        }
                                    }
                               
                                $counterContext--;
                            ?>
                        
     
                    </article>
                    <div style="clear:both;"></div>
                    <hr style="border: 2px dashed #424242;margin: 40px 0px;"/>
                <?php endfor;?>
                <!--<h1><?php 
                    /*if(isset($_GET["id"]))
                    {
                        if($_GET['id'] == "1" || $_GET['id'] == "2")
                        {
                            foreach ($articles as $article)
                            {
                                if($article['id'] == 2)
                                {
                                echo $article['title'];
                                }
                            }
                        } 
                        else if($_GET['id'] == "3" || $_GET['id'] == "4")
                        {
                            foreach ($articles as $article)
                            {
                                if($article['id'] == 4)
                                {
                                echo $article['title'];
                                }
                            }
                        } 
                    }?></h1>
                <div id = "content_video">
                <?php 
                    if(isset($_GET["id"]))
                    {
                        if($_GET['id'] == "1" || $_GET['id'] == "2")
                        {
                            foreach ($articles as $article)
                            {
                                if($article['id'] == 2)
                                {
                                echo $article['image'];
                                }
                            }
                        } 
                        else if($_GET['id'] == "3" || $_GET['id'] == "4")
                        {
                            foreach ($articles as $article)
                            {
                                if($article['id'] == 4)
                                {
                                echo $article['image'];
                                }
                            }
                        } 
                    }?>
                </div>
                <article>
                    <?php 
                    if(isset($_GET["id"]))
                    {
                        if($_GET['id'] == "1" || $_GET['id'] == "2")
                        {
                            foreach ($articles as $article)
                            {
                                if($article['id'] == 2)
                                {
                                echo $article['context'];
                                }
                            }
                        } 
                        else if($_GET['id'] == "3" || $_GET['id'] == "4")
                        {
                            foreach ($articles as $article)
                            {
                                if($article['id'] == 4)
                                {
                                echo $article['context'];
                                }
                            }
                        } 
                    }*/?>
                </article>-->
                <div style="clear:both;"></div>
            
        </section>
    </main>
</body>
<script src="../scripts/js/main.js">
</script>
</html>