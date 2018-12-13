<?php

require_once "config.php";
$user = $_POST["username"];
$clean = $_POST["clean"];

$sql = "UPDATE users SET clean='$clean' WHERE username='$user'";

$result = mysqli_query($link, $sql);

?>