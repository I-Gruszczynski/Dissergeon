<?php

$serverName2 = "localhost";
$dbUsername2 = "connector";
$dbPassword2 = "Rb]WYwpjROYU8dv*";
$dbName2 = "articlesystem";

$conn2 = mysqli_connect($serverName2, $dbUsername2, $dbPassword2, $dbName2, 4306);

if(!$conn2)
{
    die("Connection failed:" . mysqli_connect_error());

}
