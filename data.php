<?php
$conn = mysqli_connect("localhost:3306", "letechde_root", "Warisgood1990!", "letechde_pedometer");
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}
$user = "Admin";
//$steps = "1802960472";
//$Email = $_POST["Email"];
//$Password = $_POST["Password"];
$sql_query = "SELECT steps, date FROM steplogger WHERE userid IN 
   (SELECT id FROM users WHERE username = '$user') ORDER BY date DESC";

    $result = mysqli_query($conn, $sql_query);


if (!$result) {
	die ('SQL Error: ' . mysqli_error($conn));
}


//Lauras andet forsøg 
 if(mysqli_num_rows($result) > 0 ){
        while($row = $result->fetch_assoc()) {
            
            $data[]=$row;
        

    }
     
    $datastep = json_encode($data);
     echo $datastep; 
    }

    

//forsøg slut

?>



      
