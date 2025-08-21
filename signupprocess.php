<?php
session_start();
require 'connection.php';
// echo 'processed';
    
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phonenumber'];
    $address = $_POST['position'];
    if (empty($_POST['email']) || empty($_POST['password'])|| empty($_POST['fullname'])|| empty($_POST['phonenumber'])|| empty($_POST['position'])) {
        $_SESSION['msg'] = 'All field required';
        header('Location:signup.php');
        exit();
            // echo 'All field required';
    } else if(strlen($_POST['password']) < 4) {
        $_SESSION['msg'] = 'The password length must not be less than 4';
        header('Location:signup.php');
        exit();
            // echo'The password length must not be less than 4';
    } else{
        $emailquery = "SELECT * FROM `employeess_table` WHERE email = '$email'";
        $emailcon = $connection -> query($emailquery);
        if ($emailcon) {
            if ($emailcon -> num_rows > 0) {
                $_SESSION['msg'] = 'Email already exits';
                header('Location:signup.php');
                exit();
            } else { 
                $hashpassword = password_hash($password, PASSWORD_DEFAULT);
                $queries="INSERT INTO `employeess_table` (`full_name`, `email`, `password`, `address`, `phonenumber`) 
            VALUES ('$fullname','$email','$hashpassword', '$address', '$phone')";
                $conn = $connection->query($queries);
                if ($conn) {
                    header('Location:signin.php');
                    // echo'Running successfully';
                    exit();
                } else {
                    echo "failed to run";
                }
            }
        }
        
    }
} else {
    header("Location: signup.php");
    exit();
}

?>