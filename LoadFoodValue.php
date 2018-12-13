<?php

require_once("config.php");
$user = $_POST["username"];


$sql = "SELECT food FROM users WHERE username = '$user'";

$result = mysqli_query($link, $sql);

    if(mysqli_num_rows($result) > 0 ){

    $row = mysqli_fetch_assoc($result);
    $food = $row["food"]; 
    
    echo $food;

    }
?>