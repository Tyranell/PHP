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
<body>
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