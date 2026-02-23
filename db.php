<?php
$host="localhost";
$user="root";
$pass="";
$db="ecom_project";
$conn=mysqli_connect($host,$user,$pass,$db);
if(!$conn){
    echo "connection failed";
    die("Database connection failed: " . mysqli_connect_error());
}
else
    {
        echo "connection successful";
    
    }
	
	
    
?>