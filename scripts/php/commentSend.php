<?php
session_start();

require_once("database3.php");

//$previous = "javascript:history.go(-1)";
$username = $_SESSION["usersname"];
$article_id = $_SESSION['id'];

$comment_text = $_POST["comment_text"];

if($username == null)
{
    header("location:$_SERVER[HTTP_REFERER]&username=none"); 
}
else if($comment_text == null)
{
    header("location:$_SERVER[HTTP_REFERER]&comment_text=none"); 
}
else
{
$sql = "INSERT INTO comments(username, message, article_id) VALUES ('$username','$comment_text', $article_id); ";

$result = mysqli_query($conn3, $sql);

try
{
//$comments = mysqli_fetch_all($result, MYSQLI_ASSOC);
header("location:$_SERVER[HTTP_REFERER]");
}
catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}




}
