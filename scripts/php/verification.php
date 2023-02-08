<?php
require_once("database.php");

$user = $_GET["usersName"];

$sql = "UPDATE users SET verify=true WHERE usersName=$user;";

$result = mysqli_query($conn2, $sql);

$articles = mysqli_fetch_all($result, MYSQLI_ASSOC);

header("location:$_SERVER[HTTP_REFERER]"); 