<?php
$hostname = 'localhost';
$username = 'root';
$password = '' ;
$db = 'phptest_db' ;
$connection = new mysqli($hostname, $username, $password, $db);
if (!$connection) {
    echo 'not connected' .$connection -> connection_error;
} else {
    echo 'connected successfully' . '<br>';
};
?>