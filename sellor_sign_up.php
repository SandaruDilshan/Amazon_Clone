<?php 
    include "config.php";

    if(isset($_POST["submit"])){
        $name = $_POST['Name'];
        $email = $_POST['Email'];
        $address = $_POST['Address'];
        $country = $_POST['Country'];
        $password = $_POST['Password'];
        $c_Password = $_POST['Password_confirmation'];

        if($password != $c_Password){
            echo "Youre password don't match..!";
            exit();
        }

        $check_email_exist = "SELECT * FROM `user` WHERE `email`=`$email`";
        $checked_result = $conn->query($check_email_exist);

        if($checked_result->num_rows > 0){
            echo "Email is already exist";
            exit();
        }

        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO `sellor`(`email`,`name`,`addres`,`country`,`password`)
                VALUES ('$email','$name','$address','$country','$hashed_password')";

        if($conn->query($sql)===TRUE){
            echo "New rocored added successfully";
            header("Location: sellor_sign_in.html");
            exit();
        }
        else{
            echo "Error:".$sql."<br>".$conn->error;
        }
    }

?>