<?php
    include('config.php');

    $query = "DELETE FROM `note` WHERE `note`.`id` = " . $_GET['id'];
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        header('location:./');
    } else {
        echo($query);
    };
?>