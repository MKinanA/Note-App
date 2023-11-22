<?php
    include('config.php');

    $id = $_POST['id'];
    $title = $_POST['title'];
    $note = $_POST['note'];
    $prev_title = $_POST['prev_title'];
    $prev_note = $_POST['prev_note'];

    if ($title == $prev_title && $note == $prev_note) {
        header('location:./');
        die();
    };

    date_default_timezone_set("Asia/Jakarta");
    
    $query = "UPDATE `note` SET `date_modified` = '" . date("d/m/Y") . "', `time_modified` = '" . date("H:i") . "', `title` = '" . addslashes($title) . "', `note` = '" . addslashes($note) . "' WHERE `note`.`id` = " . $id . ";";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        header('location:./');
    } else {
        echo($query);
    };
?>