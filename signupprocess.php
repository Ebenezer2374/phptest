<?php
session_start();
require 'connection.php';

    
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phonenumber'];
    $position = $_POST['position'];
    if (empty($fullname) || empty($email) || empty($password) || empty($phone) || empty($position)) {
        // echo 'all field must be filled';
        $_SESSION['msg']="all field must be filled";
        header("Location: signup.php");
        exit();
    }else if ( strlen($password) < 8 ||                         // at least 8 characters
        !preg_match('/[A-Z]/', $password) ||             // at least one uppercase letter
        !preg_match('/[a-z]/', $password) ||             // at least one lowercase letter
        !preg_match('/[0-9]/', $password) ||             // at least one digit
        !preg_match('/[\W]/', $password)     ) {
              $_SESSION['msg']="password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one digit, and one special character.";
            header("Location: signup.php");
            exit();
    }else{
        // echo $position;
       $emailquery = "SELECT * FROM signup_table WHERE email = ?";
       $prepare = $connection->prepare($emailquery);
       $prepare->bind_param("s", $email); // "s" = string
       $prepare->execute();
       $emailcon = $prepare->get_result();

        if ($emailcon->num_rows > 0) {
            $_SESSION['msg']="email already exists";
            header("Location: signup.php");
            exit();
        }else{
            // echo 'process';
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO signup_table (full_name,email,password,phone_number,position) VALUES(?,?,?,?,?)";
            $prepare = $connection->prepare($query);
            $prepare->bind_param("sssss", $fullname, $email, $hash, $phone, $position);
            $execute = $prepare->execute();
            if ($execute) {
                // echo 'successfully';
        //          echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        // <script>
        //     Swal.fire({
        //         icon: 'success',
        //         title: 'Success!',
        //         text: 'Registered successfully!',
        //         confirmButtonColor: '#28a745'
        //     }).then(() => {
        //         window.location.href = 'signin.php';
        //     });
        // </script>";
         $_SESSION['success'] = "Registered successfully!";
    header("Location: signin.php");
    exit();
        // exit();
            } else {
                // echo 'failed';
                $_SESSION['msg']="registration failed";
                header("Location: signup.php");
                exit();  
            }

        }
    }
    
} else {
    header("Location: signup.php");
    exit();
}

?>