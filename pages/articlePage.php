<?php
    session_start();
    include "../scripts/php/article.php";
    include "../scripts/php/comment.php";
    $counterTitle = count($articles);
    $counterVideo = count($articles);
    $counterContext = count($articles);
    $_SESSION['id'] = $_GET['id'];
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
    <link rel="icon" type="image/x-icon" href="/images/EXELOGO.png">
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
            <h1><?php 
                
                foreach ($articles as $article)
                {
                    if($article['id'] == $_GET["id"])
                    {
                    echo $article['title'];
                    }
                }

                
            ?></h1>

            <div id = "content_video">
            <?php 
                            
                foreach ($articles as $article)
                {
                    if($article['id'] == $_GET["id"])
                    {
                    echo $article['image'];
                    }
                }

            ?>
            </div>
            <article>
            <?php
                           
                foreach ($articles as $article)
                {
                    if($article['id'] == $_GET["id"])
                    {
                    echo $article['context'];
                    }
                }

            ?>

            </article>
            <div style="clear:both;"></div>
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
                
                <form method="post" action="../scripts/php/commentSend.php">
                    <div id="main_comment">
                        <div id="main_comment_result">
                            
                        </div>
                        <div id="main_comment_text">
                            <input id="main_comment_input" placeholder="Napisz komentarz" name="comment_text" onkeyup="countChars(this);" required/>
                        </div>
                            <input type="submit" value="Wyślij" id="main_comment_input_button" name="comment_button"/>
                    </div>
                    </form>
                    <div style="clear:both;"></div>
                <?php
                if(isset($_GET["username"]))
                {
                    if($_GET["username"] == "none")
                    {
                        echo "<p style='color:red'>Zaloguj się, aby wstawić komentarz</p>";
                    }
                }
                if(isset($_GET["comment_text"]))
                {
                    if($_GET["comment_text"] == "none")
                    {
                        echo "<p style='color:red'>Komentarz jest pusty</p>";
                    }
                }

                ?>    
                <hr/>
                <?php
                /*
                $countComment = 0;
                echo "<h2>Komentarze: ".$countComment."</h2>";
                if(isset($_POST["comment_button"]) && !isset($_SESSION["usersid"]))
                {
                    echo "<p style='color:red;'>Zaloguj się, aby napisać komentarz</p>";
                }
                else if(isset($_POST["comment_button"]) && (isset($_POST["comment_text"])))
                {
                    $text = $_POST['comment_text'];
                    $element = "<div class='comment_class'><p>".$_SESSION["usersname"]."</p>".$text."</div>";
                    $countComment++;
                    foreach( range(1,$countComment) as $item){
                        echo $element;
                    }
                }
                */
                
                if(isset($_POST['comment_button']))
                {
                    require_once("../scripts/php/database3.php");
                    $username = $_SESSION["usersname"];
                    $comment_text = $_POST["comment_text"];
                    
                        require_once("../scripts/php/commentSend.php");
                    /*    
                    $sql3 = "INSERT INTO comments(username, message) VALUES ('$username','$comment_text'); ";

                    $result3 = mysqli_query($conn3, $sql3);

                    $comments = mysqli_fetch_all($result3, MYSQLI_ASSOC);
                    */
                    
                }

//$comments = mysqli_fetch_all($result, MYSQLI_ASSOC);
                ?>

                    <?php
                    if(isset($_POST['comment_button']))
                    {
                        if($_SESSION["usersname"] == null)
                        {
                            echo "<p style='color:red'>Zaloguj się, aby wstawić komentarz</p>";
                        }
                        else if($comment_text == null)
                        {
                            echo "<p style='color:red'>Komentarz jest pusty</p>";
                        }
                    }
                    require_once("../scripts/php/comment.php");
                    if(is_array($comments) || is_object($comments))
                    {
                        $count = 0;
                        foreach((array) $comments as $comment)
                        {
                            if($_GET['id'] == $comment['article_id'])
                            {
                                $count++;
                            }
                        }
                        echo "<h2>Komentarze: ".$count."</h2>";
                        foreach((array) $comments as $comment)
                        {
                            if($_GET['id'] == $comment['article_id'])
                            {        
                                    echo "<div class='comment_class'>";
                                    echo "<p style='color:white;font-weight: bold;font-size:18px;'>".$comment['username']."</p>";
                                    echo "<p style='padding-left:10px'>".$comment['message']."</p>";
                                    echo "</div>";
                            }
                        }
                    }
                    else
                    {
                        echo "Błąd z bazą";
                    }
                    
                    ?>
                    
            
        </section>
        
    </main>
</body>
<script src="../scripts/js/main.js">
</script>
</html>
