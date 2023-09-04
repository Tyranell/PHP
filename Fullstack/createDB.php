<?php
    $servername = "localhost";
    $username = "username";
    $password = "password";

    //Create connection
    $conn = new mysqli($servername, $username, $password);
    //Check connection
    if ($conn->connection_error) {
        die("Connection failed: " . $conn->connection_error);
    }

    //Create database
    $sql = "CREATE DATABASE myDB";
    if ($conn->query($sql) === TRUE) {
        echo "Database created succesfully.";
    } else {
        echo "Error creating database: " . $conn->error;
    }

    $conn->close();
?>