<?php 
    $serverName ="localhost";
    $userName ="root";
    $password="";
    $dbName = "amazon_clone";

    $conn = mysqli_connect($serverName, $userName, $password, $dbName);

    if(!$conn){
        die("Connection Faild".mysqli_connect_error());
    }
?>