<?php
//params to connect to a database
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "mainusers";   
    // $dbHost = "host31";
    // $dbUser = "superwor_admin";
    // $dbPass = "5 Potatoex1";
    // $dbName = "superwor_mainusers";

//connection to database
$connect = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if (mysqli_connect_errno()) {
    echo 'Database Connection Failed!'.mysqli_connect_errno();
}
?>
