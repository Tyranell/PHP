<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $date = $_GET['datum'];
    $openingTime = $_GET['aanvangstijd'];
    $nameEvent = $_GET['naamEvent'];
    $price = $_GET['prijs'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=fullstack", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO event(datum, naam, entreeprijs, aanvangstijd) VALUES('$date', '$nameEvent', $price, '$openingTime')";
        $conn->exec($sql);
        echo "New record created successfully.";
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    
?>