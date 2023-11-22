<?php
    include('config.php');

    $parameters = [];
    foreach ($_POST as $key => $value) {
        $parameters[$key] = $value;
    };

    date_default_timezone_set("Asia/Jakarta");
    
    $query = "INSERT INTO `note` (`id`, `date_created`, `time_created`, `title`, `note`) VALUES (NULL, '" . date("d/m/Y") . "', '" . date("H:i") . "', '" . addslashes($parameters['title']) . "', '" . addslashes($parameters['note']) . "');";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        header('location:./');
    } else {
        echo($query);
    };
?>