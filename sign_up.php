<?php 
include "config.php";

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $addres = $_POST['address'];
    $country = $_POST['Country'];
    $password = $_POST['password'];
    $c_Password = $_POST['password_confirmation'];


    $sql_isnewuser = "SELECT * FROM `sellor` WHERE `email`='$email'";

    $result = $conn->query($sql_isnewuser);

    if($result->num_rows>0){
        echo "User already exist.!";
    }
    else if($password!=$c_Password){
        echo "Password not matched.!";
    }
    else{
        $sql = "INSERT INTO `sellor`(`email`,`name`,`addres`,`country`,`password`,`c_password`)
            VALUES('$name','$emai','$addres','$country','$password','$c_Password')";

        $Insert_result= $conn->query($sql);
        if($Insert_result == TRUE){
            echo "New record added succesfully..";
            header("Location:sellor_acc.html");
          }
          else{
            echo "ERROR: ".$sql."<br>".$conn->error;
          }
    }
}
?>