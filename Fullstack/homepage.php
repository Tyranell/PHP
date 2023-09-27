<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=fullstack", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
?>

<!DOCTYPE html>
    <head>
        <style>
            a {
                padding: 3px;
            }
        </style>
    </head>
    <body>
        <header><h1>Homepagina</h1></header>
        <?php
            if(isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) {
            echo '<a href="homepage.php">Homepagina</a>';
            echo '<a href="enterBand.php">Band toevoegen</a>';
            echo '<a href="makeEvents.php">Events toevoegen</a>';
            echo '<a href="connectBandEvent.php">Bands aan events toevoegen</a>';
            }

            if(isset($_SESSION["admin"])) {
            echo '<a href="showBandsWithEvents.php">Planning</a>';
            } else if (isset($_SESSION["admin"]) == FALSE) {
            echo '<a href="login.php">Inloggen</a>';
            }
            echo '<a href="logout.php">Logout</a>';
        ?>
    </body>
</html>