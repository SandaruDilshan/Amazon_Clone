<?php
include "config.php";
session_start();

if(isset($_POST["submit"])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check_email_exist = "SELECT * FROM `customer` WHERE `email` = ?";
    $stmt = $conn->prepare($check_email_exist);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows === 1){
        
        //$row = $result->fetch_assoc();
        // $password = $row['password'];
        // if(password_verify($password,$row['password'])){
            $_SESSION['customer_email'] = $email;
            header("Location:index.html");
        //     exit();
        // }
        // else{
        //     echo "Invalid Password..! Try aging.";
        //     exit();
        // }
        
    } else {
        echo "Email does not exist.";
    }
}
?>
