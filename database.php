<?php

    $hostName = "sql106.infinityfree.com";
    $dbUser = "if0_36124909";
    $dbPassword = "FqOFBk2XdS";
    $dbName = "if0_36124909_personalwebsite";
    $conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
    if (!$conn) {
        die("something went wrong!");
    }
?>