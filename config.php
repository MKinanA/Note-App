<?php
    $host = 'localhost'; $user = 'root'; $pass = ''; $db = 'noteapp';
    $conn = mysqli_connect($host, $user, $pass, $db);
    /*if ($conn) {
        echo('connection successful');
    } else {
        echo('connection unsuccessful');
    };*/

    mysqli_select_db($conn, $db);
?>