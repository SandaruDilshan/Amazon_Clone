<?php
$servername="localhost";
$username="root";
$password="";
$dbname="amazon_clone";

$conn =new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("Connection faild: ".$conn->connect_error);
}
?>