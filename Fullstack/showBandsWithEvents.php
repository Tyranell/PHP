<?php
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

<head>
    <style>
        table, th, td {
            border: 1px solid;
        }
    </style>
</head>
<body>
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
                    $sql = "SELECT * FROM band JOIN band_has_event ON band.idband = band_has_event.band_idband JOIN event ON event.idevent = band_has_event.event_idevent";
                    $result = $conn->query($sql);
                    
                    if ($result) {
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) { 
                            echo "<tr>";
                            echo "<td>" . $row["bandNaam"] . "</td>";
                            echo "<td>" . $row["genre"] . "</td>";
                            echo "<td>" . $row["eventNaam"] . "</td>"; 
                            echo "<td>" . $row["datum"] . "</td>"; 
                            echo "<td>" . $row["aanvangstijd"] . "</td>"; 
                            echo "<td>" . $row["entreeprijs"] . "</td>";
                            echo "</tr>";
                        }
                    }
                ?>
        </table>
    </form>
</body>