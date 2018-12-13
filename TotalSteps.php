<?php

require_once("config.php");
$user = $_POST["username"];


$sql = "SELECT totalsteps FROM users WHERE username = '$user'";

$result = mysqli_query($link, $sql);

    if(mysqli_num_rows($result) > 0 ){

    $row = mysqli_fetch_assoc($result);
    $totalsteps = $row["totalsteps"]; 
    
    echo $totalsteps;

    }
?>