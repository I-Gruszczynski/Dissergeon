<?php
$serverName3 = "localhost";
$dbUsername3 = "connector";
$dbPassword3 = "Rb]WYwpjROYU8dv*";
$dbName3 = "commentsystem";

$conn3 = mysqli_connect($serverName3, $dbUsername3, $dbPassword3, $dbName3, 4306);

if(!$conn3)
{
    die("Connection failed:" . mysqli_connect_error());
}
