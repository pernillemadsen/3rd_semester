<?php
/* Database credentials. */
define('DB_SERVER', 'localhost:3306');
define('DB_USERNAME', 'letechde_root');
define('DB_PASSWORD', 'Warisgood1990!');
define('DB_NAME', 'letechde_pedometer');

$user = $_POST["usernamePost"];
//$hashed_password = password_hash($_POST['passwordPost'], PASSWORD_DEFAULT);

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT password FROM users WHERE username = '$user'";

$result = $link->query($sql);


// Get result and confirm login
if ($result->num_rows > 0) {
    

    // output data of each row
    while($row = $result->fetch_assoc()) {
        if(password_verify($_POST['passwordPost'], $row['password'])) {
            echo "Login success";
        } else {
            echo "Password incorrect";;    
        }
    }
} else {
    echo "User not found";
}
$link->close();
?>
