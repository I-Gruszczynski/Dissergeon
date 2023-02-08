<?php
require_once("database3.php");

$sql = "SELECT * FROM comments";

$result = mysqli_query($conn3, $sql);

$comments = mysqli_fetch_all($result, MYSQLI_ASSOC);
