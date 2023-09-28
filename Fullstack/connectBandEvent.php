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
        .flexbox {
            display: flex;
            flex-wrap: nowrap;
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
        if(isset($_SESSION["admin"])) {
            echo '<a href="homepage.php">Homepagina</a>';
        }
        if(isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) {
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
        <div> 
            <select name="bandname" id="bands">
                <?php
                // Assuming you've already established a valid database connection
                $sql1 = "SELECT * FROM band";
                $result1 = $conn->query($sql1); 
                if ($result1) { 
                    while ($row = $result1->fetch(PDO::FETCH_ASSOC)) { 
                        echo "<option value='" . $row["idband"] . "'>" . $row["bandNaam"] . "</option>"; 
                        } 
                    }
                ?>
            </select>
        </div>
        <div>
            <?php 
                $sql2 = "SELECT * FROM event";
                $result2 = $conn->query($sql2); 
                if ($result2) { 
                    while ($row = $result2->fetch(PDO::FETCH_ASSOC)) { 
                        echo "<input type='checkbox' name='events[]' value='" . $row["idevent"] . "'> " . $row["eventNaam"] . " " . $row["aanvangstijd"] . "<br>";
                    } 
                }
                print_r($result2->fetch(PDO::FETCH_ASSOC));
            ?>
        </div>
        <div>
            <input type="submit" value="Verstuur">
        </div>
    </form>
</body>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $bandname = $_POST['bandname'];
        $events = $_POST['events'];
        $evenLeng = count($events);
        
        foreach ($events as $event){
            $sql = "INSERT INTO band_has_event(band_idband, event_idevent) VALUES($bandname, $event)";
            $conn->exec($sql);
            echo "New record created successfully.";
        }
    } 
?>