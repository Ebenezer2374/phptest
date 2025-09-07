<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

session_start();
require 'connection.php';
if (!isset($_SESSION['id']) || !isset($_SESSION['position']) || $_SESSION['position'] != 'admin') {
    header("Location: signin.php");
    exit();
}else{
    // echo 'welcome admin';
    $id = $_SESSION['id'];
    // echo $id;
   $query = "SELECT * FROM signup_table WHERE signup_id  = '$id'";
$result = $connection->query($query);

// if (!$result) {
//     die("Query failed: " . $connection->error);
// }

$user = $result->fetch_assoc();

    $query2 = "SELECT * FROM signup_table";
    $result2 = $connection->query($query2); 
    $info = $result2->fetch_all(MYSQLI_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        Welcome 
        <?php 
            echo $user['full_name'];
        ?>
        to Admin Page

    </h1>
    <?php
    if ($result2->num_rows > 0) {
        echo "<table border='1'>
        <thead>
        <tr>
        <th scope ='col'>S/N</th>
        <th scope ='col'>Full Name</th>
        <th scope ='col'>Email</th>
        <th scope ='col'>Position</th>
        <th scope ='col'>Phone-Number</th>
        </tr>
        </thead>
        <tbody>";
        $sn = 1;
        foreach ($info as $data) {
            echo "<tr>
            <td>".$sn."</td>
            <td>".$data['full_name']."</td>
            <td>".$data['email']."</td>
            <td>".$data['position']."</td>
            <td>".$data['phone_number']."</td>
            </tr>";
            $sn++;
        }
        echo "</tbody>
        </table>";
    }
    ?>
    <a class="btn btn-primary" href="note.php" role="button">Create Note</a>
</body>
</html>