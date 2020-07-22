<?php
    define("HOST", "localhost");
    define("USER", "root");
    define("PASSWORD", "");
    define("DB", "bankdbms");

    $connection = mysqli_connect(HOST, USER, PASSWORD, DB);
    if(!$connection)
        die("Connection cannot be established");
?>
