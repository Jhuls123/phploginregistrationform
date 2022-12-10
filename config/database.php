<?php
    // define('DB_HOST', 'localhost');
    // define('DB_USER', 'juls');
    // define('DB_PASS', '123456');
    // define('DB_NAME', 'phpformdb');

    // $conn = new mysqli(DB_HOST, DB_USER, DB_PASS,DB_NAME);

    // if($conn->connect_error) {
    //     die('Connection Failed ' . $conn->connect_error);
    // };

    $server = "localhost";
    $dbusername = "juls";
    $dbpassword = "123456";
    $dbname = "phpformdb"; 

    $conn = mysqli_connect($server,$dbusername,$dbpassword,$dbname);
    if(!$conn) {
        die("Connection Failed " . mysqli_connect_error());
    }

    // echo "connection success...";