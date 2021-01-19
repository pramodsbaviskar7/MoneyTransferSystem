<?php      
    $servername = "localhost";  
    $user = "root";  
    $pass = "";  
    $db_name = "banking1";  
      
    $con = new mysqli($servername,$user, $pass, $db_name);
 
    // Check connection
    if($con === false){
        die("ERROR: Could not connect. " . $mysqli->connect_error);
    }


    try {
		$pdo= new PDO("mysql:host={$servername};dbname={$db_name}",$user,$pass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	}catch(PDOException $e){
		echo $e->getMessage();
	}

?>