<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cta_schema";

    // Connection creation
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Checking the connection
    if ($conn->connect_error){
        die("Connection Failed: " . $conn->connect_error);
    }
?>