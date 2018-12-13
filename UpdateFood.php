<?php

require_once "config.php";
$user = $_POST["username"];
$food = $_POST["food"];

$sql = "UPDATE users SET food='$food' WHERE username='$user'";

$result = mysqli_query($link, $sql);

?>