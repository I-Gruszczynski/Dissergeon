<?php
require_once("database2.php");

$sql = "SELECT * FROM acticles";

$result = mysqli_query($conn2, $sql);

$articles = mysqli_fetch_all($result, MYSQLI_ASSOC);
