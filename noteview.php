<?php
session_start();
require 'connection.php';
$noteid = $_SESSION['id'];
$query = "SELECT * FROM note_table WHERE signup_id = '$noteid'";
$conn = $connection -> query($query);
$user = $conn -> fetch_assoc();
$queryname = "SELECT * FROM signup_table WHERE signup_id = '$noteid'";
$connname = $connection -> query($queryname);
$names = $connname -> fetch_assoc();
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
    <h1 class="text-primary">
        Welcome
        <?php
        echo $names['full_name'];
        ?>
        <br>
        Here are your notes:
     </h1>
     <?php
        if ($conn->num_rows > 0) {  
            echo "<table class='table table-bordered'>
            <thead> 
            <tr>
            <th scope ='col'>S/N</th>
            <th scope ='col'>Title</th>
            <th scope ='col'>Description</th>
            </tr>
            </thead>
            <tbody>";
            $sn = 1;
            while ( $user = $conn -> fetch_assoc()) {
                echo "<tr>
                <th scope='row'>".$sn."</th>
                <td>".$user['title']."</td>
                <td>".$user['description']."</td>
                </tr>";
                $sn++;
                // $user = $conn -> fetch_assoc();
            }
            echo "</tbody>
            </table>";
        }else{
            echo "<h2 class='text-danger'>No notes found. Please add some notes.</h2>";
        }
        ?>     

</body>
</html>