<?php 
    session_start();

    include "config.php";

    if(isset($_POST['submit'])){
        $itemCatogary = $_POST['itemCatogary'];
        $name = $_POST['itemName'];
        $itemImage = $_POST['itemImage'];
        $descreption = $_POST['message'];
        $Quentity = $_POST['Quentity'];
        $Price = $_POST['Price'];
        $email = $_SESSION['email'];

        $sql = "INSERT INTO `items`(`catagory`,`itemName`,`img`,`description`,`quantity`,`price`,`email`)
                VALUES ('$itemCatogary','$name','$itemImage','$descreption','$Quentity','$Price','$email')";
        
        $result = $conn->query($sql);
        
        if($result){
            echo "New item added successfully.!";
            header("Location:sellor_acc.php");
            exit();
        }
        else{
            echo"Error".$sql."<br>".$conn->error;
        }
    }
?>