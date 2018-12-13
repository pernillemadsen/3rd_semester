<?php

require_once "config.php";

$sql = "SELECT * FROM users";

$result = mysqli_query($link, $sql);

 if(mysqli_num_rows($result) > 0 ){
        while($row = $result->fetch_assoc()) {
            
            $data[]=$row;
    }

    $datastep = json_encode($data);
     echo $datastep; 
     
    
 }
?>
