<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
    <div class="container-fluid">
        <div class="col-10 mx-auto shadow p-4">
            <h1 class="text-primary text-center "> Sign Up Page</h1>
            <div class="row">
               
                <div class="col-6 mx-auto p-3 mb-5 bg-body ">
                    <form action="signupprocess.php" method="post">
                        <div class="mb-3">
                            <label for="fullname" class="form-label">fullname</label>
                            <input type="text" class="form-control" id="fullname" name="fullname">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>    
            
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div>
                                </div>
                                <input type="password" class="form-control" id="password" name="password"  required>
                                <span id="togglePassword" class="position-relative top-50 end-0 translate-middle-y pe-3">👁️</span>
                                 
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone number</label>
                            <input type="text" class="form-control" id="phonenumber" name="phonenumber">
                        </div>
                        <div class="mb-3">
                            <!-- <label for="position" class="form-label">position</label>
                            <input type="checkbox" class="form-control" name="position"> -->
                            <label>
      <input type="radio" name="position" value="student">
      Student
    </label>
    
    <label>
      <input type="radio" name="position" value="admin">
      admin
    </label>
                        </div>
                        <input type="submit" class="btn btn-outline-primary" value="Sign Up" name="submit">
                        <!-- <button type="submit" class="btn btn-outline-primary">Sign Up</button> -->

                    </form>
    <?php
    if (isset($_SESSION['msg'])) {
        echo"<div class ='alert alert-danger'>" .$_SESSION['msg']."</div>";
        unset($_SESSION['msg']);
    }else if (isset($_SESSION['success'])) {
        echo"<div class ='alert alert-success'>" .$_SESSION['success']."</div>";
        unset($_SESSION['success']);
    }
    ?>
                </div>

            </div>
        </div>
    </div>
    <script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    


</body>
</html>