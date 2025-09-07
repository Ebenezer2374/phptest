<?php
session_start();
require 'connection.php';

if (!isset($_SESSION['id'])) {
    header("Location: signin.php");
    exit();
}

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    // echo 'process';
    $id = $_SESSION['id'];
    // echo $id;
    // preparation binding and declaration
    var_dump($id);
    if (empty($title) || empty($description)) {
        // echo 'all field must be filled';
        $_SESSION['msg']="all field must be filled";
        header("Location: note.php");
        exit();
    }else{

        $query="INSERT INTO note_table (title,description,signup_id) VALUES(?,?,?)";
        $prepare=$connection->prepare($query);
        $prepare->bind_param('ssi',$title,$description,$id);
        $execute=$prepare->execute();
        if ($execute) {
            // echo 'successfully';
            $_SESSION['success']="Note added successfully";
            header("Location: note.php");
            exit();
        }else{
            // echo 'failed ';
            $_SESSION['msg']="Note addition failed";
            header("Location: note.php");
            exit();
        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>
<body>
     <div class="container-fluid">
    <div class="shadow mx-auto col-12 col-md-7 p-4">
        <div class="card-body p-2">
            <h1 class="text-muted text-center">Note App!</h1>
            <div>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" >
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control my-2">
                    <textarea name="description" id="" class="form-control my-2" placeholder="Enter note....."></textarea>
                    <input type="checkbox" name="status" class="form-check-input my-2">
                    <label for="status">I certify that I am above 18 years</label>
                    <input type="submit" name="submit" value="Add Note" class="btn btn-outline-info">
                    <a class="btn btn-primary" href="noteview.php" role="button">View Note</a>
                </form>
    <?php
    if (isset($_SESSION['success'])) {
        echo"<div class ='alert alert-success'>" .$_SESSION['success']."</div>";
        unset($_SESSION['success']);
    }
    ?>

            </div>
        </div>
    </div>
  </div>  
</body>
</html>