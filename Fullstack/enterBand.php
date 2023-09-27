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
    
    if (!$_SESSION["admin"] == 1) {
        header("Location: homepage.php");
    }
?>

<head>
    <style>
        a {
            padding: 3px;
            margin-bottom: 10px;
        }

        form {
            margin-top: 10px;   
        }
    </style>
</head>
<body>
        <?php
            if(isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) {
            echo '<a href="homepage.php">Homepagina</a>';
            echo '<a href="enterBand.php">Band toevoegen</a>';
            echo '<a href="makeEvents.php">Events toevoegen</a>';
            echo '<a href="connectBandEvent.php">Bands aan events toevoegen</a>';
            }

            if(isset($_SESSION["admin"])) {
            echo '<a href="showBandsWithEvents.php">Planning</a>';
            }
            echo '<a href="logout.php">Logout</a>';
        ?>
  <form action="enterBand.php" method="post">
    Naam Band <input type="text" name="bandNaam" value="" /> Genre
    <input type="text" name="genre" value="" />
    <input type="submit" name="knop" value="Verstuur" />
  </form>
</body>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['bandNaam'];
        $genre = $_POST['genre'];

        $sql = "INSERT INTO band(bandNaam, genre) VALUES('$name', '$genre')";
        $conn->exec($sql);
        echo "New record created successfully.";
    }
?>