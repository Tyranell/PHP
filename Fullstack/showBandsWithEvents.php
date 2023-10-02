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
    if (!isset($_SESSION["admin"])) {
        header("Location: homepage.php");
    }
?>

<head>
    <style>
        table, th, td {
            border: 1px solid;
        }

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
    <form method="post" class="flexbox">
        <table>
            <tr>
                <th>Band naam</th>
                <th>Genre</th>
                <th>Event naam</th>
                <th>Datum</th>
                <th>Aanvangstijd</th>
                <th>Entreeprijs</th>
            </tr>
                <?php 
                    $previousEvent = null;
                    $sql = "SELECT * FROM band JOIN band_has_event ON band.idband = band_has_event.band_idband JOIN event ON event.idevent = band_has_event.event_idevent ORDER BY event.idevent";
                    $result = $conn->query($sql);
                    
                    if ($result) {
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) { 
                            if ($row["idevent"] != $previousEvent) {
                                echo "<tr>";
                                echo "<td>" . $row["eventNaam"] . "</td>";
                                echo "<td>" . $row["datum"] . "</td>"; 
                                echo "<td>" . $row["aanvangstijd"] . "</td>"; 
                                echo "<td>" . $row["entreeprijs"] . "</td>";
                                echo "<td>" . $row["bandNaam"] . "</td>";
                                echo "<td>" . $row["genre"] . "</td>";
                                echo "</tr>";
                            } else {
                                echo "<tr>";
                                echo "<td></td>";  
                                echo "<td></td>"; 
                                echo "<td></td>"; 
                                echo "<td></td>";
                                echo "<td>" . $row["bandNaam"] . "</td>";
                                echo "<td>" . $row["genre"] . "</td>";
                                echo "</tr>";
                            }
                            $previousEvent = $row["idevent"];
                        }
                    }
                ?>
        </table>
    </form>
</body>