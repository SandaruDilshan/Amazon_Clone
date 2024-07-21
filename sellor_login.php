<?php 
    session_start();

    include "config.php";

    if(isset($_POST['submit'])){

        $email =$_POST['Email'];
        $password = $_POST['Password'];

        $sqlBind = $conn->prepare("SELECT * FROM `sellor` WHERE `email`=?");
        $sqlBind ->bind_param("s",$email);
        $sqlBind ->execute();
        
        $result = $sqlBind->get_result();

        if($result->num_rows === 1){


            $raw = $result->fetch_assoc();

            if(password_verify($password,$raw['password'])){
                $_SESSION['email']=$email;
                header("Location:sellor_acc.php");
                exit();
            }
            else{
                echo "Invalid Password..! Try aging.";
                exit();
            }
        }
        else{
            echo "You haven't account yet.. Create account.";
            exit();
        }

        
    }
?>