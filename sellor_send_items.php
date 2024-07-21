<?php 
include "config.php";
session_start();

if (isset($_POST["submit"])) {
    $itemCatogary = $_POST['itemCatogary'];
    $name = $_POST['itemName'];
    $description = $_POST['message'];
    $quantity = $_POST['Quentity'];
    $price = $_POST['Price'];
    $email = $_SESSION['email'];

    if ($_FILES["itemImage"]["error"] === 4) {
        echo "<script>alert('Image does not exist..!')</script>";
    } else {
        $fileName = $_FILES["itemImage"]["name"];
        $fileSize = $_FILES["itemImage"]["size"];
        $tmpName = $_FILES["itemImage"]["tmp_name"];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));

        if (!in_array($imageExtension, $validImageExtension)) {
            echo "<script>alert('Invalid image extension..!')</script>";
        } else if ($fileSize > 1000000) {
            echo "<script>alert('Image file too large..!')</script>";
        } else {
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;

            $imageFolder = 'img/';
            if (!is_dir($imageFolder)) {
                mkdir($imageFolder, 0777, true);
            }

            move_uploaded_file($tmpName, $imageFolder . $newImageName);

            $stmt = $conn->prepare("INSERT INTO `items`(`catagory`, `itemName`, `img`, `description`, `quantity`, `price`, `email`) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssids", $itemCatogary, $name, $newImageName, $description, $quantity, $price, $email);

            if ($stmt->execute()) {
                echo "<script>alert('Successfully Added.'); document.location.href='sellor_acc.php';</script>";
            } else {
                echo "<script>alert('Error adding data.');</script>";
                echo $stmt->error;
            }
            $stmt->close();
        }
    }
}
$conn->close();
?>
