<?php 
session_start();
	include_once("database.php");
	$user_id = $_SESSION['user_id']; 
    $sql = "DELETE  FROM user where user_id=$user_id"; 
    if ($connection->query($sql)){ 
        echo " record is deleted sucessfully"; 
    } else { 
        echo "Error: ". $sql ." ". $connection->error; 
    } 
  

  
?> 