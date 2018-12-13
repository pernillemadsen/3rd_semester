<?php

require_once("config.php");

$user = $_POST["username"];

$sql_query = "SELECT id FROM users WHERE username='$user'";

$id = mysqli_query($link, $sql_query);


    if(mysqli_num_rows($id) > 0 ){

    $rows = mysqli_fetch_assoc($id);
    $userid = $rows["id"]; 

    }

$sql_date = "SELECT date FROM steplogger WHERE (userid='$userid') ORDER BY date DESC";

$date = mysqli_query($link, $sql_date);


    if(mysqli_num_rows($date) > 0 ){

    $rows = mysqli_fetch_assoc($date);
    $entry_date = $rows["date"]; 

    }

$sql = "SELECT steps FROM steplogger WHERE (userid='$userid') AND (date='$entry_date')";

$result = mysqli_query($link, $sql);

    if(mysqli_num_rows($result) > 0 ){

    $row = mysqli_fetch_assoc($result);
    $steps = $row["steps"]; 
    
    echo $steps;

    }

?>
