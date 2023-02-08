<?php

$serverName = "localhost";
$dbUsername = "connector";
$dbPassword = "Rb]WYwpjROYU8dv*";
$dbName = "loginsystem";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName, 4306);

if(!$conn)
{
    die("Connection failed:" . mysqli_connect_error());
}
