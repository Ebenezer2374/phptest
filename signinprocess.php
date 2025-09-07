<?php
session_start();
require 'connection.php';
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (empty($email) || empty($password)) {
        // echo 'all field must be filled';
        $_SESSION['msg']="all field must be filled";
        header("Location: signin.php");
        exit();
    }else{
        // echo 'process';
        $query="SELECT * FROM signup_table WHERE email=?";
        $prepare=$connection->prepare($query);
        $prepare->bind_param('s',$email);
        $prepare->execute();
        $result=$prepare->get_result();
        if ($result->num_rows > 0) {
            $data=$result->fetch_assoc();
            // echo $data['password'];
            if (password_verify($password,$data['password'])) {
                // echo 'login successfully';
                $_SESSION['id']=$data['signup_id'];
                $_SESSION['fullname']=$data['full_name'];
                $_SESSION['email']=$data['email'];
                $_SESSION['position']=$data['position'];
                if ($data['position']=='admin') {
                    header("Location: adminpage.php");
                    exit();
                }else{
                    header("Location: note.php");
                    exit();
                }
            }else{
                // echo 'invalid password';
                $_SESSION['msg']="invalid email or password";
                header("Location: signin.php");
                exit();
            }
        }else{
            // echo 'invalid email';
            $_SESSION['msg']="invalid email or password";
            header("Location: signin.php");
            exit();
        }
    }
    
} else {
    header("Location: signin.php");
    exit();
}
?>