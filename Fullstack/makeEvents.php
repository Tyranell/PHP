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
  <form action="makeEvents.php" method="post">
    Datum <input type="date" name="datum" value="" /> Aanvangstijd
    <input type="time" name="aanvangstijd" value="" /> Naam event
    <input type="text" name="naamEvent" value="" /> Prijs
    <input type="text" name="prijs" value="" />
    <input type="submit" name="knop" value="Verstuur" />
  </form>
</body>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $date = $_POST['datum'];
        $openingTime = $_POST['aanvangstijd'];
        $nameEvent = $_POST['naamEvent'];
        $price = $_POST['prijs'];

        $sql = "INSERT INTO event(datum, eventNaam, entreeprijs, aanvangstijd) VALUES('$date', '$nameEvent', $price, '$openingTime')";
        $conn->exec($sql);
        echo "New record created successfully.";
    }

?>

