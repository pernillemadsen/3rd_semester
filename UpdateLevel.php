<?php

require_once "config.php";
$user = $_POST["username"];
$level = $_POST["level"];

$sql = "UPDATE users SET level='$level' WHERE username='$user'";

$result = mysqli_query($link, $sql);

?>