<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $name = $_GET['naam'];
    $genre = $_GET['genre'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=fullstack", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO band(naam, genre) VALUES('$name', '$genre')";
        $conn->exec($sql);
        echo "New record created successfully.";
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    
?>